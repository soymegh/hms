<?php
/**
 * @var array $service
 * @var string $slug
 * @var array $services
 * @var array $locations
 * @var array $landings
 */
use App\View;

$related = array_slice(array_diff_key($services, [$slug => true]), 0, 3, true);
?>
<section class="page-hero">
    <div class="container page-hero__grid">
        <div>
            <p class="eyebrow"><?= icon($service['icon'], 'icon icon--sm') ?> <?= e($service['name']) ?> · Denver, CO</p>
            <h1 class="page-hero__title"><?= e($service['h1']) ?></h1>
            <p class="page-hero__lead"><?= e($service['intro']) ?></p>
            <div class="btn-row">
                <a href="/contact/?service=<?= e(urlencode($service['name'])) ?>" class="btn btn--primary btn--lg">Get a free proposal</a>
                <a href="<?= e(phone_link()) ?>" class="btn btn--ghost btn--lg"><?= icon('phone', 'icon icon--sm') ?> <?= e(config('business.phone')) ?></a>
            </div>
        </div>
        <aside class="panel" aria-labelledby="included-title">
            <h2 id="included-title" class="panel__title">What’s included</h2>
            <ul class="checks checks--stack">
                <?php foreach ($service['deliverables'] as $item): ?>
                    <li><?= icon('check', 'icon icon--sm') ?> <?= e($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </aside>
    </div>
</section>

<section class="section section--alt" aria-labelledby="benefits-title">
    <div class="container">
        <h2 id="benefits-title" class="section__title">Why Denver businesses choose HMS for <?= e($service['nav']) ?></h2>
        <div class="grid grid--3">
            <?php foreach ($service['benefits'] as $benefit): ?>
                <article class="card">
                    <h3 class="card__title"><?= e($benefit['title']) ?></h3>
                    <p><?= e($benefit['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" aria-labelledby="process-title">
    <div class="container">
        <h2 id="process-title" class="section__title">Our <?= e($service['nav']) ?> process</h2>
        <ol class="timeline">
            <?php foreach ($service['process'] as $i => $step): ?>
                <li><span class="timeline__num"><?= $i + 1 ?></span><h3><?= e($step['title']) ?></h3><p><?= e($step['text']) ?></p></li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="section section--alt" aria-labelledby="areas-title">
    <div class="container">
        <h2 id="areas-title" class="section__title"><?= e($service['nav']) ?> across the Denver metro</h2>
        <p class="section__lead">We provide <?= e($service['name']) ?> for businesses throughout Colorado, including:</p>
        <ul class="city-list city-list--inline">
            <?php foreach ($locations as $locSlug => $location): ?>
                <li><a href="<?= e($location['path']) ?>"><?= icon('pin', 'icon icon--sm') ?> <?= e($location['name']) ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php foreach ($landings as $landing): ?>
            <?php if ($landing['service'] === $slug): ?>
                <p class="btn-row"><a href="<?= e($landing['path']) ?>" class="link-arrow"><?= e($service['nav']) ?> in <?= e($locations[$landing['location']]['name']) ?> <?= icon('arrow', 'icon icon--sm') ?></a></p>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<?= View::partial('faq', ['faqs' => $service['faqs'], 'heading' => $service['nav'] . ' FAQs']) ?>

<section class="section section--tight" aria-labelledby="related-title">
    <div class="container">
        <h2 id="related-title" class="section__title section__title--sm">Related services</h2>
        <div class="grid grid--3">
            <?php foreach ($related as $relSlug => $relService): ?>
                <?= View::partial('service-card', ['slug' => $relSlug, 'service' => $relService]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= View::partial('cta') ?>
