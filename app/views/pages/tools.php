<?php
/** @var array $tools */
use App\View;
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Free tools</p>
        <h1 class="page-hero__title">Free marketing tools for local businesses</h1>
        <p class="page-hero__lead">Simple, free tools to help you get more reviews, plan your ad budget and see what missed calls cost you. No sign-up required.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container grid grid--3">
        <?php foreach ($tools as $tool): ?>
            <article class="card card--service">
                <span class="card__icon"><?= icon($tool['icon']) ?></span>
                <h2 class="card__title"><a href="<?= e($tool['path']) ?>" class="card__link"><?= e($tool['name']) ?></a></h2>
                <p><?= e($tool['short']) ?></p>
                <span class="card__more" aria-hidden="true">Use the tool <?= icon('arrow', 'icon icon--sm') ?></span>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?= View::partial('cta') ?>
