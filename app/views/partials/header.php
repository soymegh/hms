<?php
/** @var \App\Seo $seo */
$b = config('business');
$services = data('services');
$locations = data('locations');
$industries = data('industries');
$isEs = $seo->lang() === 'es';
?>
<div class="topbar">
    <div class="container topbar__inner">
        <span class="topbar__note"><?= icon('pin', 'icon icon--sm') ?> <?= $isEs ? 'Agencia bilingüe en Denver, Colorado' : 'Bilingual marketing agency · Denver, Colorado' ?></span>
        <div class="topbar__actions">
            <a href="<?= e(phone_link()) ?>" class="topbar__link"><?= icon('phone', 'icon icon--sm') ?> <?= e($b['phone']) ?></a>
            <a href="<?= $isEs ? '/' : '/es/' ?>" class="topbar__link" hreflang="<?= $isEs ? 'en' : 'es' ?>" lang="<?= $isEs ? 'en' : 'es' ?>"><?= $isEs ? 'English' : 'Español' ?></a>
            <button type="button" class="theme-toggle" data-theme-toggle aria-label="Toggle dark mode">
                <?= icon('moon', 'icon icon--sm theme-toggle__moon') ?><?= icon('sun', 'icon icon--sm theme-toggle__sun') ?>
            </button>
        </div>
    </div>
</div>

<header class="site-header" data-header>
    <div class="container site-header__inner">
        <a href="<?= $isEs ? '/es/' : '/' ?>" class="logo" aria-label="<?= e($b['name']) ?> — home">
            <img class="logo__light" src="<?= e(asset('img/logo-hms.webp')) ?>" alt="<?= e($b['name']) ?> — Marketing Agency Denver" width="242" height="40" fetchpriority="high">
            <img class="logo__dark" src="<?= e(asset('img/logo-hms-white.webp')) ?>" alt="" width="242" height="40">
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" data-nav-toggle>
            <span class="sr-only">Menu</span><span class="nav-toggle__bar"></span>
        </button>

        <nav id="primary-nav" class="nav" aria-label="Primary" data-nav>
            <ul class="nav__list">
                <li class="nav__item has-menu">
                    <a href="/services/" class="nav__link" aria-haspopup="true">Services <?= icon('chevron', 'icon icon--xs') ?></a>
                    <div class="mega">
                        <ul class="mega__grid">
                            <?php foreach ($services as $slug => $s): ?>
                                <li>
                                    <a href="<?= e($s['path']) ?>" class="mega__link">
                                        <span class="mega__icon"><?= icon($s['icon']) ?></span>
                                        <span>
                                            <strong><?= e($s['nav']) ?><?php if ($s['badge']): ?> <em class="badge"><?= e($s['badge']) ?></em><?php endif; ?></strong>
                                            <small><?= e($s['short']) ?></small>
                                        </span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
                <li class="nav__item has-menu">
                    <a href="/industries/" class="nav__link" aria-haspopup="true">Industries <?= icon('chevron', 'icon icon--xs') ?></a>
                    <div class="mega mega--sm">
                        <ul class="mega__list">
                            <?php foreach ($industries as $slug => $i): ?>
                                <li><a href="<?= e($i['path']) ?>"><?= e($i['name']) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
                <li class="nav__item has-menu">
                    <a href="/locations/" class="nav__link" aria-haspopup="true">Locations <?= icon('chevron', 'icon icon--xs') ?></a>
                    <div class="mega mega--sm">
                        <ul class="mega__list">
                            <?php foreach ($locations as $slug => $l): ?>
                                <li><a href="<?= e($l['path']) ?>"><?= e($l['name']) ?>, CO</a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
                <li class="nav__item"><a href="/tools/" class="nav__link">Free Tools</a></li>
                <li class="nav__item"><a href="/about/" class="nav__link">About</a></li>
            </ul>
            <a href="<?= e(config('integrations.booking_url')) ?>" class="btn btn--primary nav__cta"><?= $isEs ? 'Consulta gratis' : 'Free strategy call' ?></a>
        </nav>
    </div>
</header>
