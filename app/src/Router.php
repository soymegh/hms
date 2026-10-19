<?php

declare(strict_types=1);

namespace App;

/**
 * Minimal router: exact paths or patterns with {param} placeholders.
 * All public URLs use a trailing slash; requests without it are 301'd.
 */
final class Router
{
    /** @var array<string, array<int, array{0:string,1:callable}>> */
    private array $routes = ['GET' => [], 'POST' => []];

    public function get(string $pattern, callable $handler): void
    {
        $this->routes['GET'][] = [$pattern, $handler];
    }

    public function post(string $pattern, callable $handler): void
    {
        $this->routes['POST'][] = [$pattern, $handler];
    }

    public function dispatch(string $method, string $uri, callable $notFound): void
    {
        $path = rawurldecode(parse_url($uri, PHP_URL_PATH) ?: '/');
        $method = $method === 'HEAD' ? 'GET' : $method;

        // Canonical trailing slash for page URLs (not for files like sitemap.xml).
        if ($method === 'GET' && $path !== '/' && !str_ends_with($path, '/') && !str_contains(basename($path), '.')) {
            $query = parse_url($uri, PHP_URL_QUERY);
            header('Location: ' . $path . '/' . ($query ? '?' . $query : ''), true, 301);
            return;
        }

        foreach ($this->routes[$method] ?? [] as [$pattern, $handler]) {
            $regex = '#^' . preg_replace('#\{(\w+)\}#', '(?P<$1>[a-z0-9-]+)', $pattern) . '$#';
            if (preg_match($regex, $path, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                $handler(...$params);
                return;
            }
        }

        $notFound();
    }
}
