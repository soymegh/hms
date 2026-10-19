<?php
/** @var array $services */
use App\View;
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Services</p>
        <h1 class="page-hero__title">Digital marketing services in Denver, Colorado</h1>
        <p class="page-hero__lead">Pick a single service or combine them into a complete growth program. Every plan is month to month and built around measurable leads.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container grid grid--3">
        <?php foreach ($services as $slug => $service): ?>
            <?= View::partial('service-card', compact('slug', 'service')) ?>
        <?php endforeach; ?>
    </div>
</section>

<?= View::partial('cta', ['heading' => 'Not sure which services you need?']) ?>
