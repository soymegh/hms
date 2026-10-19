<?php

declare(strict_types=1);

/**
 * Service-area city pages (/locations/{slug}/). Each city carries its own
 * local copy so pages are genuinely useful rather than doorway duplicates.
 */
return [
    'denver' => [
        'path'     => '/',
        'name'    => 'Denver',
        'county'  => 'Denver County',
        'geo'     => ['lat' => 39.7392, 'lng' => -104.9903],
        'areas'   => ['LoDo', 'RiNo', 'Highlands', 'Cherry Creek', 'Capitol Hill', 'Baker', 'Washington Park', 'Westwood', 'Montbello', 'Green Valley Ranch'],
        'intro'   => 'Denver is one of the most competitive local search markets in the Mountain West. From restaurants in RiNo to contractors serving Washington Park and dentists in Cherry Creek, businesses here compete with national brands and well-funded local players for the same page-one spots. We help Denver companies win with neighborhood-level SEO, tightly geo-targeted Google Ads and bilingual campaigns that reach the city\'s large Spanish-speaking community in west and southwest Denver.',
        'insight' => 'Searches in Denver frequently include neighborhood names. Pages and ads that mention Highlands, Baker or Montbello often outperform generic "Denver" targeting.',
    ],
    'aurora' => [
        'path'     => '/marketing-agency-aurora-co/',
        'name'    => 'Aurora',
        'county'  => 'Arapahoe & Adams Counties',
        'geo'     => ['lat' => 39.7294, 'lng' => -104.8319],
        'areas'   => ['Southlands', 'Saddle Rock', 'Tallyn\'s Reach', 'Original Aurora', 'Hoffman Heights', 'Murphy Creek', 'Fitzsimons'],
        'intro'   => 'Aurora is Colorado\'s third-largest city and one of its most diverse, with a fast-growing Hispanic population and thriving immigrant business corridors along East Colfax and Havana Street. We help Aurora businesses reach both English- and Spanish-speaking customers through local SEO, Google Business Profile optimization and multilingual paid campaigns targeted by zip code.',
        'insight' => 'Aurora spans three counties and a wide area, so Map Pack visibility varies sharply from Southlands to Original Aurora. Rank-grid tracking reveals where you actually show up.',
    ],
    'lakewood' => [
        'path'     => '/marketing-agency-lakewood-co/',
        'name'    => 'Lakewood',
        'county'  => 'Jefferson County',
        'geo'     => ['lat' => 39.7047, 'lng' => -105.0814],
        'areas'   => ['Belmar', 'Green Mountain', 'Bear Creek', 'Union Square', 'Applewood', 'Lakewood Heights'],
        'intro'   => 'Lakewood blends established neighborhoods, the Belmar shopping district and a busy corridor of professional services along Wadsworth and the West Colfax line. Local customers expect fast, mobile-friendly websites and strong reviews. We help Lakewood businesses stand out with technical SEO, review generation and paid campaigns that reach Jefferson County homeowners.',
        'insight' => 'Lakewood searchers often compare providers across Golden and Wheat Ridge, so service-area pages covering nearby cities help capture that demand.',
    ],
    'arvada' => [
        'path'     => '/marketing-agency-arvada-co/',
        'name'    => 'Arvada',
        'county'  => 'Jefferson & Adams Counties',
        'geo'     => ['lat' => 39.8028, 'lng' => -105.0875],
        'areas'   => ['Olde Town Arvada', 'Candelas', 'Leyden Rock', 'Ralston Valley', 'West Woods', 'Lake Arbor'],
        'intro'   => 'Arvada\'s family-oriented neighborhoods and the walkable Olde Town district create steady demand for home services, healthcare, restaurants and boutiques. We help Arvada businesses build a trusted local presence with Google Business Profile management, community-focused social media and SEO that targets the specific neighborhoods they serve.',
        'insight' => 'Home-service searches spike in Arvada\'s newer developments such as Candelas and Leyden Rock, where many residents are new to the area and still choosing providers.',
    ],
    'westminster' => [
        'path'     => '/marketing-agency-westminster-co/',
        'name'    => 'Westminster',
        'county'  => 'Adams & Jefferson Counties',
        'geo'     => ['lat' => 39.8367, 'lng' => -105.0372],
        'areas'   => ['Downtown Westminster', 'Orchard Town Center', 'Hyland Hills', 'Standley Lake', 'Federal Boulevard Corridor'],
        'intro'   => 'Westminster sits between Denver and Boulder along US-36 and is home to our neighbours just down the road in Federal Heights. Its mix of commuters, families and a vibrant Hispanic business community along Federal Boulevard makes bilingual marketing especially effective. We help Westminster businesses grow with local SEO, Spanish and English ads and reputation management.',
        'insight' => 'Our office is minutes from Westminster, so we can meet in person, film on location and understand the local market first-hand.',
    ],
    'thornton' => [
        'path'     => '/marketing-agency-thornton-co/',
        'name'    => 'Thornton',
        'county'  => 'Adams County',
        'geo'     => ['lat' => 39.8680, 'lng' => -104.9719],
        'areas'   => ['Eastlake', 'Riverdale', 'Thornton Town Center', 'Hunters Glen', 'Original Thornton'],
        'intro'   => 'Thornton is one of the fastest-growing cities in the Denver metro, with new subdivisions bringing a constant stream of new residents searching for everything from HVAC to childcare. We help Thornton businesses capture that demand with Map Pack optimization, targeted Google Ads and social campaigns aimed at new homeowners.',
        'insight' => 'New-mover targeting works well in Thornton: residents who just bought a home are actively looking for local providers they have not chosen yet.',
    ],
    'commerce-city' => [
        'path'     => '/marketing-agency-commerce-city-co/',
        'name'    => 'Commerce City',
        'county'  => 'Adams County',
        'geo'     => ['lat' => 39.8083, 'lng' => -104.9339],
        'areas'   => ['Reunion', 'Derby', 'Second Creek', 'Buffalo Highlands', 'Irondale'],
        'intro'   => 'Commerce City combines an industrial and logistics base with growing residential communities like Reunion and a strong, long-established Hispanic community. We help Commerce City businesses — from trucking and trades to restaurants and retail — reach customers in both English and Spanish with culturally relevant digital marketing.',
        'insight' => 'Spanish-language searches make up a meaningful share of local demand in Commerce City, often with less competition than English keywords.',
    ],
    'littleton' => [
        'path'     => '/marketing-agency-littleton-co/',
        'name'    => 'Littleton',
        'county'  => 'Arapahoe, Douglas & Jefferson Counties',
        'geo'     => ['lat' => 39.6133, 'lng' => -105.0166],
        'areas'   => ['Downtown Littleton', 'Ken Caryl', 'Columbine', 'Highlands Ranch border', 'Southpark', 'Roxborough'],
        'intro'   => 'Littleton\'s historic Main Street, established neighborhoods and proximity to Highlands Ranch make it a prime market for professional services, healthcare and home improvement. We help Littleton businesses compete with polished websites, strong review profiles and SEO that captures searches across the southwest metro.',
        'insight' => 'Many Littleton searches overlap with Highlands Ranch, Centennial and Ken Caryl. Covering those areas on your site expands your reach without opening a new office.',
    ],
    'colorado-springs' => [
        'path'     => '/marketing-agency-colorado-springs/',
        'title'    => 'Digital Marketing Colorado Springs | Marketing Agency, CO | HMS',
        'name'    => 'Colorado Springs',
        'county'  => 'El Paso County',
        'geo'     => ['lat' => 38.8339, 'lng' => -104.8214],
        'areas'   => ['Downtown', 'Old Colorado City', 'Briargate', 'Northgate', 'Powers Corridor', 'Fountain'],
        'intro'   => 'Colorado Springs is a distinct market from Denver, with a large military community, tourism around Pikes Peak and rapid growth on the north and east sides. We help Springs businesses build separate, locally focused campaigns — dedicated landing pages, local citations and ad targeting — so they compete on their own turf rather than being lumped in with the Denver metro.',
        'insight' => 'Military-connected families relocate frequently, creating continuous demand from residents who are searching for new local providers.',
    ],
];
