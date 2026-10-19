<?php
/** @var \App\Seo $seo */
$b = config('business');
$services = data('services');
$locations = data('locations');
$industries = data('industries');
?>
<footer class="site-footer">
    <div class="container footer__grid">
        <div class="footer__brand">
            <a href="/" class="logo logo--footer" aria-label="<?= e($b['name']) ?> — home">
                <img src="<?= e(asset('img/logo-hms-white.webp')) ?>" alt="<?= e($b['name']) ?>" width="242" height="40" loading="lazy">
            </a>
            <p>Bilingual digital marketing agency helping Colorado businesses grow with SEO, Google Ads, web design and Hispanic marketing.</p>
            <address class="footer__nap">
                <strong><?= e($b['name']) ?></strong><br>
                <a href="<?= e($b['maps_url']) ?>" target="_blank" rel="noopener"><?= e($b['street']) ?><br><?= e($b['city']) ?>, <?= e($b['region']) ?> <?= e($b['postal_code']) ?></a><br>
                <a href="<?= e(phone_link()) ?>"><?= e($b['phone']) ?></a><br>
                <a href="mailto:<?= e($b['email']) ?>"><?= e($b['email']) ?></a><br>
                <span><?= e($b['hours_label']) ?></span>
            </address>
            <ul class="social" aria-label="Social media">
                <?php foreach ($b['social'] as $network => $href): ?>
                    <li><a href="<?= e($href) ?>" target="_blank" rel="noopener" aria-label="<?= e(ucfirst($network)) ?>"><?= icon($network) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h2 class="footer__title">Services</h2>
            <ul class="footer__links">
                <?php foreach ($services as $slug => $s): ?>
                    <li><a href="<?= e($s['path']) ?>"><?= e($s['nav']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h2 class="footer__title">Areas We Serve</h2>
            <ul class="footer__links">
                <?php foreach ($locations as $slug => $l): ?>
                    <li><a href="<?= e($l['path']) ?>"><?= e($l['name']) ?>, CO</a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h2 class="footer__title">Industries</h2>
            <ul class="footer__links">
                <?php foreach ($industries as $slug => $i): ?>
                    <li><a href="<?= e($i['path']) ?>"><?= e($i['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h2 class="footer__title footer__title--spaced">Company</h2>
            <ul class="footer__links">
                <li><a href="/about/">About Us</a></li>
                <li><a href="/tools/">Free Marketing Tools</a></li>
                <li><a href="/contact/">Contact</a></li>
                <li><a href="/es/" hreflang="es" lang="es">Marketing en Español</a></li>
            </ul>
        </div>
    </div>

    <div class="container footer__bottom">
        <p>&copy; <?= date('Y') ?> <?= e($b['legal_name']) ?> (<?= e($b['name']) ?>). All rights reserved.</p>
        <ul>
            <li><a href="/privacy-policy/">Privacy Policy</a></li>
            <li><a href="/terms/">Terms of Service</a></li>
            <li><a href="/sitemap.xml">Sitemap</a></li>
        </ul>
    </div>
</footer>
