<?php /** @var array<int, array{0:string,1:string}> $crumbs */ ?>
<nav class="breadcrumbs container" aria-label="Breadcrumb">
    <ol>
        <li><a href="/">Home</a></li>
        <?php foreach ($crumbs as $i => [$name, $path]): ?>
            <?php if ($i === array_key_last($crumbs)): ?>
                <li aria-current="page"><?= e($name) ?></li>
            <?php else: ?>
                <li><a href="<?= e($path) ?>"><?= e($name) ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>
</nav>
