<?php if (!(in_array($currentVersion, ['dev', 'master']) || version_compare($currentVersion, DEFAULT_VERSION) >= 0)): ?>
<div class="bd-callout bd-callout-danger">
    <div class="d-flex align-items-center">
        <svg class="bi">
            <use xlink:href="<?= get_bi_path('exclamation-triangle-fill') ?>"></use>
        </svg>
        <h4 class="ms-2 ">Attention</h4>
    </div>
    <p>
        Vous parcourez la documentation d\'une ancienne version de BlitzPHP.
        Pensez à mettre à niveau votre projet vers <a
            href="<?= link_to('docs.version', DEFAULT_VERSION, $currentSection ?? 'installation') ?>">BlitzPHP <?= DEFAULT_VERSION ?></a>.
    </p>
</div>
<?php endif; ?>

<?php if (in_array($currentVersion, ['dev', 'master']) || version_compare($currentVersion, DEFAULT_VERSION) > 0): ?>
<div class="bd-callout bd-callout-danger">
    <div class="d-flex align-items-center">
        <svg class="bi h1">
            <use xlink:href="<?= get_bi_path('exclamation-triangle-fill') ?>"></use>
        </svg>
        <h4 class="ms-2">Attention</h4>
    </div>
    <p>
        Vous parcourez la documentation d'une prochaine version de BlitzPHP.
        La documentation et les fonctionnalités de cette version sont susceptibles d'être modifiées.
    </p>
</div>
<?php endif; ?>