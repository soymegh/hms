<?php
/**
 * @var array<int, array{q:string,a:string}> $faqs
 * @var string|null $heading
 */
$heading ??= 'Frequently asked questions';
?>
<section class="section" aria-labelledby="faq-title">
    <div class="container container--narrow">
        <p class="eyebrow">FAQ</p>
        <h2 id="faq-title" class="section__title"><?= e($heading) ?></h2>
        <div class="faq">
            <?php foreach ($faqs as $faq): ?>
                <details class="faq__item">
                    <summary><?= e($faq['q']) ?><?= icon('plus', 'icon icon--sm') ?></summary>
                    <div class="faq__answer"><p><?= e($faq['a']) ?></p></div>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
