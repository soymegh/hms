<?php

declare(strict_types=1);

/**
 * Free tools. Each one is a linkable asset that targets a low-difficulty
 * keyword and leads visitors to a relevant service.
 */
return [
    'google-review-link-generator' => [
        'path'    => '/tools/google-review-link-generator/',
        'name'    => 'Google Review Link Generator',
        'icon'    => 'star',
        'title'   => 'Google Review Link Generator | Free Tool | HMS Denver',
        'meta'    => 'Create a direct Google review link and QR code for your business in seconds. Free tool: share one link and get more 5-star Google reviews.',
        'h1'      => 'Free Google Review Link Generator',
        'short'   => 'Create a direct link and QR code that opens your Google review form.',
        'service' => 'reputation-management',
        'faqs'    => [
            ['q' => 'What is a Google review link?', 'a' => 'It is a short URL that opens the "write a review" window for your business on Google. Customers skip searching for your profile, so more of them actually leave a review.'],
            ['q' => 'Where do I find my Google Place ID?', 'a' => 'Search for your business with Google\'s free Place ID Finder (linked in the tool), click your listing and copy the ID that starts with "ChIJ".'],
            ['q' => 'Can I print the QR code?', 'a' => 'Yes. Download the QR code and add it to receipts, invoices, business cards, counter signs or vehicle wraps.'],
        ],
    ],
    'google-ads-budget-calculator' => [
        'path'    => '/tools/google-ads-budget-calculator/',
        'name'    => 'Google Ads Budget Calculator',
        'icon'    => 'chart',
        'title'   => 'Google Ads Budget Calculator | Cost per Lead & ROI | HMS',
        'meta'    => 'Free Google Ads budget calculator: estimate clicks, leads, cost per lead, customers and return on ad spend from your budget, CPC and conversion rates.',
        'h1'      => 'Free Google Ads Budget Calculator',
        'short'   => 'Estimate clicks, leads, cost per lead and ROI from your monthly ad budget.',
        'service' => 'google-ads',
        'faqs'    => [
            ['q' => 'How much should a small business spend on Google Ads?', 'a' => 'Enough to collect meaningful data — usually at least 100–200 clicks per month. Multiply your expected cost per click by that number to find a sensible starting budget.'],
            ['q' => 'Where do I get my cost per click?', 'a' => 'Use your past Google Ads data, or Google Keyword Planner\'s top-of-page bid ranges for your keywords and location. Book a free call and we will pull real estimates for your Denver market.'],
            ['q' => 'What is a good conversion rate?', 'a' => 'Many local service campaigns convert 5–15% of clicks into calls or forms. Landing page quality, offer and tracking all have a big impact.'],
        ],
    ],
    'missed-call-calculator' => [
        'path'    => '/tools/missed-call-calculator/',
        'name'    => 'Missed Call Revenue Calculator',
        'icon'    => 'phone',
        'title'   => 'Missed Call Calculator | Lost Revenue From Missed Calls',
        'meta'    => 'See how much revenue your business loses from unanswered calls each month and year. Free missed call calculator for service businesses.',
        'h1'      => 'Missed Call Revenue Calculator',
        'short'   => 'See how much revenue unanswered phone calls cost your business each year.',
        'service' => 'email-marketing-automation',
        'faqs'    => [
            ['q' => 'Why do missed calls matter so much?', 'a' => 'Callers who reach voicemail often call the next business on Google instead of leaving a message. Every unanswered call can be a lost job.'],
            ['q' => 'How can I stop losing missed calls?', 'a' => 'Missed-call text-back, call routing, an answering service or an AI receptionist can respond within seconds, even after hours. We can set these up for you.'],
        ],
    ],
];
