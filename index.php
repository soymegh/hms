<?php

declare(strict_types=1);

use App\ContactForm;
use App\Router;
use App\Seo;
use App\View;

require __DIR__ . '/app/bootstrap.php';

if (is_staging()) {
    header('X-Robots-Tag: noindex, nofollow');
}

$router = new Router();
$services = data('services');
$locations = data('locations');
$industries = data('industries');
$landings = data('landings');
$tools = data('tools');

$notFound = static function (): void {
    $seo = Seo::page('Page Not Found | H Marketing Solutions', 'The page you are looking for could not be found.', '/404/')->noindex();
    View::render('404', $seo, [], 404);
};

/* Home = Denver money page ------------------------------------------------ */

$router->get('/', static function () use ($services, $locations, $industries, $tools): void {
    $seo = Seo::page(
        'Marketing Agency Denver | Hispanic Marketing Solutions | HMS',
        'Marketing agency in Denver, CO for SEO, Google Ads, web design, social media and Hispanic marketing. Bilingual team, no long-term contracts. Free strategy call.',
        '/',
    )->alternates(['en-US' => '/', 'es-US' => '/es/', 'x-default' => '/'])
     ->faq(data('faqs'));

    $denver = $locations['denver'];
    View::render('home', $seo, compact('services', 'locations', 'industries', 'tools', 'denver'));
});

$router->get('/es/', static function () use ($services, $locations): void {
    $faqs = data('faqs_es');
    $seo = Seo::page(
        'Agencia de Marketing en Denver | Marketing Digital Colorado',
        'Agencia de marketing digital hispana en Denver. SEO en español, Google Ads, redes sociales y diseño web para negocios latinos en Colorado. Sin contratos.',
        '/es/',
    )->locale('es_US')
     ->alternates(['en-US' => '/', 'es-US' => '/es/', 'x-default' => '/'])
     ->breadcrumbs([['Español', '/es/']])
     ->faq($faqs);

    View::render('es', $seo, compact('services', 'locations', 'faqs'));
});

/* Hub pages -------------------------------------------------------------- */

$router->get('/services/', static function () use ($services): void {
    $seo = Seo::page(
        'Digital Marketing Services Denver | SEO, Ads & Web Design | HMS',
        'Digital marketing services in Denver: SEO, Google Ads, local SEO, web design, social media, video, AI search optimization and Hispanic marketing.',
        '/services/',
    )->breadcrumbs([['Services', '/services/']]);

    View::render('services', $seo, compact('services'));
});

$router->get('/locations/', static function () use ($locations): void {
    $seo = Seo::page(
        'Marketing Agency Colorado | Areas We Serve Across the Front Range',
        'Marketing agency serving Colorado: Denver, Aurora, Lakewood, Arvada, Westminster, Thornton, Commerce City, Littleton and Colorado Springs.',
        '/locations/',
    )->breadcrumbs([['Locations', '/locations/']]);

    View::render('locations', $seo, compact('locations'));
});

$router->get('/industries/', static function () use ($industries): void {
    $seo = Seo::page(
        'Industry Marketing Denver | Home Services, Legal, Dental & More',
        'Industry marketing in Denver for home services, law firms, dental and medical practices, restaurants, real estate and auto repair businesses.',
        '/industries/',
    )->breadcrumbs([['Industries', '/industries/']]);

    View::render('industries', $seo, compact('industries'));
});

$router->get('/tools/', static function () use ($tools): void {
    $seo = Seo::page(
        'Free Marketing Tools | Google Review Link & Ads Calculators',
        'Free marketing tools for local businesses: Google review link generator, Google Ads budget calculator and missed call revenue calculator.',
        '/tools/',
    )->breadcrumbs([['Free Tools', '/tools/']]);

    View::render('tools', $seo, compact('tools'));
});

