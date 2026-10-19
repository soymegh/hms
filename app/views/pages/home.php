<?php
/**
 * @var array $services
 * @var array $locations
 * @var array $industries
 * @var array $tools
 * @var array $denver
 */
use App\View;

$b = config('business');
?>
<section class="hero">
    <div class="container hero__inner">
        <div class="hero__copy">
            <p class="eyebrow eyebrow--pill"><?= icon('pin', 'icon icon--sm') ?> Denver, Colorado · English &amp; Español</p>
            <h1 class="hero__title">Marketing agency in Denver that turns clicks into <span class="text-accent">customers</span>.</h1>
            <p class="hero__lead">H Marketing Solutions is a bilingual digital marketing company in Denver, CO. SEO, Google Ads, web design and Hispanic marketing for businesses that want more calls, more leads and a clear view of every dollar spent.</p>
            <div class="hero__actions">
                <a href="<?= e(config('integrations.booking_url')) ?>" class="btn btn--primary btn--lg">Book a free strategy call</a>
                <a href="<?= e(phone_link()) ?>" class="btn btn--ghost btn--lg"><?= icon('phone', 'icon icon--sm') ?> <?= e($b['phone']) ?></a>
            </div>
            <ul class="checks hero__checks">
                <li><?= icon('check', 'icon icon--sm') ?> Google Partner</li>
                <li><?= icon('check', 'icon icon--sm') ?> No long-term contracts</li>
                <li><?= icon('check', 'icon icon--sm') ?> Bilingual team</li>
            </ul>
        </div>

        <div class="hero__visual" aria-hidden="true">
            <div class="dash">
                <div class="dash__head"><span></span><span></span><span></span><strong>Monthly growth report</strong></div>
                <div class="dash__kpis">
                    <div><small>Calls</small><b>Tracked</b></div>
                    <div><small>Form leads</small><b>Tracked</b></div>
                    <div><small>Cost / lead</small><b>Reported</b></div>
                </div>
                <svg class="dash__chart" viewBox="0 0 300 110" preserveAspectRatio="none">
                    <defs><linearGradient id="g" x1="0" x2="0" y1="0" y2="1"><stop offset="0" stop-color="currentColor" stop-opacity=".35"/><stop offset="1" stop-color="currentColor" stop-opacity="0"/></linearGradient></defs>
                    <path d="M0 95 L40 88 L80 80 L120 82 L160 60 L200 52 L240 35 L300 18 L300 110 L0 110 Z" fill="url(#g)"/>
                    <path d="M0 95 L40 88 L80 80 L120 82 L160 60 L200 52 L240 35 L300 18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
                <ul class="dash__rows">
                    <li><span>“seo company denver”</span><em>Tracked weekly</em></li>
                    <li><span>“agencia de marketing denver”</span><em>Tracked weekly</em></li>
                    <li><span>Google Map Pack</span><em>Grid scanned</em></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section" id="services" aria-labelledby="services-title">
    <div class="container">
        <div class="section__head">
            <p class="eyebrow">01 · Services</p>
            <h2 id="services-title" class="section__title">Digital marketing services in Denver</h2>
            <p class="section__lead">One accountable team for search, ads, social, web and creative — so your marketing works together instead of in silos.</p>
        </div>
        <div class="grid grid--3">
            <?php foreach ($services as $slug => $service): ?>
                <?= View::partial('service-card', compact('slug', 'service')) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--alt" aria-labelledby="why-title">
    <div class="container split">
        <div>
            <p class="eyebrow">02 · Why HMS</p>
            <h2 id="why-title" class="section__title">Transparent marketing with results you can measure</h2>
            <p>We are a locally owned, multicultural agency based in Federal Heights, just north of downtown Denver. Our clients range from family-run shops to multi-location service companies, and they all get the same thing: honest advice, clear reporting and work that is measured by leads and revenue — not impressions.</p>
            <a href="/about/" class="link-arrow">Meet the team <?= icon('arrow', 'icon icon--sm') ?></a>
        </div>
        <ul class="feature-list">
            <li>
                <span class="feature-list__icon"><?= icon('chart') ?></span>
                <div><h3>Measurable ROI</h3><p>Call tracking, form tracking and CRM attribution show exactly what each channel produces.</p></div>
            </li>
            <li>
                <span class="feature-list__icon"><?= icon('shield') ?></span>
                <div><h3>No contracts, no hidden fees</h3><p>Month-to-month plans. You own your website, ad accounts and data — always.</p></div>
            </li>
            <li>
                <span class="feature-list__icon"><?= icon('globe') ?></span>
                <div><h3>Multicultural expertise</h3><p>More than 20% of Coloradans are Hispanic or Latino. We help you reach them authentically.</p></div>
            </li>
            <li>
                <span class="feature-list__icon"><?= icon('pin') ?></span>
                <div><h3>Local knowledge</h3><p>We live and work here. We know the neighborhoods, the seasons and the competition.</p></div>
            </li>
        </ul>
    </div>
