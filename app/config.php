<?php

declare(strict_types=1);

/**
 * Site-wide configuration. Business NAP (name, address, phone) must stay
 * identical to the Google Business Profile listing for local SEO consistency.
 *
 * Server-specific values (staging URL, analytics IDs, env) go in
 * app/config.local.php, which is not deployed from here and overrides these.
 * env: 'production' | 'staging' (staging = noindex everywhere) | 'development'.
 */
$config = [
    'env'      => getenv('APP_ENV') ?: 'production',
    'base_url' => getenv('APP_URL') ?: 'https://hmsdenver.com',

    'business' => [
        'name'        => 'H Marketing Solutions',
        'short_name'  => 'HMS Denver',
        'legal_name'  => 'Hispanic Marketing Solutions',
        'tagline'     => 'Digital Marketing Agency in Denver, Colorado',
        'phone'       => '(720) 292-6131',
        'phone_e164'  => '+17202926131',
        'email'       => 'jhonnychavez@hmsdenver.com',
        'street'      => '1557 W 84th Ave Ste. G',
        'city'        => 'Federal Heights',
        'region'      => 'CO',
        'postal_code' => '80260',
        'country'     => 'US',
        'geo'         => ['lat' => 39.8495, 'lng' => -105.0059],
        'hours'       => [
            ['days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'], 'opens' => '09:00', 'closes' => '18:00'],
        ],
        'hours_label' => 'Mon – Fri, 9:00 am – 6:00 pm',
        'founder'     => 'Jhonny Chavez',
        'price_range' => '$$',
        'languages'   => ['English', 'Spanish'],
        'maps_url'    => 'https://www.google.com/maps/search/?api=1&query=H+Marketing+Solutions+1557+W+84th+Ave+Ste+G+Federal+Heights+CO+80260',
        // TODO: verify each handle; these feed the schema.org "sameAs" list.
        'social'      => [
            'facebook'  => 'https://www.facebook.com/hmsdenver',
            'instagram' => 'https://www.instagram.com/hmsdenver',
            'linkedin'  => 'https://www.linkedin.com/company/hmsdenver',
            'youtube'   => 'https://www.youtube.com/@hmsdenver',
        ],
    ],

    // Fill these in production. Empty values are simply not rendered.
    'integrations' => [
        'ga4_id'                => getenv('GA4_ID') ?: '',
        'gtm_id'                => getenv('GTM_ID') ?: '',
        'google_site_verify'    => getenv('GOOGLE_SITE_VERIFICATION') ?: '',
        'bing_site_verify'      => getenv('BING_SITE_VERIFICATION') ?: '',
        'booking_url'           => '/contact/',
    ],

    'mail' => [
        'to'   => 'jhonnychavez@hmsdenver.com',
        'from' => 'no-reply@hmsdenver.com',
    ],
];

$local = __DIR__ . '/config.local.php';

return is_file($local) ? array_replace_recursive($config, require $local) : $config;
