<?php

declare(strict_types=1);

/**
 * Read a config value using dot notation, e.g. config('business.phone').
 */
function config(string $key, mixed $default = null): mixed
{
    static $config = null;
    $config ??= require APP_DIR . '/config.php';

    $value = $config;
    foreach (explode('.', $key) as $segment) {
        if (!is_array($value) || !array_key_exists($segment, $value)) {
            return $default;
        }
        $value = $value[$segment];
    }
    return $value;
}

/**
 * Load a data file from app/data once per request.
 */
function data(string $name): array
{
    static $cache = [];
    return $cache[$name] ??= require APP_DIR . '/data/' . basename($name) . '.php';
}

/** Staging copies (e.g. a SiteGround temporary domain) must never be indexed. */
function is_staging(): bool
{
    return config('env') === 'staging';
}

/** Escape a value for safe HTML output. */
function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Absolute URL for a site path (used for canonicals, sitemap and schema). */
function url(string $path = '/'): string
{
    $base = rtrim(trim((string) config('base_url')), '/');
    // Tolerate a base_url configured without a scheme ("example.com").
    if (!preg_match('#^https?://#i', $base)) {
        $base = 'https://' . ltrim($base, '/');
    }
    return $base . '/' . ltrim($path, '/');
}

/** Cache-busted asset path based on the file's modification time. */
function asset(string $path): string
{
    $path = '/assets/' . ltrim($path, '/');
    $file = APP_ROOT . $path;
    return is_file($file) ? $path . '?v=' . filemtime($file) : $path;
}

/** Inline SVG icon from the sprite. */
function icon(string $name, string $class = 'icon'): string
{
    return '<svg class="' . e($class) . '" aria-hidden="true" focusable="false"><use href="' . e(asset('img/icons.svg')) . '#' . e($name) . '"></use></svg>';
}

function phone_link(): string
{
    return 'tel:' . config('business.phone_e164');
}

function csrf_token(): string
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    return $_SESSION['csrf'] ??= bin2hex(random_bytes(32));
}

function csrf_valid(?string $token): bool
{
    return is_string($token) && isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}

function redirect(string $path, int $status = 303): never
{
    header('Location: ' . $path, true, $status);
    exit;
}

/**
 * FAQs for a city page. Shared by the page and its FAQPage schema.
 *
 * @return array<int, array{q:string,a:string}>
 */
function location_faqs(array $location): array
{
    $city = $location['name'];
    return [
        ['q' => "Do you work with businesses in {$city}?", 'a' => "Yes. We work with businesses throughout {$city} and {$location['county']}, and can meet in person or by video call. Our office is in Federal Heights, CO."],
        ['q' => "How can my {$city} business show up in the Google Map Pack?", 'a' => 'Start with a fully optimized Google Business Profile, consistent address details across the web, a steady stream of genuine reviews and location-relevant pages on your website. We handle all of it.'],
        ['q' => "Do you offer Spanish-language marketing in {$city}?", 'a' => "Yes. Our bilingual team runs Spanish SEO, ads and social campaigns for {$city} businesses that want to reach Hispanic customers."],
    ];
}

/**
 * Every indexable URL with its real last-modified time, used by sitemap.xml.
 * lastmod comes from the files that hold each page's main content (not the
 * shared layout), so it only changes when that page actually changes. An
 * item can pin an exact date with an 'updated' => 'YYYY-MM-DD' field.
 *
 * @return array<int, array{path:string, lastmod:string}>
 */
function sitemap_entries(): array
{
    $views = APP_DIR . '/views/pages/';
    $dataDir = APP_DIR . '/data/';
    $mtime = static fn (array $files): int => max(array_map(
        static fn (string $f): int => is_file($f) ? (int) filemtime($f) : 0,
        $files,
    ));

    $static = [
        '/'               => [$views . 'home.php', $dataDir . 'faqs.php'],
        '/es/'            => [$views . 'es.php', $dataDir . 'faqs_es.php'],
        '/services/'      => [$views . 'services.php', $dataDir . 'services.php'],
        '/locations/'     => [$views . 'locations.php', $dataDir . 'locations.php'],
        '/industries/'    => [$views . 'industries.php', $dataDir . 'industries.php'],
        '/tools/'         => [$views . 'tools.php', $dataDir . 'tools.php'],
        '/about/'         => [$views . 'about.php'],
        '/contact/'       => [$views . 'contact.php'],
        '/privacy-policy/' => [$views . 'privacy.php'],
        '/terms/'         => [$views . 'terms.php'],
    ];

    $entries = [];
    foreach ($static as $path => $files) {
        $entries[$path] = $mtime($files);
    }

    $sets = [
        'services'   => [$views . 'service.php'],
        'locations'  => [$views . 'location.php'],
        'industries' => [$views . 'industry.php'],
        'landings'   => [$views . 'landing.php'],
        'tools'      => [$views . 'tool.php', APP_ROOT . '/assets/js/tools.js'],
    ];
    foreach ($sets as $set => $templates) {
        foreach (data($set) as $slug => $item) {
            if (isset($entries[$item['path']])) {
                continue; // e.g. Denver's path is the home page
            }
            $files = [$dataDir . $set . '.php', ...$templates];
            if ($set === 'tools') {
                $files[] = APP_DIR . '/views/partials/tools/' . $slug . '.php';
            }
            $entries[$item['path']] = isset($item['updated']) ? (int) strtotime($item['updated']) : $mtime($files);
        }
    }

    return array_map(
        static fn (string $path, int $time): array => ['path' => $path, 'lastmod' => date('c', $time)],
        array_keys($entries),
        $entries,
    );
}

/**
 * Target for a URL from the previous site, or null. Matching ignores case
 * and a missing trailing slash so every old variant is a single 301 hop.
 */
function legacy_redirect_target(string $uri): ?string
{
    $path = strtolower(rawurldecode(parse_url($uri, PHP_URL_PATH) ?: '/'));
    $path = rtrim($path, '/') . '/';
    $target = data('redirects')[$path] ?? null;
    if ($target === null) {
        return null;
    }
    $query = parse_url($uri, PHP_URL_QUERY);
    return $target . ($query ? '?' . $query : '');
}
