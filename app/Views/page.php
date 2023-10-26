<?php $this->extend('docs') ?>

<?php $this->start('content'); ?>

<div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
        <?= $this->insert('docs/sidebar') ?>

        <main class="bd-main order-1">
            <div class="bd-intro pt-2 ps-lg-2">
                <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                    <div class="mb-3 mb-md-0 d-flex text-nowrap">
                        <?php if(($errorPage ?? null) !== true): ?>
                        <a class="btn btn-sm btn-bd-light rounded-2"
                            href="https://github.com/blitz-php/docs/blob/<?= $currentVersion ?>/<?= $currentSection ?? 'installation' ?>.md"
                            title="<?= __('Voir et modifier ce fichier sur GitHub') ?>" target="_blank" rel="noopener">
                            <?= __('Voir sur GitHub') ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    <h1 class="bd-title mb-0" id="content"><?= $title ?></h1>
                </div>

                <p class="bd-lead"><?= $description ?? '' ?></p>
            </div>

            <?= $this->insertWhen(($errorPage ?? null) !== true, 'docs/summary') ?>
            
            <div class="bd-content ps-lg-2">
                <?= $this->insertWhen(($errorPage ?? null) !== true, 'docs/deprecation-warning') ?>
            
                <div id="guide-content">
                    <?= $content ?>
                </div>
            </div>
        </main>
    </div>

<?php $this->end(); ?>