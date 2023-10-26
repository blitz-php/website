<?php $this->start('description', $metadata['description'] ?? '') ?>
<?php $this->start('title', $metadata['title'] ?? '') ?>

<?php $this->extend('default') ?>

<?php $this->start('content'); ?>

<div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
    <?= $this->insert('sidebar') ?>

    <main class="bd-main order-1">
        <div class="bd-intro pt-2 ps-lg-2">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                <div class="mb-3 mb-md-0 d-flex text-nowrap">
                    <a class="btn btn-sm btn-bd-light rounded-2"
                        href="https://github.com/blitz-php/docs/blob/<?= $currentVersion ?? DEFAULT_VERSION ?>/<?= $currentSection ?? 'installation' ?>.md"
                        title="Voir et modifier ce fichier sur GitHub" target="_blank" rel="noopener">
                        Voir sur GitHub
                    </a>
                </div>
                <h1 class="bd-title mb-0" id="content"><?= ucfirst($metadata['title'] ?? '') ?></h1>
            </div>

            <p class="bd-lead"><?= ucfirst($metadata['description'] ?? '') ?></p>
        </div>

        <?= $this->insert('toc') ?>
        
        <div class="bd-content ps-lg-2">
            <?= $this->insert('deprecation-warning') ?>
        
            <div id="guide-content" class="docs_main">
                <?= $content ?>
            </div>
        </div>
    </main>
</div>

<?php $this->end(); ?>

<?php $this->start('script'); ?>

<script src="<?= js_url('userguide') ?>"></script>
<script src="<?= js_url('toc') ?>"></script>
<script>
    s = new TOC(document.getElementById('guide-content'));
    s.appendTo(document.getElementById('TableOfContents'));
</script>

<?php $this->end(); ?>