</section>

<section class="section" aria-labelledby="process-title">
    <div class="container">
        <div class="section__head">
            <p class="eyebrow">03 · How we work</p>
            <h2 id="process-title" class="section__title">From first call to first leads in four steps</h2>
        </div>
        <ol class="timeline">
            <li><span class="timeline__num">1</span><h3>Free strategy call</h3><p>We learn your goals and review your website, rankings, Google Business Profile and ads.</p></li>
            <li><span class="timeline__num">2</span><h3>Custom growth plan</h3><p>You get a clear plan with priorities, budget and the results we will measure.</p></li>
            <li><span class="timeline__num">3</span><h3>Launch</h3><p>Tracking goes in first, then campaigns, content and site improvements go live.</p></li>
            <li><span class="timeline__num">4</span><h3>Report &amp; improve</h3><p>Monthly reports and review calls keep everything accountable and moving forward.</p></li>
        </ol>
    </div>
</section>

<section class="section section--dark" aria-labelledby="hispanic-title">
    <div class="container split split--center">
        <div>
            <p class="eyebrow eyebrow--light">04 · Hispanic marketing</p>
            <h2 id="hispanic-title" class="section__title">Hablamos el idioma de tus clientes</h2>
            <p>Colorado’s Hispanic community is one of its fastest-growing consumer markets. Our bilingual team creates Spanish-language SEO, ads and social content that feels native — not translated — so you can reach customers your competitors are missing.</p>
            <div class="btn-row">
                <a href="<?= e($services['hispanic-marketing']['path']) ?>" class="btn btn--primary">Hispanic marketing agency in Denver</a>
                <a href="/es/" class="btn btn--light" hreflang="es" lang="es">Ver en español</a>
            </div>
        </div>
        <div class="stat-tiles">
            <div class="stat-tile"><b>20%+</b><span>of Colorado residents identify as Hispanic or Latino</span></div>
            <div class="stat-tile"><b>2</b><span>languages for every campaign: English &amp; Spanish</span></div>
            <div class="stat-tile"><b>0</b><span>long-term contracts required</span></div>
        </div>
    </div>
</section>

<section class="section" aria-labelledby="industries-title">
    <div class="container">
        <div class="section__head">
            <p class="eyebrow">05 · Industries</p>
            <h2 id="industries-title" class="section__title">Playbooks built for your industry</h2>
        </div>
        <div class="grid grid--3">
            <?php foreach ($industries as $slug => $industry): ?>
                <article class="card">
                    <span class="card__icon"><?= icon($industry['icon']) ?></span>
                    <h3 class="card__title"><a href="<?= e($industry['path']) ?>" class="card__link"><?= e($industry['name']) ?></a></h3>
                    <p><?= e($industry['short']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--alt" aria-labelledby="areas-title">
    <div class="container split split--center">
        <div>
            <p class="eyebrow">06 · Where we work</p>
            <h2 id="areas-title" class="section__title">Marketing in Denver and across Colorado</h2>
            <p><?= e($denver['intro']) ?></p>
            <ul class="tags">
                <?php foreach ($denver['areas'] as $area): ?>
                    <li><?= e($area) ?></li>
                <?php endforeach; ?>
            </ul>
            <address class="hq">
                <strong>Headquarters</strong><br>
                <?= e($b['street']) ?>, <?= e($b['city']) ?>, <?= e($b['region']) ?> <?= e($b['postal_code']) ?><br>
                <?= e($b['hours_label']) ?>
            </address>
        </div>
        <ul class="city-list">
            <?php foreach (array_filter($locations, static fn (array $l): bool => $l['path'] !== '/') as $location): ?>
                <li><a href="<?= e($location['path']) ?>"><?= icon('pin', 'icon icon--sm') ?> <?= e($location['name']) ?>, CO</a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="section" aria-labelledby="tools-title">
    <div class="container">
        <div class="section__head">
            <p class="eyebrow">07 · Free tools</p>
            <h2 id="tools-title" class="section__title">Free marketing tools for local businesses</h2>
        </div>
        <div class="grid grid--3">
            <?php foreach ($tools as $tool): ?>
                <article class="card card--service">
                    <span class="card__icon"><?= icon($tool['icon']) ?></span>
                    <h3 class="card__title"><a href="<?= e($tool['path']) ?>" class="card__link"><?= e($tool['name']) ?></a></h3>
                    <p><?= e($tool['short']) ?></p>
                    <span class="card__more" aria-hidden="true">Use the tool <?= icon('arrow', 'icon icon--sm') ?></span>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= View::partial('faq', ['faqs' => data('faqs'), 'heading' => 'Questions about our Denver marketing agency']) ?>
<?= View::partial('cta') ?>
