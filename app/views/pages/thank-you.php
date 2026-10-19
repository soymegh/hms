<section class="page-hero page-hero--center">
    <div class="container container--narrow">
        <span class="success-icon"><?= icon('check') ?></span>
        <h1 class="page-hero__title">Thank you — we got your message!</h1>
        <p class="page-hero__lead">A member of our team will contact you within one business day. Need to talk sooner? Call us at <a href="<?= e(phone_link()) ?>"><?= e(config('business.phone')) ?></a>.</p>
        <a href="/" class="btn btn--primary">Back to home</a>
    </div>
</section>
