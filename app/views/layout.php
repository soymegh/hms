<?php
/**
 * @var \App\Seo $seo
 * @var string $content
 */
use App\View;

$gtm = config('integrations.gtm_id');
$ga4 = config('integrations.ga4_id');
?>
<!doctype html>
<html lang="<?= e($seo->lang()) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $seo->renderHead() ?>

    <meta name="theme-color" content="#430059">
    <link rel="icon" href="<?= e(asset('img/favicon-48.png')) ?>" type="image/png" sizes="48x48">
    <link rel="apple-touch-icon" href="<?= e(asset('img/apple-touch-icon.png')) ?>">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="<?= e(asset('css/main.css')) ?>">

    <script>
        // Apply saved theme before paint to avoid a flash of the wrong theme.
        try { const t = localStorage.getItem('theme'); if (t) document.documentElement.dataset.theme = t; } catch (e) {}
    </script>
<?php if ($gtm): ?>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?= e($gtm) ?>');</script>
<?php elseif ($ga4): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= e($ga4) ?>"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?= e($ga4) ?>');</script>
<?php endif; ?>
</head>
<body>
<?php if ($gtm): ?>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= e($gtm) ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php endif; ?>
    <a class="skip-link" href="#main"><?= $seo->lang() === 'es' ? 'Saltar al contenido' : 'Skip to content' ?></a>
    <?= View::partial('header', ['seo' => $seo]) ?>

    <main id="main">
        <?php if ($seo->getBreadcrumbs()): ?>
            <?= View::partial('breadcrumbs', ['crumbs' => $seo->getBreadcrumbs()]) ?>
        <?php endif; ?>
        <?= $content ?>
    </main>

    <?= View::partial('footer', ['seo' => $seo]) ?>
    <?= View::partial('mobile-cta') ?>

    <script src="<?= e(asset('js/main.js')) ?>" defer></script>
</body>
</html>
