<?php

declare(strict_types=1);

namespace App;

/**
 * Per-page SEO state: meta tags, Open Graph, hreflang, breadcrumbs and
 * schema.org JSON-LD. Every page gets Organization/LocalBusiness + WebSite.
 */
final class Seo
{
    private array $schemas = [];
    private array $breadcrumbs = [];
    private array $alternates = [];
    private string $robots = 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
    private string $image = '/assets/img/og-default.jpg';
    private string $type = 'website';
    private string $locale = 'en_US';

    public function __construct(
        private string $title,
        private string $description,
        private string $path = '/',
    ) {
    }

    public static function page(string $title, string $description, string $path): self
    {
        return new self($title, $description, $path);
    }

    public function title(): string
    {
        return $this->title;
    }

    public function canonical(): string
    {
        return url($this->path);
    }

    public function noindex(): self
    {
        $this->robots = 'noindex, follow';
        return $this;
    }

    public function image(string $path): self
    {
        $this->image = $path;
        return $this;
    }

    public function locale(string $locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    public function lang(): string
    {
        return str_replace('_', '-', substr($this->locale, 0, 2));
    }

    /** @param array<string,string> $alternates hreflang => path */
    public function alternates(array $alternates): self
    {
        $this->alternates = $alternates;
        return $this;
    }

    /** @param array<int, array{0:string,1:string}> $crumbs [name, path] pairs, excluding Home */
    public function breadcrumbs(array $crumbs): self
    {
        $this->breadcrumbs = $crumbs;
        $items = [['Home', '/'], ...$crumbs];
        $this->schemas[] = [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => array_map(static fn (array $c, int $i): array => [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'name'     => $c[0],
                'item'     => url($c[1]),
            ], $items, array_keys($items)),
        ];
        return $this;
    }

    public function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }

    public function schema(array $schema): self
    {
        $this->schemas[] = $schema;
        return $this;
    }

