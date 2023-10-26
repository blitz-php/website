<!DOCTYPE html>
<html lang="<?= config('app.language') ?>" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?= $this->show('description', false) ?>" />
    <meta name="author" content="Dimitri Sitchet Tomkeu" />
    <meta name="docsearch:language" content="<?= config('app.language') ?>" />
    <meta name="docsearch:version" content="<?= $currentVersion ?? DEFAULT_VERSION ?>" />

    <title><?= $this->show('title', false) ?> · BlitzPHP</title>
    <link rel="icon" href="<?= img_url('logo/logo-mini-transparent.png') ?>" />

    <script src="<?= js_url('color-modes') ?>"></script>

    <link rel="stylesheet" href="<?= css_url('docsearch') ?>" />
    <link rel="stylesheet" href="<?= lib_css_url('bootstrap/bootstrap.min') ?>" />
    <link rel="stylesheet" href="<?= css_url('docs') ?>" />
    <link rel="stylesheet" href="<?= css_url('custom') ?>" />
    <link rel="stylesheet" href="<?= lib_css_url('prismjs/prism') ?>" />
</head>

<body data-bs-spy="scroll" data-bs-target="#TableOfContents"  class="line-numbers">
    <div class="skippy visually-hidden-focusable overflow-hidden">
        <div class="container-xl">
            <a class="d-inline-flex p-2 m-1" href="#content">Skip to main content</a>
            <a class="d-none d-md-inline-flex p-2 m-1" href="#bd-docs-nav">Skip to docs navigation</a>
        </div>
    </div>

    <?= $this->insert('header') ?>

    <?= $this->renderView() ?>

    <?= $this->insert('footer') ?>

    <script src="<?= lib_js_url('bootstrap/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= lib_js_url('prismjs/prism') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>
    <script src="<?= js_url('sdk.umd.js') ?>"></script>
    
    <?= $this->show('script') ?>
    <script src="<?= js_url('docs.min') ?>"></script>

    <div class="position-fixed" aria-hidden="true"><input type="text" tabindex="-1" /></div>
</body>

</html>