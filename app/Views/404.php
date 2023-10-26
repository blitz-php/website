<?php $this->start('title', 'Page non trouvée') ?>

<?php $this->extend('default') ?>

<?php $this->start('content'); ?>

<main class="my-auto p-5" id="content">
    <div class="text-center py-5">
        <h1 class="display-1">404</h1>
        <h2>Page not trouvée</h2>

        <?php if (isset($otherVersions)): ?>
            <?php if($otherVersions->isEmpty()): ?>
                <p>Rien à trouver ici.</p>
            <?php else: ?>
                <p>Cette page n'existe pas pour cette version de BlitzPHP mais a été trouvée dans d'autres versions.</p>
                <div>
                    <ul class="list-custom leading-4 space-y-3">
                        <?php foreach ($otherVersions as $key => $title): ?>
                            <li><a href="<?= site_url('/docs/' . $key . '/' . $page) ?>"><?= $title ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</main>

<?php $this->end(); ?>