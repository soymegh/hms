<?php
/**
 * XML sitemap (sitemaps.org 0.9) with hreflang pairs for the EN/ES home pages.
 *
 * @var array<int, array{path:string, lastmod:string}> $entries
 */
$hreflang = ['en-US' => '/', 'es-US' => '/es/', 'x-default' => '/'];
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
// Styled view for humans; crawlers ignore the stylesheet and read the XML.
echo '<?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
<?php foreach ($entries as $entry): ?>
  <url>
    <loc><?= e(url($entry['path'])) ?></loc>
    <lastmod><?= e($entry['lastmod']) ?></lastmod>
<?php if (in_array($entry['path'], $hreflang, true)): ?>
<?php foreach ($hreflang as $lang => $altPath): ?>
    <xhtml:link rel="alternate" hreflang="<?= e($lang) ?>" href="<?= e(url($altPath)) ?>"/>
<?php endforeach; ?>
<?php endif; ?>
  </url>
<?php endforeach; ?>
</urlset>
