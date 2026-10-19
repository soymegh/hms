<?php
/**
 * @var array $services
 * @var array $locations
 * @var array $faqs
 */
use App\View;

$b = config('business');
$serviciosEs = [
    'seo'                        => ['SEO en español', 'Posiciona tu negocio en Google cuando tus clientes buscan en español e inglés.'],
    'google-ads'                 => ['Google Ads', 'Campañas de pago que generan llamadas desde el primer día, con cada dólar medido.'],
    'social-media-marketing'     => ['Redes sociales', 'Contenido y anuncios en Facebook, Instagram y TikTok para la comunidad latina.'],
    'web-design'                 => ['Diseño web', 'Sitios rápidos, bilingües y optimizados para convertir visitantes en clientes.'],
    'google-business-profile'    => ['Perfil de Google', 'Aparece en Google Maps cuando buscan “cerca de mí” en tu zona.'],
    'hispanic-marketing'         => ['Marketing hispano', 'Mensajes culturalmente auténticos, no simples traducciones.'],
];
?>
<section class="hero">
    <div class="container hero__inner hero__inner--single">
        <div class="hero__copy">
            <p class="eyebrow eyebrow--pill"><?= icon('pin', 'icon icon--sm') ?> Denver, Colorado · Agencia bilingüe</p>
            <h1 class="hero__title">Agencia de marketing digital en Denver para negocios que quieren <span class="text-accent">crecer</span>.</h1>
            <p class="hero__lead">SEO, Google Ads, redes sociales y diseño web en español e inglés. Te ayudamos a conseguir más llamadas y clientes en todo Colorado, con resultados medibles y sin contratos largos.</p>
            <div class="hero__actions">
                <a href="/contact/" class="btn btn--primary btn--lg">Agenda tu consulta gratis</a>
                <a href="<?= e(phone_link()) ?>" class="btn btn--ghost btn--lg"><?= icon('phone', 'icon icon--sm') ?> <?= e($b['phone']) ?></a>
            </div>
            <ul class="checks hero__checks">
                <li><?= icon('check', 'icon icon--sm') ?> Google Partner</li>
                <li><?= icon('check', 'icon icon--sm') ?> Sin contratos</li>
                <li><?= icon('check', 'icon icon--sm') ?> Atención en español</li>
            </ul>
        </div>
    </div>
</section>

<section class="section" aria-labelledby="servicios-title">
    <div class="container">
        <div class="section__head">
            <p class="eyebrow">Servicios</p>
            <h2 id="servicios-title" class="section__title">Todo lo que tu negocio necesita para crecer en línea</h2>
        </div>
        <div class="grid grid--3">
            <?php foreach ($serviciosEs as $slug => [$nombre, $texto]): ?>
                <article class="card card--service">
                    <span class="card__icon"><?= icon($services[$slug]['icon']) ?></span>
                    <h3 class="card__title"><a href="<?= e($services[$slug]['path']) ?>" class="card__link" hreflang="en"><?= e($nombre) ?></a></h3>
                    <p><?= e($texto) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--alt" aria-labelledby="zonas-title">
    <div class="container">
        <h2 id="zonas-title" class="section__title">Áreas que servimos en Colorado</h2>
        <ul class="city-list city-list--inline">
            <?php foreach ($locations as $slug => $location): ?>
                <li><a href="<?= e($location['path']) ?>" hreflang="en"><?= icon('pin', 'icon icon--sm') ?> <?= e($location['name']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?= View::partial('faq', ['faqs' => $faqs, 'heading' => 'Preguntas frecuentes']) ?>

<section class="section cta-band">
    <div class="container cta-band__inner">
        <div>
            <h2 class="cta-band__title">¿Listo para conseguir más clientes?</h2>
            <p>Agenda una llamada gratuita de 30 minutos. Revisamos tu sitio web, tu posicionamiento y tus anuncios, y te mostramos dónde están las oportunidades.</p>
        </div>
        <div class="cta-band__actions">
            <a href="/contact/" class="btn btn--primary btn--lg">Agendar consulta gratis</a>
            <a href="<?= e(phone_link()) ?>" class="btn btn--light btn--lg"><?= icon('phone', 'icon icon--sm') ?> <?= e($b['phone']) ?></a>
        </div>
    </div>
</section>
