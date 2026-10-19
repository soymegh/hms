<?php
/**
 * @var array $industry
 * @var string $slug
 * @var array $services
 */
use App\View;
?>
<section class="page-hero">
    <div class="container page-hero__grid">
        <div>
            <p class="eyebrow"><?= icon($industry['icon'], 'icon icon--sm') ?> Industry playbook</p>
            <h1 class="page-hero__title">Marketing for <?= e($industry['name']) ?> in Denver</h1>
            <p class="page-hero__lead"><?= e($industry['intro']) ?></p>
            <div class="btn-row">
                <a href="<?= e(config('integrations.booking_url')) ?>" class="btn btn--primary btn--lg">Get my industry plan</a>
            </div>
        </div>
        <aside class="panel">
            <h2 class="panel__title">Tactics that work</h2>
            <ul class="checks checks--stack">
                <?php foreach ($industry['tactics'] as $tactic): ?>
                    <li><?= icon('check', 'icon icon--sm') ?> <?= e($tactic) ?></li>
                <?php endforeach; ?>
            </ul>
        </aside>
    </div>
</section>

<section class="section section--alt" aria-labelledby="rec-title">
    <div class="container">
        <h2 id="rec-title" class="section__title">Recommended services</h2>
        <div class="grid grid--3">
            <?php foreach ($industry['services'] as $serviceSlug): ?>
                <?php if (isset($services[$serviceSlug])): ?>
                    <?= View::partial('service-card', ['slug' => $serviceSlug, 'service' => $services[$serviceSlug]]) ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= View::partial('cta') ?>
