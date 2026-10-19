<?php

declare(strict_types=1);

namespace App;

/**
 * Renders a page template inside the main layout.
 */
final class View
{
    public static function render(string $template, Seo $seo, array $vars = [], int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: text/html; charset=UTF-8');

        $content = self::capture(APP_DIR . '/views/pages/' . $template . '.php', $vars + ['seo' => $seo]);
        echo self::capture(APP_DIR . '/views/layout.php', $vars + ['seo' => $seo, 'content' => $content]);
    }

    public static function partial(string $name, array $vars = []): string
    {
        return self::capture(APP_DIR . '/views/partials/' . $name . '.php', $vars);
    }

    private static function capture(string $__file, array $__vars): string
    {
        extract($__vars, EXTR_SKIP);
        ob_start();
        require $__file;
        return (string) ob_get_clean();
    }
}
