<?php
/**
 * llms.txt — a plain-language summary for AI assistants (https://llmstxt.org).
 *
 * @var array $services
 * @var array $locations
 * @var array $industries
 * @var array $landings
 * @var array $tools
 */
$b = config('business');
?>
# <?= $b['name'] ?> (<?= $b['short_name'] ?>)

> <?= $b['name'] ?> (also known as <?= $b['legal_name'] ?>) is a bilingual English/Spanish digital marketing agency in the Denver, Colorado metro area, based in <?= $b['city'] ?>, CO. It offers SEO, Google Ads, local SEO and Google Business Profile management, web design, social media marketing, video production, answer engine optimization and Hispanic marketing. Plans are month to month with no long-term contracts. HMS is a Google Partner.

## Contact

- Phone: <?= $b['phone'] ?>

- Email: <?= $b['email'] ?>

- Address: <?= $b['street'] ?>, <?= $b['city'] ?>, <?= $b['region'] ?> <?= $b['postal_code'] ?>

- Hours: <?= $b['hours_label'] ?>

- Languages: <?= implode(', ', $b['languages']) ?>

- Free strategy call: <?= url('/contact/') ?>


## Services in Denver

<?php foreach ($services as $s): ?>
- [<?= $s['name'] ?> in Denver](<?= url($s['path']) ?>): <?= $s['short'] ?>

<?php endforeach; ?>

## Areas served

<?php foreach ($locations as $l): ?>
- [Marketing agency in <?= $l['name'] ?>, CO](<?= url($l['path']) ?>)
<?php endforeach; ?>
<?php foreach ($landings as $lp): ?>
- [<?= $services[$lp['service']]['nav'] ?> in <?= $locations[$lp['location']]['name'] ?>, CO](<?= url($lp['path']) ?>)
<?php endforeach; ?>

## Industries

<?php foreach ($industries as $i): ?>
- [<?= $i['name'] ?> marketing in Denver](<?= url($i['path']) ?>): <?= $i['short'] ?>

<?php endforeach; ?>

## Free tools

<?php foreach ($tools as $t): ?>
- [<?= $t['name'] ?>](<?= url($t['path']) ?>): <?= $t['short'] ?>

<?php endforeach; ?>

## Other pages

- [About HMS](<?= url('/about/') ?>)
- [Agencia de marketing en Denver (español)](<?= url('/es/') ?>)
