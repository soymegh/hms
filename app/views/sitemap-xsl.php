<?php
/**
 * XSL stylesheet that renders sitemap.xml as a readable page in browsers.
 * Search engines ignore it and read the raw XML.
 */
$b = config('business');
$base = rtrim(url('/'), '/');
// '|/a/|/b/|' lists let XPath test membership with contains(). The home page
// shares Denver's path, so '/' is excluded and always shows as a plain page.
$list = static fn (string $set): string => '|' . implode('|', array_diff(array_column(data($set), 'path'), ['/'])) . '|';
$types = [
    'service'  => $list('services'),
    'location' => $list('locations'),
    'landing'  => $list('landings'),
    'industry' => $list('industries'),
    'tool'     => $list('tools'),
];
$is = static fn (string $type, string $node): string => "contains('" . $types[$type] . "', concat('|', substring-after($node, '" . $base . "'), '|'))";
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:s="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xhtml="http://www.w3.org/1999/xhtml"
    exclude-result-prefixes="s xhtml">

<xsl:output method="html" encoding="UTF-8" indent="yes" doctype-system="about:legacy-compat"/>

<xsl:template match="/">
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="robots" content="noindex"/>
    <title>XML Sitemap · <?= e($b['name']) ?></title>
    <link rel="icon" href="<?= e(asset('img/favicon-48.png')) ?>" type="image/png"/>
    <style>
        :root {
            --bg: #f7f4f9; --surface: #fff; --text: #171717; --muted: #4e4b66; --border: #e7e1ec;
            --brand: #430059; --brand-dark: #2a0038; --lime: #bfdd00; --soft: #f3e9f7;
        }
        @media (prefers-color-scheme: dark) {
            :root { --bg: #140019; --surface: #250a31; --text: #f3eef6; --muted: #bfb2c9; --border: #3a1c48; --brand: #bfdd00; --soft: #2f1240; }
            .tag--service { background: #7a2a99 !important; }
        }
        * { box-sizing: border-box; }
        body { margin: 0; font: 15px/1.6 system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; background: var(--bg); color: var(--text); }
        header { background: linear-gradient(135deg, #430059, var(--brand-dark)); color: #fff; padding: 40px 16px 72px; }
        .wrap { max-width: 1080px; margin: 0 auto; }
        header img { height: 36px; width: auto; display: block; margin-bottom: 28px; }
        h1 { margin: 0 0 8px; font-size: clamp(1.6rem, 4vw, 2.2rem); letter-spacing: -.02em; }
        header p { margin: 0; color: #e3d6ea; max-width: 680px; }
        header a { color: var(--lime); }
        .stats { display: flex; flex-wrap: wrap; gap: 12px; margin: -44px auto 24px; padding: 0 16px; }
        .stat { flex: 1 1 140px; background: var(--surface); border: 1px solid var(--border); border-radius: 14px; padding: 16px 18px; box-shadow: 0 8px 24px rgb(23 0 30 / .06); }
        .stat b { display: block; font-size: 1.7rem; color: var(--brand); line-height: 1.1; }
        .stat span { font-size: .8rem; color: var(--muted); font-weight: 600; text-transform: uppercase; letter-spacing: .05em; }
        main { padding: 0 16px 48px; }
        .card { background: var(--surface); border: 1px solid var(--border); border-radius: 14px; overflow-x: auto; }
        html, body { overflow-x: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; font-size: .75rem; text-transform: uppercase; letter-spacing: .06em; color: var(--muted); background: var(--soft); padding: 12px 16px; }
        td { padding: 12px 16px; border-top: 1px solid var(--border); vertical-align: middle; }
        tr:hover td { background: var(--soft); }
        td.n { color: var(--muted); width: 48px; font-variant-numeric: tabular-nums; }
        td a { color: var(--text); text-decoration: none; font-weight: 600; word-break: break-all; }
        td a:hover { color: var(--brand); text-decoration: underline; }
        .tag { display: inline-block; font-size: .72rem; font-weight: 700; padding: 3px 10px; border-radius: 999px; white-space: nowrap; background: var(--soft); color: var(--brand); }
        .tag--service { background: #430059; color: #fff; }
        .tag--location { background: #bfdd00; color: #171717; }
        .tag--landing { background: #6d1f8a; color: #fff; }
        .tag--page { background: transparent; border: 1px solid var(--border); color: var(--muted); }
        .lang { margin-left: 6px; font-size: .7rem; color: var(--muted); font-weight: 700; }
        .date { white-space: nowrap; color: var(--muted); font-variant-numeric: tabular-nums; }
        footer { text-align: center; color: var(--muted); font-size: .85rem; padding: 0 16px 40px; }
        footer a { color: var(--brand); }
        @media (max-width: 640px) {
            th.hide, td.hide { display: none; }
            td, th { padding: 10px 12px; }
            td a { font-size: .875rem; }
            .stat { flex-basis: calc(50% - 6px); }
            .stat b { font-size: 1.4rem; }
            header { padding: 28px 16px 64px; }
        }
    </style>
</head>
<body>
    <header>
        <div class="wrap">
            <img src="<?= e(asset('img/logo-hms-white.webp')) ?>" alt="<?= e($b['name']) ?>" width="218" height="36"/>
            <h1>XML Sitemap</h1>
            <p>This sitemap lists every page search engines should index on <a href="<?= e(url('/')) ?>"><?= e(parse_url(url('/'), PHP_URL_HOST)) ?></a>. Google and Bing read the raw XML; this styled view is for people. Learn more at <a href="https://www.sitemaps.org/" rel="noopener">sitemaps.org</a>.</p>
        </div>
    </header>

    <div class="wrap stats">
        <div class="stat"><b><xsl:value-of select="count(s:urlset/s:url)"/></b><span>Total URLs</span></div>
        <div class="stat"><b><xsl:value-of select="count(s:urlset/s:url[<?= $is('service', 's:loc') ?>])"/></b><span>Services</span></div>
        <div class="stat"><b><xsl:value-of select="count(s:urlset/s:url[<?= $is('location', 's:loc') ?> or <?= $is('landing', 's:loc') ?>])"/></b><span>Location pages</span></div>
        <div class="stat"><b><xsl:value-of select="count(s:urlset/s:url[<?= $is('industry', 's:loc') ?>])"/></b><span>Industries</span></div>
        <div class="stat"><b><xsl:value-of select="count(s:urlset/s:url[<?= $is('tool', 's:loc') ?>])"/></b><span>Free tools</span></div>
    </div>

    <main class="wrap">
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th class="hide">#</th>
                        <th>Page (<?= e(parse_url($base, PHP_URL_HOST)) ?>)</th>
                        <th>Type</th>
                        <th class="hide">Last modified</th>
                    </tr>
                </thead>
                <tbody>
                    <xsl:for-each select="s:urlset/s:url">
                        <xsl:variable name="loc" select="s:loc"/>
                        <tr>
                            <td class="n hide"><xsl:value-of select="position()"/></td>
                            <td>
                                <a href="{$loc}" title="{$loc}"><xsl:choose><xsl:when test="substring-after($loc, '<?= e($base) ?>') != ''"><xsl:value-of select="substring-after($loc, '<?= e($base) ?>')"/></xsl:when><xsl:otherwise><xsl:value-of select="$loc"/></xsl:otherwise></xsl:choose></a>
                                <xsl:if test="xhtml:link">
                                    <span class="lang"><xsl:value-of select="count(xhtml:link)"/> hreflang</span>
                                </xsl:if>
                            </td>
                            <td>
                                <xsl:choose>
                                    <xsl:when test="<?= $is('service', '$loc') ?>"><span class="tag tag--service">Service</span></xsl:when>
                                    <xsl:when test="<?= $is('landing', '$loc') ?>"><span class="tag tag--landing">Service + city</span></xsl:when>
                                    <xsl:when test="<?= $is('location', '$loc') ?>"><span class="tag tag--location">Location</span></xsl:when>
                                    <xsl:when test="<?= $is('industry', '$loc') ?>"><span class="tag">Industry</span></xsl:when>
                                    <xsl:when test="<?= $is('tool', '$loc') ?>"><span class="tag">Free tool</span></xsl:when>
                                    <xsl:otherwise><span class="tag tag--page">Page</span></xsl:otherwise>
                                </xsl:choose>
                            </td>
                            <td class="date hide">
                                <xsl:value-of select="substring(s:lastmod, 1, 10)"/>
                                <xsl:if test="string-length(s:lastmod) &gt; 10">
                                    <xsl:text> · </xsl:text><xsl:value-of select="substring(s:lastmod, 12, 5)"/>
                                </xsl:if>
                            </td>
                        </tr>
                    </xsl:for-each>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <?= e($b['name']) ?> · <a href="<?= e(url('/')) ?>">Marketing Agency Denver</a> · <a href="<?= e(url('/llms.txt')) ?>">llms.txt</a> · <a href="<?= e(url('/robots.txt')) ?>">robots.txt</a>
    </footer>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
