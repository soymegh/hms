<?php
/** @var array $locations */
use App\View;
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Locations</p>
        <h1 class="page-hero__title">Digital marketing across Denver and Colorado</h1>
        <p class="page-hero__lead">Local campaigns for local markets. Choose your city to see how we help businesses there grow.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container grid grid--3">
        <?php foreach ($locations as $slug => $location): ?>
            <article class="card">
                <span class="card__icon"><?= icon('pin') ?></span>
                <h2 class="card__title"><a href="<?= e($location['path']) ?>" class="card__link"><?= e($location['name']) ?>, CO</a></h2>
                <p><?= e($location['county']) ?> · <?= e(implode(', ', array_slice($location['areas'], 0, 3))) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?= View::partial('cta') ?>
