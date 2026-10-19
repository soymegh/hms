<?php
/**
 * Service + city landing page (e.g. /seo-colorado-springs/).
 *
 * @var array $landing
 * @var array $service
 * @var array $location
 * @var array $services
 */
use App\View;

$city = $location['name'];
?>
<section class="page-hero">
    <div class="container page-hero__grid">
        <div>
            <p class="eyebrow"><?= icon($service['icon'], 'icon icon--sm') ?> <?= e($service['nav']) ?> · <?= e($city) ?>, CO</p>
            <h1 class="page-hero__title"><?= e($landing['h1']) ?></h1>
            <p class="page-hero__lead"><?= e($landing['intro']) ?></p>
            <div class="btn-row">
                <a href="/contact/?service=<?= e(urlencode($service['name'])) ?>" class="btn btn--primary btn--lg">Get my free <?= e($city) ?> audit</a>
                <a href="<?= e(phone_link()) ?>" class="btn btn--ghost btn--lg"><?= icon('phone', 'icon icon--sm') ?> <?= e(config('business.phone')) ?></a>
            </div>
        </div>
        <aside class="panel">
            <h2 class="panel__title">What’s included</h2>
            <ul class="checks checks--stack">
                <?php foreach ($service['deliverables'] as $item): ?>
                    <li><?= icon('check', 'icon icon--sm') ?> <?= e($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </aside>
    </div>
</section>

<section class="section section--alt" aria-labelledby="local-title">
    <div class="container">
        <h2 id="local-title" class="section__title"><?= e($service['nav']) ?> built for <?= e($city) ?></h2>
        <div class="grid grid--3">
            <?php foreach ($landing['points'] as $point): ?>
                <article class="card">
                    <h3 class="card__title"><?= e($point['title']) ?></h3>
                    <p><?= e($point['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
        <h3 class="panel__subtitle">Areas we target in <?= e($city) ?></h3>
        <ul class="tags">
            <?php foreach ($location['areas'] as $area): ?>
                <li><?= e($area) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="section" aria-labelledby="process-title">
    <div class="container">
        <h2 id="process-title" class="section__title">Our <?= e($service['nav']) ?> process in <?= e($city) ?></h2>
        <ol class="timeline">
            <?php foreach ($service['process'] as $i => $step): ?>
                <li><span class="timeline__num"><?= $i + 1 ?></span><h3><?= e($step['title']) ?></h3><p><?= e($step['text']) ?></p></li>
            <?php endforeach; ?>
        </ol>
        <p class="btn-row">
            <a href="<?= e($location['path']) ?>" class="link-arrow">All marketing services in <?= e($city) ?> <?= icon('arrow', 'icon icon--sm') ?></a>
            <a href="<?= e($service['path']) ?>" class="link-arrow"><?= e($service['nav']) ?> in Denver <?= icon('arrow', 'icon icon--sm') ?></a>
        </p>
    </div>
</section>

<?= View::partial('faq', ['faqs' => $landing['faqs'], 'heading' => $service['nav'] . ' in ' . $city . ' FAQs']) ?>
<?= View::partial('cta', ['heading' => "Ready to rank in {$city}?"]) ?>
