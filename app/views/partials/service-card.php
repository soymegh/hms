<?php
/**
 * @var string $slug
 * @var array $service
 */
?>
<article class="card card--service">
    <span class="card__icon"><?= icon($service['icon']) ?></span>
    <h3 class="card__title">
        <a href="<?= e($service['path']) ?>" class="card__link"><?= e($service['name']) ?></a>
        <?php if ($service['badge']): ?><em class="badge"><?= e($service['badge']) ?></em><?php endif; ?>
    </h3>
    <p><?= e($service['short']) ?></p>
    <span class="card__more" aria-hidden="true">Explore <?= icon('arrow', 'icon icon--sm') ?></span>
</article>
