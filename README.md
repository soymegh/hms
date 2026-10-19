# hmsdenver.com — H Marketing Solutions

Site for a bilingual digital marketing agency in Denver, CO. Plain PHP 8.1+, no framework or build step.

## Structure

```
index.php              Front controller + routes (pages, sitemap.xml, robots.txt, llms.txt)
.htaccess              Clean URLs, HTTPS/non-www redirect, security headers, caching
app/config.php         Business NAP, integrations (GA4/GTM, Search Console), mail
app/data/*.php         Content: services, locations, industries, FAQs
app/src/               Router, View, Seo (meta + JSON-LD), ContactForm
app/views/             layout, partials, pages
assets/                css, js, img (SVG icon sprite, logos, OG image)
storage/               logs + leads.csv (web access denied)
```

## URLs: money keyword + location

Every money page lives at the root as `/{keyword}-{location}/` (e.g. `/seo-denver/`, `/marketing-agency-aurora-co/`). The `path` field in each data file is the single source of truth: menus, footer, sitemap.xml, llms.txt and schema all read it. Old `/services/x/`, `/locations/x/`, `/industries/x/` URLs 301 to the new ones.

## Adding content

- New service: add an entry to `app/data/services.php` with a keyword-first `path` and `title`.
- New city: add an entry to `app/data/locations.php`, with copy written for that city (no copy-paste between cities).
- New service + city page (e.g. `/web-design-aurora-co/`): add to `app/data/landings.php` only when keyword data justifies it, and write unique local copy.
- New free tool: add to `app/data/tools.php`, its markup in `app/views/partials/tools/{slug}.php`, and its logic in `assets/js/tools.js`.

## Local

Laragon serves it at `http://hms.test`. Set `APP_ENV=development` and `APP_URL=http://hms.test` as environment variables to see errors and get local canonicals.

## Before go-live

1. Set `GA4_ID` or `GTM_ID`, and `GOOGLE_SITE_VERIFICATION`, as environment variables (or in `app/config.php`).
2. Check the social profile URLs in `app/config.php`.
3. Replace `assets/img/logo*.svg` with the official logo.
4. Make sure the server can send mail (`mail()`). If it can't, leads are still saved to `storage/leads/leads.csv`.
5. After HTTPS is working, uncomment HSTS in `.htaccess`.
6. Submit `https://hmsdenver.com/sitemap.xml` in Google Search Console and Bing Webmaster Tools.
7. Set up 301 redirects from the current site's URLs to the new ones.

## Deploy to SiteGround

1. Build the package (excludes `SEO/`, leads, logs, README and `config.local.php`) and upload it to the site's `public_html`, so `index.php` sits directly inside it.
2. Site Tools → Devs → PHP Manager: PHP 8.2 or newer.
3. Copy `app/config.local.example.php` to `app/config.local.php` on the server and set `env` and `base_url`:
   - Temporary domain: `'env' => 'staging'` → every page is noindex, robots.txt blocks all crawlers.
   - Live: `'env' => 'production'`, `'base_url' => 'https://hmsdenver.com'`.
4. Site Tools → Speed → Caching: flush Dynamic Cache after every upload.
5. Check: `/`, `/seo-denver/`, `/robots.txt`, `/sitemap.xml`, an old URL such as `/about-us/` (should 301), and send a test lead from `/contact/`.
