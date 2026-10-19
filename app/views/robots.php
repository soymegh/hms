<?php
/**
 * robots.txt — open to search engines and AI answer engines in production,
 * closed to everyone on staging.
 *
 * All crawlers share ONE group on purpose: a bot obeys only the most specific
 * group naming it, so a separate "User-agent: GPTBot / Allow: /" group would
 * make GPTBot ignore the Disallow rules below.
 */
if (is_staging()) {
    echo "# Staging copy: do not crawl. The live site is https://hmsdenver.com\nUser-agent: *\nDisallow: /\n";
    return;
}

// AI search and answer engines are welcome: we want HMS cited in AI answers.
$agents = ['*', 'Googlebot', 'Bingbot', 'GPTBot', 'OAI-SearchBot', 'ChatGPT-User', 'PerplexityBot', 'ClaudeBot', 'Claude-SearchBot', 'Google-Extended', 'Applebot-Extended'];
?>
<?php foreach ($agents as $agent): ?>
User-agent: <?= $agent ?>

<?php endforeach; ?>
Allow: /
Disallow: /thank-you/
Disallow: /contact/?*
Disallow: /app/
Disallow: /storage/

Sitemap: <?= url('/sitemap.xml') ?>

