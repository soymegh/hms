<?php

declare(strict_types=1);

namespace App;

/**
 * Validates and delivers the lead form. Leads are always written to a
 * protected CSV first so nothing is lost if mail() is unavailable.
 */
final class ContactForm
{
    private const RATE_LIMIT_SECONDS = 30;

    /** @var array<string,string> */
    public array $errors = [];

    /** @var array<string,string> */
    public array $values = [];

    public function __construct(private array $input)
    {
    }

    public function validate(): bool
    {
        $this->values = [
            'name'    => $this->clean('name', 100),
            'email'   => $this->clean('email', 150),
            'phone'   => $this->clean('phone', 30),
            'company' => $this->clean('company', 150),
            'website' => $this->clean('website', 200),
            'service' => $this->clean('service', 100),
            'message' => $this->clean('message', 3000),
        ];

        if (!csrf_valid($this->input['_token'] ?? null)) {
            $this->errors['form'] = 'Your session expired. Please submit the form again.';
        }
        // Honeypot: real users never see or fill this field.
        if (!empty($this->input['fax'])) {
            $this->errors['form'] = 'Submission rejected.';
        }
        if (time() - (int) ($_SESSION['last_lead'] ?? 0) < self::RATE_LIMIT_SECONDS) {
            $this->errors['form'] = 'Please wait a few seconds before sending another message.';
        }
        if (mb_strlen($this->values['name']) < 2) {
            $this->errors['name'] = 'Please enter your name.';
        }
        if (!filter_var($this->values['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Please enter a valid email address.';
        }
        if ($this->values['phone'] !== '' && !preg_match('/^[0-9+().\s-]{7,30}$/', $this->values['phone'])) {
            $this->errors['phone'] = 'Please enter a valid phone number.';
        }
        $services = array_column(data('services'), 'name');
        if ($this->values['service'] !== '' && !in_array($this->values['service'], $services, true)) {
            $this->values['service'] = '';
        }

        return $this->errors === [];
    }

    public function send(): void
    {
        $_SESSION['last_lead'] = time();
        $this->store();

        $v = $this->values;
        $body = "New website lead from hmsdenver.com\n\n"
            . "Name: {$v['name']}\nEmail: {$v['email']}\nPhone: {$v['phone']}\n"
            . "Company: {$v['company']}\nWebsite: {$v['website']}\nService: {$v['service']}\n\n"
            . "Message:\n{$v['message']}\n";

        $headers = [
            'From'         => config('business.name') . ' <' . config('mail.from') . '>',
            'Reply-To'     => $v['email'],
            'Content-Type' => 'text/plain; charset=UTF-8',
        ];

        @mail((string) config('mail.to'), 'New lead: ' . $v['name'], $body, $headers);
    }

    private function store(): void
    {
        $dir = APP_ROOT . '/storage/leads';
        if (!is_dir($dir)) {
            mkdir($dir, 0750, true);
        }
        $fh = fopen($dir . '/leads.csv', 'ab');
        if ($fh === false) {
            return;
        }
        // Prefix formula characters to prevent CSV injection when opened in Excel.
        $row = array_map(
            static fn (string $v): string => preg_match('/^[=+\-@]/', $v) ? "'" . $v : $v,
            [date('c'), ...array_values($this->values), $_SERVER['REMOTE_ADDR'] ?? ''],
        );
        flock($fh, LOCK_EX);
        fputcsv($fh, $row, ',', '"', '\\');
        flock($fh, LOCK_UN);
        fclose($fh);
    }

    private function clean(string $key, int $max): string
    {
        $value = trim((string) ($this->input[$key] ?? ''));
        // Strip CR/LF from single-line fields to block header injection.
        if ($key !== 'message') {
            $value = str_replace(["\r", "\n"], ' ', $value);
        }
        return mb_substr($value, 0, $max);
    }
}