foreach ($tools as $toolSlug => $tool) {
    $router->get($tool['path'], static function () use ($tool, $toolSlug, $services): void {
        $seo = Seo::page($tool['title'], $tool['meta'], $tool['path'])
            ->breadcrumbs([['Free Tools', '/tools/'], [$tool['name'], $tool['path']]])
            ->schema([
                '@type'               => 'WebApplication',
                'name'                => $tool['name'],
                'url'                 => url($tool['path']),
                'description'         => $tool['meta'],
                'applicationCategory' => 'BusinessApplication',
                'operatingSystem'     => 'Any',
                'isAccessibleForFree' => true,
                'offers'              => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'USD'],
                'provider'            => ['@id' => url('/') . '#organization'],
            ])
            ->faq($tool['faqs']);

        $service = $services[$tool['service']] ?? null;
        View::render('tool', $seo, compact('tool', 'toolSlug', 'service'));
    });
}

/* Company pages ---------------------------------------------------------- */

$router->get('/about/', static function (): void {
    $seo = Seo::page(
        'About H Marketing Solutions | Hispanic Marketing Agency Denver',
        'Meet H Marketing Solutions, a multicultural digital marketing agency in Federal Heights serving the Denver metro with transparent, results-driven marketing.',
        '/about/',
    )->breadcrumbs([['About', '/about/']])
     ->schema(['@type' => 'AboutPage', 'url' => url('/about/'), 'mainEntity' => ['@id' => url('/') . '#organization']]);

    View::render('about', $seo);
});

$router->get('/contact/', static function () use ($services): void {
    $seo = Seo::page(
        'Contact HMS | Free Marketing Strategy Call in Denver, CO',
        'Book a free digital marketing strategy call with H Marketing Solutions. Call (720) 292-6131 or visit 1557 W 84th Ave Ste. G, Federal Heights, CO.',
        '/contact/',
    )->breadcrumbs([['Contact', '/contact/']])
     ->schema(['@type' => 'ContactPage', 'url' => url('/contact/'), 'mainEntity' => ['@id' => url('/') . '#organization']]);

    $selected = (string) ($_GET['service'] ?? '');
    View::render('contact', $seo, ['services' => $services, 'form' => null, 'selected' => $selected]);
});

$router->post('/contact/', static function () use ($services): void {
    session_start();
    $form = new ContactForm($_POST);
    if ($form->validate()) {
        $form->send();
        redirect('/thank-you/');
    }

    $seo = Seo::page('Contact H Marketing Solutions | Denver, CO', 'Contact H Marketing Solutions.', '/contact/')->noindex();
    View::render('contact', $seo, ['services' => $services, 'form' => $form, 'selected' => ''], 422);
});

$router->get('/thank-you/', static function (): void {
    $seo = Seo::page('Thank You | H Marketing Solutions', 'Thanks for contacting H Marketing Solutions.', '/thank-you/')->noindex();
    View::render('thank-you', $seo);
});

$router->get('/privacy-policy/', static function (): void {
    $seo = Seo::page('Privacy Policy | H Marketing Solutions', 'How H Marketing Solutions collects, uses and protects your information.', '/privacy-policy/')
        ->breadcrumbs([['Privacy Policy', '/privacy-policy/']]);
    View::render('privacy', $seo);
});

$router->get('/terms/', static function (): void {
    $seo = Seo::page('Terms of Service | H Marketing Solutions', 'Terms of service governing the use of the H Marketing Solutions website, including content use, disclaimers and governing law.', '/terms/')
        ->breadcrumbs([['Terms of Service', '/terms/']]);
    View::render('terms', $seo);
});

/* Machine-readable files ------------------------------------------------- */

$router->get('/sitemap.xml', static function (): void {
    $entries = sitemap_entries();
    header('Content-Type: application/xml; charset=UTF-8');
    // Keep the sitemap itself out of search results; crawlers still read it.
    header('X-Robots-Tag: noindex');
    header('Cache-Control: public, max-age=3600');
    require APP_DIR . '/views/sitemap.php';
});

$router->get('/sitemap.xsl', static function (): void {
    header('Content-Type: text/xsl; charset=UTF-8');
    header('X-Robots-Tag: noindex');
    header('Cache-Control: public, max-age=86400');
    require APP_DIR . '/views/sitemap-xsl.php';
});

