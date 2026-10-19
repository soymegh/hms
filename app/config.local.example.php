<?php

declare(strict_types=1);

/**
 * Copy to app/config.local.php ON THE SERVER and edit. Values here override
 * app/config.php. This file is never deployed from local, so each server
 * keeps its own settings.
 */
return [
    // 'staging' on the SiteGround temporary domain, 'production' on hmsdenver.com.
    'env'      => 'staging',
    // Exact URL of this copy, no trailing slash, e.g. https://abc123.sg-host.com
    'base_url' => 'https://YOUR-TEMP-DOMAIN.sg-host.com',

    'integrations' => [
        'ga4_id'             => '',
        'gtm_id'             => '',
        'google_site_verify' => '',
        'bing_site_verify'   => '',
    ],
];
