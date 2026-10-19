<?php
/** @var array $industries */
use App\View;
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Industries</p>
        <h1 class="page-hero__title">Digital marketing for Colorado industries</h1>
        <p class="page-hero__lead">Every industry has its own search behaviour, seasons and cost per click. We bring a proven playbook for yours.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container grid grid--3">
        <?php foreach ($industries as $slug => $industry): ?>
            <article class="card">
                <span class="card__icon"><?= icon($industry['icon']) ?></span>
                <h2 class="card__title"><a href="<?= e($industry['path']) ?>" class="card__link"><?= e($industry['name']) ?></a></h2>
                <p><?= e($industry['short']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?= View::partial('cta') ?>