    public function faq(array $faqs): self
    {
        if ($faqs === []) {
            return $this;
        }
        return $this->schema([
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(static fn (array $f): array => [
                '@type'          => 'Question',
                'name'           => $f['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
            ], $faqs),
        ]);
    }

    public function service(array $service, string $path, ?array $area = null): self
    {
        return $this->schema([
            '@type'       => 'Service',
            '@id'         => url($path) . '#service',
            'name'        => $service['name'] . ($area ? ' in ' . $area['name'] . ', CO' : ''),
            'serviceType' => $service['name'],
            'description' => $service['meta'],
            'url'         => url($path),
            'provider'    => ['@id' => url('/') . '#organization'],
            'areaServed'  => $area
                ? ['@type' => 'City', 'name' => $area['name'] . ', Colorado']
                : self::areaServed(),
        ]);
    }

    public static function areaServed(): array
    {
        return array_values(array_map(
            static fn (array $l): array => ['@type' => 'City', 'name' => $l['name'] . ', Colorado'],
            data('locations'),
        ));
    }

    /** Core entity graph shared by every page. */
    private function baseGraph(): array
    {
        $b = config('business');
        $home = url('/');

        return [
            [
                '@type'       => ['ProfessionalService', 'LocalBusiness'],
                '@id'         => $home . '#organization',
                'name'        => $b['name'],
                'alternateName' => [$b['short_name'], $b['legal_name']],
                'description' => 'H Marketing Solutions is a bilingual digital marketing agency in Denver, Colorado offering SEO, Google Ads, social media, web design and Hispanic marketing.',
                'url'         => $home,
                'logo'        => url('/assets/img/logo-512.png'),
                'image'       => url($this->image),
                'telephone'   => $b['phone_e164'],
                'email'       => $b['email'],
                'priceRange'  => $b['price_range'],
                'founder'     => ['@type' => 'Person', 'name' => $b['founder']],
                'knowsLanguage' => $b['languages'],
                'address'     => [
                    '@type'           => 'PostalAddress',
                    'streetAddress'   => $b['street'],
                    'addressLocality' => $b['city'],
                    'addressRegion'   => $b['region'],
                    'postalCode'      => $b['postal_code'],
                    'addressCountry'  => $b['country'],
                ],
                'geo' => [
                    '@type'     => 'GeoCoordinates',
                    'latitude'  => $b['geo']['lat'],
                    'longitude' => $b['geo']['lng'],
                ],
                'hasMap' => $b['maps_url'],
                'openingHoursSpecification' => array_map(static fn (array $h): array => [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => $h['days'],
                    'opens'     => $h['opens'],
                    'closes'    => $h['closes'],
                ], $b['hours']),
                'areaServed' => self::areaServed(),
                'sameAs'     => array_values($b['social']),
                'hasOfferCatalog' => [
                    '@type'           => 'OfferCatalog',
                    'name'            => 'Digital Marketing Services',
                    'itemListElement' => array_values(array_map(static fn (string $slug, array $s): array => [
                        '@type'       => 'Offer',
                        'itemOffered' => ['@type' => 'Service', 'name' => $s['name'], 'url' => url($s['path'])],
                    ], array_keys(data('services')), data('services'))),
                ],
            ],
            [
                '@type'      => 'WebSite',
                '@id'        => $home . '#website',
                'url'        => $home,
                'name'       => $b['name'],
                'inLanguage' => ['en-US', 'es-US'],
                'publisher'  => ['@id' => $home . '#organization'],
            ],
            [
                '@type'      => 'WebPage',
                '@id'        => $this->canonical() . '#webpage',
                'url'        => $this->canonical(),
                'name'       => $this->title,
                'description' => $this->description,
                'inLanguage' => $this->lang() === 'es' ? 'es-US' : 'en-US',
                'isPartOf'   => ['@id' => $home . '#website'],
                'about'      => ['@id' => $home . '#organization'],
            ],
        ];
    }

    public function renderHead(): string
    {
        $b = config('business');
        $image = url($this->image);
        $out = [
            '<title>' . e($this->title) . '</title>',
            '<meta name="description" content="' . e($this->description) . '">',
            '<meta name="robots" content="' . e(is_staging() ? 'noindex, nofollow' : $this->robots) . '">',
            '<link rel="canonical" href="' . e($this->canonical()) . '">',
            '<meta property="og:type" content="' . e($this->type) . '">',
            '<meta property="og:site_name" content="' . e($b['name']) . '">',
            '<meta property="og:locale" content="' . e($this->locale) . '">',
            '<meta property="og:title" content="' . e($this->title) . '">',
            '<meta property="og:description" content="' . e($this->description) . '">',
            '<meta property="og:url" content="' . e($this->canonical()) . '">',
            '<meta property="og:image" content="' . e($image) . '">',
            '<meta property="og:image:width" content="1200">',
            '<meta property="og:image:height" content="630">',
            '<meta name="twitter:card" content="summary_large_image">',
            '<meta name="twitter:title" content="' . e($this->title) . '">',
            '<meta name="twitter:description" content="' . e($this->description) . '">',
            '<meta name="twitter:image" content="' . e($image) . '">',
            '<meta name="geo.region" content="US-CO">',
            '<meta name="geo.placename" content="Denver">',
            '<meta name="geo.position" content="' . $b['geo']['lat'] . ';' . $b['geo']['lng'] . '">',
            '<meta name="ICBM" content="' . $b['geo']['lat'] . ', ' . $b['geo']['lng'] . '">',
        ];

        foreach ($this->alternates as $hreflang => $path) {
            $out[] = '<link rel="alternate" hreflang="' . e($hreflang) . '" href="' . e(url($path)) . '">';
        }

        if ($verify = config('integrations.google_site_verify')) {
            $out[] = '<meta name="google-site-verification" content="' . e($verify) . '">';
        }
        if ($verify = config('integrations.bing_site_verify')) {
            $out[] = '<meta name="msvalidate.01" content="' . e($verify) . '">';
        }

        $graph = ['@context' => 'https://schema.org', '@graph' => [...$this->baseGraph(), ...$this->schemas]];
        $json = json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP);
        $out[] = '<script type="application/ld+json">' . $json . '</script>';

        return implode("\n    ", $out);
    }
}
