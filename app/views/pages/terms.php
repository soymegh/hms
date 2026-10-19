<?php $b = config('business'); ?>
<section class="section">
    <div class="container container--narrow prose">
        <h1>Terms of Service</h1>
        <p><em>Last updated: <?= e(date('F j, Y', (int) filemtime(__FILE__))) ?></em></p>
        <p>By using this website you agree to these terms. If you do not agree, please do not use the site.</p>
        <h2>Use of content</h2>
        <p>All content on this site is owned by <?= e($b['legal_name']) ?> unless otherwise noted and may not be reproduced without permission.</p>
        <h2>No guarantees</h2>
        <p>Information on this website is provided for general purposes. Marketing results vary, and no specific ranking, traffic or revenue outcome is guaranteed. Service terms are set out in individual client agreements.</p>
        <h2>Third-party links</h2>
        <p>We are not responsible for the content or practices of websites we link to.</p>
        <h2>Governing law</h2>
        <p>These terms are governed by the laws of the State of Colorado.</p>
        <h2>Contact</h2>
        <p><a href="mailto:<?= e($b['email']) ?>"><?= e($b['email']) ?></a> · <a href="<?= e(phone_link()) ?>"><?= e($b['phone']) ?></a></p>
        <p><small>These terms are a general template. Have them reviewed by legal counsel before relying on them.</small></p>
    </div>
</section>
