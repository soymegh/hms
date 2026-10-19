<?php

declare(strict_types=1);

/**
 * 301 map from the previous WordPress site (from Search Console, Oct 2026)
 * to the closest new page, so existing rankings and links carry over.
 * Keys are lowercase paths with a trailing slash; requests without the
 * slash are normalized before lookup, so each old URL is a single hop.
 */
return [
    // Old WordPress / SEO-plugin sitemaps still registered in Search Console
    '/sitemap_index.xml/'      => '/sitemap.xml',
    '/wp-sitemap.xml/'         => '/sitemap.xml',
    '/page-sitemap.xml/'       => '/sitemap.xml',
    '/post-sitemap.xml/'       => '/sitemap.xml',
    '/category-sitemap.xml/'   => '/sitemap.xml',
    '/local-sitemap.xml/'      => '/sitemap.xml',

    // Company pages
    '/about-us/'             => '/about/',
    '/hmarketing-solutions/' => '/about/',
    '/portfolio/'            => '/about/',
    '/contact-us/'           => '/contact/',
    '/service/'              => '/services/',
    '/specialty-add-ons-denver/' => '/services/',
    '/blog/'                 => '/',
    '/category/uncategorized/' => '/',

    // City pages (these rank for "seo company {city}" queries)
    '/service-areas/'                    => '/locations/',
    '/service-areas/denver-co/'          => '/',
    '/service-areas/aurora-co/'          => '/marketing-agency-aurora-co/',
    '/service-areas/lakewood-co/'        => '/marketing-agency-lakewood-co/',
    '/service-areas/arvada-co/'          => '/marketing-agency-arvada-co/',
    '/service-areas/westminster-co/'     => '/marketing-agency-westminster-co/',
    '/service-areas/thornton-co/'        => '/marketing-agency-thornton-co/',
    '/service-areas/commerce-city-co/'   => '/marketing-agency-commerce-city-co/',
    '/service-areas/littleton-co/'       => '/marketing-agency-littleton-co/',
    '/service-areas/colorado-springs-co/' => '/marketing-agency-colorado-springs/',

    // SEO
    '/seo-services-denver/'           => '/seo-denver/',
    '/on-page-seo/'                   => '/seo-denver/',
    '/technical-seo/'                 => '/seo-denver/',
    '/content-keyword-strategy/'      => '/seo-denver/',
    '/link-building-authority-growth/' => '/seo-denver/',
    '/blog/category/seo/'             => '/seo-denver/',
    '/local-seo/'                     => '/local-seo-denver/',

    // Paid media / Google Ads
    '/google-ads-management/'          => '/google-ads-denver/',
    '/digital-advertising-paid-media/' => '/google-ads-denver/',
    '/paid-media/'                     => '/google-ads-denver/',
    '/denver-paid-media-agency/'       => '/google-ads-denver/',
    '/ppc-audits-optimization-denver/' => '/google-ads-denver/',
    '/display-retargeting-campaigns/'  => '/google-ads-denver/',
    '/youtube-ads-video-advertising/'  => '/google-ads-denver/',
    '/blog/types-of-paid-media/'       => '/google-ads-denver/',
    '/blog/what-is-paid-media/'        => '/google-ads-denver/',
    '/blog/category/paid-media/'       => '/google-ads-denver/',
    '/blog/category/paid-media/digital-advertising/' => '/google-ads-denver/',

    // Social media
    '/meta-ads-management/'          => '/social-media-marketing-denver/',
    '/paid-social-campaigns/'        => '/social-media-marketing-denver/',
    '/tiktok-ads-campaigns-denver/'  => '/social-media-marketing-denver/',
    '/creative-design-social-media/' => '/social-media-marketing-denver/',
    '/monthly-social-media-reports-insights-denver/' => '/social-media-marketing-denver/',
    '/influencer-marketing/'         => '/social-media-marketing-denver/',
    '/influencers-creators/'         => '/social-media-marketing-denver/',

    // Web design
    '/web-design-development-denver/'      => '/web-design-denver/',
    '/custom-website-design-denver/'       => '/web-design-denver/',
    '/website-redesign-optimization/'      => '/web-design-denver/',
    '/website-maintenance-security-denver/' => '/web-design-denver/',
    '/ecommerce-development-denver/'       => '/web-design-denver/',
    '/landing-page-design-for-ads/'        => '/web-design-denver/',
    '/multilingual-websites-denver/'       => '/web-design-denver/',

    // Conversion rate optimization & analytics
    '/conversion-rate-optimization/'          => '/conversion-rate-optimization-denver/',
    '/analytics-optimization-denver/'         => '/conversion-rate-optimization-denver/',
    '/performance-analytics-reporting-denver/' => '/conversion-rate-optimization-denver/',
    '/ab-testing-optimization-denver/'        => '/conversion-rate-optimization-denver/',
    '/ab-testing-optimization/'               => '/conversion-rate-optimization-denver/',
    '/analytics-setup-ga4-gtm-denver/'        => '/conversion-rate-optimization-denver/',
    '/analytics-setup-ga4-gtm/'               => '/conversion-rate-optimization-denver/',
    '/roi-analysis-custom-dashboards/'        => '/conversion-rate-optimization-denver/',
    '/conversion-tracking-event-setup-denver/' => '/conversion-rate-optimization-denver/',
    '/conversion-tracking-event-setup/'       => '/conversion-rate-optimization-denver/',

    // Business consulting & strategy
    '/business-consulting-strategy-denver/'         => '/marketing-consulting-denver/',
    '/marketing-strategy-consulting-denver/'        => '/marketing-consulting-denver/',
    '/market-research-competitor-analysis-denver/'  => '/marketing-consulting-denver/',
    '/brand-positioning-rebranding-denver/'         => '/marketing-consulting-denver/',
    '/ai-consulting-denver/'                        => '/marketing-consulting-denver/',

    // Reputation
    '/crisis-communications-reputation-management/' => '/reputation-management-denver/',
    '/local-reputation-management/'                 => '/reputation-management-denver/',

    // Hispanic & multicultural
    '/multicultural/'                         => '/hispanic-marketing-agency-denver/',
    '/multicultural-marketing-strategy-denver/' => '/hispanic-marketing-agency-denver/',
    '/hispanic-market-campaigns/'             => '/hispanic-marketing-agency-denver/',
    '/bilingual-content-creation-denver/'     => '/hispanic-marketing-agency-denver/',

    // Video & creative
    '/video-production-editing-denver/'      => '/video-production-denver/',
    '/creative-multimedia-production-denver/' => '/video-production-denver/',
    '/motion-graphics-scriptwriting-denver/' => '/video-production-denver/',
    '/podcast-production-denver/'            => '/video-production-denver/',
    '/brand-photography-denver/'             => '/video-production-denver/',

    // Email, CRM & automation
    '/email-and-crm-automation/'           => '/email-marketing-denver/',
    '/automation-crm-integrations-denver/' => '/email-marketing-denver/',
    '/automation-crm-integrations/'        => '/email-marketing-denver/',
    '/ai-chat-agent-for-lead-capture/'     => '/email-marketing-denver/',

    // Industries
    '/seo-for-law-firms-in-colorado/' => '/law-firm-marketing-denver/',
    '/law-firms-attorneys/'           => '/law-firm-marketing-denver/',
    '/law-firm-seo/'                  => '/law-firm-marketing-denver/',
    '/doctors-medical-clinics/'                        => '/dental-marketing-denver/',
    '/digital-marketing-dental-practices/'             => '/dental-marketing-denver/',
    '/digital-marketing-mental-health/'                => '/dental-marketing-denver/',
    '/digital-marketing-chiropractic-physical-therapy/' => '/dental-marketing-denver/',
    '/digital-marketing-senior-care/'                  => '/dental-marketing-denver/',
    '/digital-marketing-veterinary/'                   => '/dental-marketing-denver/',
    '/digital-marketing-home-services/'       => '/home-services-marketing-denver/',
    '/digital-marketing-roofing-construction/' => '/home-services-marketing-denver/',
    '/digital-marketing-plumbers/'            => '/home-services-marketing-denver/',
    '/digital-marketing-hvac/'                => '/home-services-marketing-denver/',
    '/digital-marketing-electricians/'        => '/home-services-marketing-denver/',
    '/digital-marketing-cleaning-services/'   => '/home-services-marketing-denver/',
    '/digital-marketing-restaurants/'         => '/restaurant-marketing-denver/',
    '/digital-marketing-hotels-hospitality/'  => '/restaurant-marketing-denver/',
    '/digital-marketing-event-planning/'      => '/restaurant-marketing-denver/',
    '/digital-marketing-real-estate/'         => '/real-estate-marketing-denver/',
    '/new-car-dealerships/'                   => '/auto-repair-marketing-denver/',
    '/used-car-dealerships/'                  => '/auto-repair-marketing-denver/',
    '/auto-repair-service-centers/'           => '/auto-repair-marketing-denver/',
    // Industries without a dedicated page yet go to the industries hub.
    '/digital-marketing-fitness-gyms/'                => '/industries/',
    '/digital-marketing-beauty-salons/'               => '/industries/',
    '/digital-marketing-photographers/'               => '/industries/',
    '/digital-marketing-childcare-preschool/'         => '/industries/',
    '/digital-marketing-education-tutoring/'          => '/industries/',
    '/digital-marketing-nonprofits/'                  => '/industries/',
    '/digital-marketing-finance-insurance/'           => '/industries/',
    '/digital-marketing-retail-ecommerce/'            => '/industries/',
    '/digital-marketing-for-technology-it-companies/' => '/industries/',
    '/franchise-marketing-solutions/'                 => '/industries/',
    '/politicians-campaigns/'                         => '/industries/',
];
