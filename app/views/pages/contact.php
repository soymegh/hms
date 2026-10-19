<?php
/**
 * @var array $services
 * @var \App\ContactForm|null $form
 * @var string $selected
 */
$b = config('business');
$v = $form?->values ?? [];
$errors = $form?->errors ?? [];
$selected = $v['service'] ?? $selected;

$field = static fn (string $name): string => e($v[$name] ?? '');
$error = static fn (string $name): string => isset($errors[$name])
    ? '<p class="field__error" id="' . $name . '-error">' . e($errors[$name]) . '</p>'
    : '';
$invalid = static fn (string $name): string => isset($errors[$name])
    ? ' aria-invalid="true" aria-describedby="' . $name . '-error"'
    : '';
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Contact</p>
        <h1 class="page-hero__title">Book your free strategy call</h1>
        <p class="page-hero__lead">Tell us about your business and goals. We will reply within one business day — en inglés o en español.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container split">
        <form class="form panel" method="post" action="/contact/" novalidate>
            <?php if (isset($errors['form'])): ?>
                <p class="alert" role="alert"><?= e($errors['form']) ?></p>
            <?php endif; ?>
            <input type="hidden" name="_token" value="<?= e(csrf_token()) ?>">
            <div class="hp" aria-hidden="true">
                <label for="fax">Leave this field empty</label>
                <input type="text" id="fax" name="fax" tabindex="-1" autocomplete="off">
            </div>

            <div class="form__row">
                <div class="field">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" required autocomplete="name" value="<?= $field('name') ?>"<?= $invalid('name') ?>>
                    <?= $error('name') ?>
                </div>
                <div class="field">
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company" autocomplete="organization" value="<?= $field('company') ?>">
                </div>
            </div>
            <div class="form__row">
                <div class="field">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required autocomplete="email" value="<?= $field('email') ?>"<?= $invalid('email') ?>>
                    <?= $error('email') ?>
                </div>
                <div class="field">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" autocomplete="tel" value="<?= $field('phone') ?>"<?= $invalid('phone') ?>>
                    <?= $error('phone') ?>
                </div>
            </div>
            <div class="form__row">
                <div class="field">
                    <label for="website">Website</label>
                    <input type="url" id="website" name="website" placeholder="https://" autocomplete="url" value="<?= $field('website') ?>">
                </div>
                <div class="field">
                    <label for="service">Service of interest</label>
                    <select id="service" name="service">
                        <option value="">Not sure yet</option>
                        <?php foreach ($services as $s): ?>
                            <option value="<?= e($s['name']) ?>"<?= $selected === $s['name'] ? ' selected' : '' ?>><?= e($s['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="field">
                <label for="message">How can we help?</label>
                <textarea id="message" name="message" rows="5"><?= $field('message') ?></textarea>
            </div>
            <button type="submit" class="btn btn--primary btn--lg btn--block">Send my request</button>
            <p class="form__note">By submitting, you agree to our <a href="/privacy-policy/">Privacy Policy</a>. We never share your information.</p>
        </form>

        <aside>
            <div class="panel">
                <h2 class="panel__title">Visit or call</h2>
                <address class="contact-list">
                    <p><?= icon('pin', 'icon icon--sm') ?> <a href="<?= e($b['maps_url']) ?>" target="_blank" rel="noopener"><?= e($b['street']) ?>, <?= e($b['city']) ?>, <?= e($b['region']) ?> <?= e($b['postal_code']) ?></a></p>
                    <p><?= icon('phone', 'icon icon--sm') ?> <a href="<?= e(phone_link()) ?>"><?= e($b['phone']) ?></a></p>
                    <p><?= icon('mail', 'icon icon--sm') ?> <a href="mailto:<?= e($b['email']) ?>"><?= e($b['email']) ?></a></p>
                    <p><?= icon('clock', 'icon icon--sm') ?> <?= e($b['hours_label']) ?></p>
                </address>
            </div>
            <div class="map">
                <iframe title="Map to <?= e($b['name']) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        src="https://maps.google.com/maps?q=<?= e(urlencode($b['street'] . ', ' . $b['city'] . ', ' . $b['region'] . ' ' . $b['postal_code'])) ?>&amp;output=embed"></iframe>
            </div>
        </aside>
    </div>
</section>
