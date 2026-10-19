<?php $b = config('business'); ?>
<section class="section">
    <div class="container container--narrow prose">
        <h1>Privacy Policy</h1>
        <p><em>Last updated: <?= e(date('F j, Y', (int) filemtime(__FILE__))) ?></em></p>
        <p><?= e($b['name']) ?> (“we”, “us”) respects your privacy. This policy explains what information we collect through this website and how we use it.</p>
        <h2>Information we collect</h2>
        <p>When you submit our contact form we collect the details you provide, such as your name, email, phone number, company and message. We also collect standard analytics data (pages visited, device and approximate location) through cookies and similar technologies.</p>
        <h2>How we use information</h2>
        <ul>
            <li>To respond to your enquiry and provide our services.</li>
            <li>To improve our website and marketing.</li>
            <li>To comply with legal obligations.</li>
        </ul>
        <p>We do not sell your personal information.</p>
        <h2>Cookies and analytics</h2>
        <p>We may use Google Analytics and advertising pixels to understand how visitors use our site. You can disable cookies in your browser settings.</p>
        <h2>Your rights</h2>
        <p>Colorado residents may have rights under the Colorado Privacy Act, including the right to access, correct or delete personal data. Contact us to make a request.</p>
        <h2>Contact</h2>
        <p><?= e($b['name']) ?>, <?= e($b['street']) ?>, <?= e($b['city']) ?>, <?= e($b['region']) ?> <?= e($b['postal_code']) ?> · <a href="mailto:<?= e($b['email']) ?>"><?= e($b['email']) ?></a> · <a href="<?= e(phone_link()) ?>"><?= e($b['phone']) ?></a></p>
        <p><small>This policy is a general template. Have it reviewed by legal counsel before relying on it.</small></p>
    </div>
</section>
