<?php
/**
 * @var array $location
 * @var string $slug
 * @var array $locations
 * @var array $services
 * @var array $landings
 * @var array $faqs
 */
use App\View;

$city = $location['name'];
$nearby = array_slice(array_diff_key($locations, [$slug => true]), 0, 6, true);
$cityLandings = array_filter($landings, static fn (array $l): bool => $l['location'] === $slug);
?>
<section class="page-hero">
    <div class="container page-hero__grid">
        <div>
            <p class="eyebrow"><?= icon('pin', 'icon icon--sm') ?> <?= e($city) ?>, Colorado</p>
            <h1 class="page-hero__title">SEO company &amp; marketing agency in <?= e($city) ?>, CO</h1>
            <p class="page-hero__lead"><?= e($location['intro']) ?></p>
            <?php foreach ($cityLandings as $landing): ?>
                <p><a href="<?= e($landing['path']) ?>" class="link-arrow"><?= e($services[$landing['service']]['nav']) ?> in <?= e($city) ?> <?= icon('arrow', 'icon icon--sm') ?></a></p>
            <?php endforeach; ?>
            <div class="btn-row">
                <a href="<?= e(config('integrations.booking_url')) ?>" class="btn btn--primary btn--lg">Free <?= e($city) ?> strategy call</a>
                <a href="<?= e(phone_link()) ?>" class="btn btn--ghost btn--lg"><?= icon('phone', 'icon icon--sm') ?> <?= e(config('business.phone')) ?></a>
            </div>
        </div>
        <aside class="panel">
            <h2 class="panel__title">Local insight</h2>
            <p><?= e($location['insight']) ?></p>
            <h3 class="panel__subtitle">Neighborhoods we target</h3>
            <ul class="tags">
                <?php foreach ($location['areas'] as $area): ?>
                    <li><?= e($area) ?></li>
                <?php endforeach; ?>
            </ul>
        </aside>
    </div>
</section>

<section class="section section--alt" aria-labelledby="loc-services-title">
    <div class="container">
        <h2 id="loc-services-title" class="section__title">Marketing services for <?= e($city) ?> businesses</h2>
        <div class="grid grid--3">
            <?php foreach ($services as $serviceSlug => $service): ?>
                <?= View::partial('service-card', ['slug' => $serviceSlug, 'service' => $service]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= View::partial('faq', ['faqs' => $faqs, 'heading' => "{$city} marketing FAQs"]) ?>

<section class="section section--tight" aria-labelledby="nearby-title">
    <div class="container">
        <h2 id="nearby-title" class="section__title section__title--sm">Nearby areas we serve</h2>
        <ul class="city-list city-list--inline">
            <?php foreach ($nearby as $nearSlug => $near): ?>
                <li><a href="<?= e($near['path']) ?>"><?= icon('pin', 'icon icon--sm') ?> <?= e($near['name']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?= View::partial('cta', ['heading' => "Ready to grow your {$city} business?"]) ?>
