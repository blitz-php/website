<footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
    <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none"
                    href="<?= site_url() ?>" aria-label="BliztPHP">
                    <img src="<?= img_url('logo/logo-mini-transparent.png') ?>" alt="BlitzPHP" style="height: 2em;" />
                    <span class="fs-5">BlitzPHP</span>
                </a>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        Développé avec amour et passion à travers le monde par
                        <a href="<?= link_to('equipe') ?>"><?= __('l\'équipe BlitzPHP') ?></a> <?= __('avec l\'aide de') ?>  
                        <a href="https://github.com/blitz-php/framework/graphs/contributors"><?= __('nos contributeurs') ?></a>.
                    </li>
                    <li class="mb-2">
                        Le code est sur la licence
                        <a href="https://github.com/blitz-php/framework/blob/main/LICENSE" target="_blank"
                            rel="license noopener">MIT</a>, 
                        la documentation sur
                        <a href="https://creativecommons.org/licenses/by/3.0/" target="_blank" rel="license noopener">CC BY 3.0</a>.
                    </li>
                    <li class="mb-2"><?= __('Version actuelle') ?>: <?= DEFAULT_VERSION ?>.</li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                <h5>Liens</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="<?= site_url() ?>">Accueil</a></li>
                    <li class="mb-2"><a href="<?= link_to('docs') ?>">Documentation</a></li>
                    <li class="mb-2"><a href="<?= link_to('goto', 'learn') ?>">Tutoriels</a></li>
                    <li class="mb-2"><a href="<?= link_to('ecosysteme') ?>">Ecosystème</a></li>
                    <li class="mb-2"><a href="<?= link_to('goto', 'blog') ?>" target="_blank" rel="noopener">Blog</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
                <h5>Guides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="<?= link_to('docs.version', $currentVersion ?? DEFAULT_VERSION, 'installation') ?>">Démarrer</a></li>
                    <li class="mb-2"><a href="<?= link_to('docs.version', $currentVersion ?? DEFAULT_VERSION, 'routage') ?>">Routage</a></li>
                    <li class="mb-2"><a href="<?= link_to('docs.version', $currentVersion ?? DEFAULT_VERSION, 'schild-authentification') ?>">Authentification</a></li>
                    <li class="mb-2"><a href="<?= link_to('docs.version', $currentVersion ?? DEFAULT_VERSION, 'schild-autorisation') ?>">Autorisation</a></li>
                    <li class="mb-2"><a href="<?= link_to('docs.version', $currentVersion ?? DEFAULT_VERSION, 'klinge') ?>">La console <span translate="no">Klinge</span></a></li>
                    <li class="mb-2"><a href="<?= link_to('docs.version', $currentVersion ?? DEFAULT_VERSION, 'base-de-donnees') ?>">Base de données</a></li>
                    <li class="mb-2"><a href="<?= link_to('docs.version', $currentVersion ?? DEFAULT_VERSION, 'wolke') ?>">L'ORM <span translate="no">Wolke</span></a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
                <h5>Projets</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a target="_blank" rel="noopener" href="<?= link_to('goto', 'folio') ?>">Folio</a></li>
                    <li class="mb-2"><a target="_blank" rel="noopener" href="<?= link_to('goto', 'build-with-blitz') ?>">Projets faits avec BlitzPHP</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
                <h5>Communauté</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a target="_blank" rel="noopener" href="<?= link_to('goto', 'forum') ?>">Forum</a></li>
                    <li class="mb-2"><a target="_blank" rel="noopener" href="<?= link_to('goto', 'issues') ?>">Signalez un probème</a></li>
                    <li class="mb-2"><a target="_blank" rel="noopener" href="<?= link_to('goto', 'fork') ?>">Contribuer qui projet</a></li>
                    <li class="mb-2"><a target="_blank" rel="noopener" href="https://github.com/sponsors/blitz-php">Sponsors</a></li>
                    <li class="mb-2"><a target="_blank" rel="noopener" href="https://opencollective.com/blitz-php">Open Collective</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>