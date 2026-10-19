<?php
/** @var string|null $heading */
$heading ??= 'Ready to grow your Colorado business?';
?>
<section class="section cta-band">
    <div class="container cta-band__inner">
        <div>
            <h2 class="cta-band__title"><?= e($heading) ?></h2>
            <p>Book a free 30-minute strategy call. We will review your website, rankings and ads, and show you exactly where the growth is.</p>
            <ul class="checks">
                <li><?= icon('check', 'icon icon--sm') ?> No long-term contracts</li>
                <li><?= icon('check', 'icon icon--sm') ?> No hidden fees</li>
                <li><?= icon('check', 'icon icon--sm') ?> English &amp; Spanish</li>
            </ul>
        </div>
        <div class="cta-band__actions">
            <a href="<?= e(config('integrations.booking_url')) ?>" class="btn btn--primary btn--lg">Book my free strategy call</a>
            <a href="<?= e(phone_link()) ?>" class="btn btn--light btn--lg"><?= icon('phone', 'icon icon--sm') ?> <?= e(config('business.phone')) ?></a>
        </div>
    </div>
</section>
