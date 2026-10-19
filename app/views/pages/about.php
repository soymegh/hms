<?php
use App\View;

$b = config('business');
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">About us</p>
        <h1 class="page-hero__title">A multicultural marketing agency rooted in Colorado</h1>
        <p class="page-hero__lead"><?= e($b['name']) ?> (Hispanic Marketing Solutions) helps Colorado businesses grow with honest, data-driven digital marketing — in English and Spanish.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container split">
        <div class="prose">
            <h2>Our story</h2>
            <p>H Marketing Solutions — also known as Hispanic Marketing Solutions — was founded by <?= e($b['founder']) ?> to give Colorado businesses the kind of marketing partner that big agencies rarely offer: someone who picks up the phone, explains things in plain language and measures success by the leads and revenue that come in.</p>
            <p>Our roots in the Hispanic community shaped how we work. We saw too many businesses miss out on a huge, loyal customer base because their marketing only spoke one language. Today we help clients across the Denver metro reach every customer — whatever language they search in.</p>
            <h2>What we believe</h2>
            <ul>
                <li><strong>Transparency.</strong> You see what we do, what it costs and what it produces.</li>
                <li><strong>Ownership.</strong> Your website, ad accounts and data belong to you.</li>
                <li><strong>Accountability.</strong> No long-term contracts — we earn your business every month.</li>
                <li><strong>Inclusion.</strong> Great marketing reflects the diversity of the community it serves.</li>
            </ul>
        </div>
        <aside class="panel">
            <h2 class="panel__title">At a glance</h2>
            <dl class="facts">
                <dt>Headquarters</dt><dd><?= e($b['city']) ?>, Colorado</dd>
                <dt>Founder</dt><dd><?= e($b['founder']) ?></dd>
                <dt>Languages</dt><dd><?= e(implode(' & ', $b['languages'])) ?></dd>
                <dt>Certification</dt><dd>Google Partner</dd>
                <dt>Hours</dt><dd><?= e($b['hours_label']) ?></dd>
            </dl>
        </aside>
    </div>
</section>

<?= View::partial('cta', ['heading' => 'Let’s talk about your growth']) ?>