$router->get('/robots.txt', static function (): void {
    header('Content-Type: text/plain; charset=UTF-8');
    require APP_DIR . '/views/robots.php';
});

$router->get('/llms.txt', static function () use ($services, $locations, $industries, $landings, $tools): void {
    header('Content-Type: text/plain; charset=UTF-8');
    require APP_DIR . '/views/llms.php';
});

/* Legacy URLs → keyword + location URLs (301) --------------------------- */

foreach (['services' => $services, 'locations' => $locations, 'industries' => $industries] as $prefix => $items) {
    $router->get("/{$prefix}/{slug}/", static function (string $slug) use ($items, $notFound): void {
        isset($items[$slug]) ? redirect($items[$slug]['path'], 301) : $notFound();
    });
}

/* Money pages at the root: /seo-denver/, /marketing-agency-aurora-co/ … */

$router->get('/{slug}/', static function (string $slug) use ($services, $locations, $industries, $landings, $notFound): void {
    $path = "/{$slug}/";

    foreach ($services as $key => $service) {
        if ($service['path'] === $path) {
            $seo = Seo::page($service['title'], $service['meta'], $path)
                ->breadcrumbs([['Services', '/services/'], [$service['name'], $path]])
                ->service($service, $path)
                ->faq($service['faqs']);
            View::render('service', $seo, ['service' => $service, 'slug' => $key, 'services' => $services, 'locations' => $locations, 'landings' => $landings]);
            return;
        }
    }

    foreach ($locations as $key => $location) {
        if ($location['path'] === $path) {
            $faqs = location_faqs($location);
            $seo = Seo::page(
                $location['title'] ?? "SEO Company {$location['name']}, CO | Digital Marketing Agency | HMS",
                "SEO company and marketing agency in {$location['name']}, CO: local SEO, Google Ads, web design and bilingual marketing. Free strategy call from HMS.",
                $path,
            )->breadcrumbs([['Locations', '/locations/'], [$location['name'], $path]])
             ->schema([
                 '@type'       => 'Service',
                 'name'        => "Marketing Agency in {$location['name']}, CO",
                 'serviceType' => 'Digital Marketing',
                 'provider'    => ['@id' => url('/') . '#organization'],
                 'areaServed'  => [
                     '@type' => 'City',
                     'name'  => $location['name'] . ', Colorado',
                     'geo'   => ['@type' => 'GeoCoordinates', 'latitude' => $location['geo']['lat'], 'longitude' => $location['geo']['lng']],
                 ],
                 'url' => url($path),
             ])
             ->faq($faqs);
            View::render('location', $seo, ['location' => $location, 'slug' => $key, 'locations' => $locations, 'services' => $services, 'landings' => $landings, 'faqs' => $faqs]);
            return;
        }
    }

    foreach ($industries as $key => $industry) {
        if ($industry['path'] === $path) {
            $seo = Seo::page(
                $industry['title'],
                "{$industry['name']} marketing in Denver, CO. " . $industry['short'] . ' Free strategy call.',
                $path,
            )->breadcrumbs([['Industries', '/industries/'], [$industry['name'], $path]]);
            View::render('industry', $seo, ['industry' => $industry, 'slug' => $key, 'services' => $services]);
            return;
        }
    }

    foreach ($landings as $key => $landing) {
        if ($landing['path'] === $path) {
            $service = $services[$landing['service']];
            $location = $locations[$landing['location']];
            $seo = Seo::page($landing['title'], $landing['meta'], $path)
                ->breadcrumbs([['Services', '/services/'], [$service['name'], $service['path']], [$location['name'], $path]])
                ->service($service, $path, $location)
                ->faq($landing['faqs']);
            View::render('landing', $seo, compact('landing', 'service', 'location', 'services'));
            return;
        }
    }

    $notFound();
});

// Old WordPress URLs go straight to their new home in one 301.
if (($target = legacy_redirect_target($_SERVER['REQUEST_URI'] ?? '/')) !== null) {
    redirect($target, 301);
}

$router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_SERVER['REQUEST_URI'] ?? '/', $notFound);
