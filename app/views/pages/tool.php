<?php
/**
 * Shell for a single free tool; the interactive part lives in partials/tools/{slug}.php.
 *
 * @var array $tool
 * @var string $toolSlug
 * @var array|null $service
 */
use App\View;
?>
<section class="page-hero">
    <div class="container container--narrow">
        <p class="eyebrow"><?= icon($tool['icon'], 'icon icon--sm') ?> Free tool</p>
        <h1 class="page-hero__title"><?= e($tool['h1']) ?></h1>
        <p class="page-hero__lead"><?= e($tool['short']) ?> Free, private and no sign-up — everything runs in your browser.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container container--narrow">
        <div class="panel tool" data-tool="<?= e($toolSlug) ?>">
            <?= View::partial('tools/' . $toolSlug) ?>
        </div>
        <?php if ($service): ?>
            <p class="tool__upsell">Want experts to handle this for you? <a href="<?= e($service['path']) ?>" class="link-arrow"><?= e($service['name']) ?> in Denver <?= icon('arrow', 'icon icon--sm') ?></a></p>
        <?php endif; ?>
    </div>
</section>

<?= View::partial('faq', ['faqs' => $tool['faqs'], 'heading' => $tool['name'] . ' FAQs']) ?>
<?= View::partial('cta') ?>
