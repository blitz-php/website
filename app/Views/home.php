<?php $this->start('description', $metadata['description'] ?? '') ?>
<?php $this->start('title', 'Un framework simple pour un développement efficace') ?>

<?php $this->extend('default') ?>

<?php $this->start('content'); ?>

<main>

    <div class="bd-masthead mb-3" id="content">
        <div class="container-xxl bd-gutter">
            <div class="col-md-8 mx-auto text-center">
                <!-- <a class="d-flex flex-column flex-lg-row justify-content-center align-items-center mb-4 text-dark lh-sm text-decoration-none"
                    href="< ?= link_to('goto', 'blog') ?>">
                    <strong class="d-sm-inline-block p-2 me-2 mb-2 mb-lg-0 rounded-3 masthead-notice">New in v5.3</strong>
                    <span class="text-body-secondary">Color mode support, expanded color palette, and more!</span>
                </a> -->
                <img src="<?= img_url('logo/logo-mini-transparent.png') ?>" width="200" height="165" alt="BlitzPHP"
                    class="d-none d-sm-block mx-auto mb-3">
                <h1 class="mb-3 fw-semibold lh-1">Un framework simple pour un développement efficace</h1>
                <p class="lead mb-4">
                    BlitzPHP a été conçu de façon à vous offrir une expérience de developpement unique et vous permettre
                    de créer vos applications sans aucune complexité et à une vitesse exponentielle.
                    Imaginez juste, BlitzPHP fera le reste.
                </p>
                <div class="d-flex flex-column flex-lg-row align-items-md-stretch justify-content-md-center gap-3 mb-4">
                    <a href="<?= link_to('docs') ?>"
                        class="btn btn-lg bd-btn-lg btn-bd-primary d-flex align-items-center justify-content-center fw-semibold">
                        <svg class="bi me-2" aria-hidden="true">
                            <use xlink:href="<?= get_bi_path('book-half') ?>"></use>
                        </svg>
                        Démarrer
                    </a>
                </div>
                <p class="text-body-secondary mb-0">
                    Version actuelle <strong><?= DEFAULT_VERSION ?></strong>
                    <span class="px-1">·</span>
                    <a href="<?= link_to('goto', 'versions') ?>" class="link-secondary text-nowrap">Toutes les
                        versions</a>
                </p>

            </div>
        </div>
    </div>

    <div class="container bd-gutter masthead-followup">
        <div class="col-lg-7 mx-auto pb-3 mb-3 mb-md-5 text-md-center">
            <h2 class="display-5 mb-3 fw-semibold lh-sm">Pourquoi devriez-vous choisir BlitzPHP ?</h2>
        </div>
        <div class="row align-items-center mt-5">
            <div class="col-md-6 col-lg-4">
                <div class="card border border-light-subtle border-bottom-0 p-4 pt-3 rounded-4 shadow-sm mb-5">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning text-white rounded-4" style="margin-top:-5rem">
                            <svg class="bi fs-1">
                                <use xlink:href="<?= get_bi_path('union') ?>"></use>
                            </svg>
                        </button>
                        <h4 class="font-weight-bold"> Inspiré des meilleurs </h4>
                        <p class="text-secondary"> BlitzPHP tire une bonne partie de son code, de ses conventions et de
                            sa syntaxe à partir des meilleurs framework PHP.
                            Le coeur de BlitzPHP est fait à partir de
                            <a target="_blank" href="https://laravel.com">Laravel</a>,
                            <a target="_blank" href="https://codeigniter.com">CodeIgniter</a>, et
                            <a target="_blank" href="https://cakephp.org">CakePHP</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border border-light-subtle border-bottom-0 p-4 pt-3 rounded-4 shadow-sm mb-5">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning text-white rounded-4" style="margin-top:-5rem">
                            <svg class="bi fs-1">
                                <use xlink:href="<?= get_bi_path('rocket-takeoff') ?>"></use>
                            </svg>
                        </button>
                        <h4 class="font-weight-bold"> Simple, rapide et propre </h4>
                        <p class="text-secondary"> Tout comme vous, nous aimons le code propre. C'est pourquoi, BlitzPHP
                            vous offre une
                            syntaxe simple et élégante afin que vous puissiez avoir des fonctionnalités étonnantes en un
                            temps record.
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border border-light-subtle border-bottom-0 p-4 pt-3 rounded-4 shadow-sm mb-5">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning text-white rounded-4" style="margin-top:-5rem">
                            <svg class="bi fs-1">
                                <use xlink:href="<?= get_bi_path('shield-lock') ?>"></use>
                            </svg>
                        </button>
                        <h4 class="font-weight-bold"> Sécurité au rendez-vous </h4>
                        <p class="text-secondary"> BlitzPHP est livré avec des outils intégrés pour la validation des
                            données, la protection CSRF, la prévention des injections SQL, la vérification des token
                            d'authentification, etc. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border border-light-subtle border-bottom-0 p-4 pt-3 rounded-4 shadow-sm mb-5">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning text-white rounded-4" style="margin-top:-5rem">
                            <svg class="bi fs-1">
                                <use xlink:href="<?= get_bi_path('clock') ?>"></use>
                            </svg>
                        </button>
                        <h4 class="font-weight-bold"> Gain de temps considérable </h4>
                        <p class="text-secondary"> BlitzPHP vous offre des outilis de génération de code et de pompage
                            de la base de données. Utilisez nos fonctions dédiées pour rapidement construire des
                            prototypes. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border border-light-subtle border-bottom-0 p-4 pt-3 rounded-4 shadow-sm mb-5">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning text-white rounded-4" style="margin-top:-5rem">
                            <svg class="bi fs-1">
                                <use xlink:href="<?= get_bi_path('speedometer2') ?>"></use>
                            </svg>
                        </button>
                        <h4 class="font-weight-bold"> Faible encombrement et performances élévées </h4>
                        <p class="text-secondary"> BlitzPHP ne vous offre que ceux dont vous avez besoin. A
                            l'installation, il ne pèse que 4MB. De plus les traitements sont optimisés pour offir un
                            meilleur temps d'exécution.
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border border-light-subtle border-bottom-0 p-4 pt-3 rounded-4 shadow-sm mb-5">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning text-white rounded-4" style="margin-top:-5rem">
                            <svg class="bi fs-1">
                                <use xlink:href="<?= get_bi_path('book') ?>"></use>
                            </svg>
                        </button>
                        <h4 class="font-weight-bold"> Une documentation claire </h4>
                        <p class="text-secondary"> BlitzPHP a une documentaition claire, exhaustive et conviviale pour
                            faciliter votre apprentissage. Nous vous souhaitons une agréable lecture.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container bd-gutter masthead-followup">
        <div class="col-lg-7 mx-auto pb-3 mb-3 mb-md-5 text-md-center">
            <div class="masthead-followup-icon d-inline-block mb-3 bg-warning">
                <svg class="bi fs-1">
                    <use xlink:href="<?= get_bi_path('code') ?>"></use>
                </svg>
            </div>
            <h2 class="display-5 mb-3 fw-semibold lh-sm">Tout ce dont vous avez besoin pour être incroyable.</h2>
            <p class="lead fw-normal">
                BlitzPHP s'inspire des ses pères et vous propose des solutions élégantes pour les caractéristiques
                communes nécessaires par toutes les applications web modernes.
            </p>
        </div>

        <div class="card border border-light-subtle p-4 pt-3 rounded-4 shadow-sm mb-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12 col-lg-3 col-md-1">
                        <div
                            class="nav  nav-underline flex-md-column flex-sm-row overflow-auto flex-nowrap pb-2 pb-md-0 w-100">
                            <button type="button" role="tab" data-bs-toggle="pill"
                                class="text-center text-lg-start text-light nav-link active"
                                data-bs-target="#v-pills-authentification">
                                <svg class="bi">
                                    <use xlink:href="<?= get_bi_path('lock') ?>"></use>
                                </svg>
                                <span class="d-none d-lg-inline">Authentification</span>
                            </button>
                            <button type="button" role="tab" data-bs-toggle="pill"
                                class="text-center text-lg-start text-light nav-link" data-bs-target="#v-pills-autorisation">
                                <svg class="bi">
                                    <use xlink:href="<?= get_bi_path('shield-check') ?>"></use>
                                </svg>
                                <span class="d-none d-lg-inline">Autorisation</span>
                            </button>
                            <button type="button" role="tab" data-bs-toggle="pill"
                                class="text-center text-lg-start text-light nav-link" data-bs-target="#v-pills-validation">
                                <svg class="bi">
                                    <use xlink:href="<?= get_bi_path('check2-circle') ?>"></use>
                                </svg>
                                <span class="d-none d-lg-inline">Validation</span>
                            </button>
                            <button type="button" role="tab" data-bs-toggle="pill"
                                class="text-center text-lg-start text-light nav-link" data-bs-target="#v-pills-fichiers">
                                <svg class="bi">
                                    <use xlink:href="<?= get_bi_path('archive') ?>"></use>
                                </svg>
                                <span class="d-none d-lg-inline">Stockage de fichier</span>
                            </button>
                            <button type="button" role="tab" data-bs-toggle="pill"
                                class="text-center text-lg-start text-light nav-link" data-bs-target="#v-pills-migrations">
                                <svg class="bi">
                                    <use xlink:href="<?= get_bi_path('database') ?>"></use>
                                </svg>
                                <span class="d-none d-lg-inline">Migrations</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 col-md-11">
                        <div class="tab-content overflow-y-auto" style="max-height: 80vh;">
                            <?= $this->insert('_home/tools') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl bd-gutter masthead-followup">
        <div class="col-lg-7 mx-auto pb-3 mb-3 mb-md-5 text-md-center">
            <div class="masthead-followup-icon d-inline-block mb-3" style="--bg-rgb: var(--bd-violet-rgb);">
                <svg class="bi fs-1">
                    <use xlink:href="<?= get_bi_path('code') ?>"></use>
                </svg>
            </div>
            <h2 class="display-5 mb-3 fw-semibold lh-sm">Notre communauté n'attend plus que vous</h2>
        </div>

        <section class="row g-3 g-md-5 mb-5 pb-5 justify-content-center">
            <div class="col-lg-6 py-lg-4 pe-lg-5">
                <svg class="bi mb-2 fs-2 text-body-secondary"><use xlink:href="<?= get_bi_path('newspaper') ?>"></use></svg>
                <h3 class="fw-semibold">Dernières nouvelles</h3>
                <div class="mt-4">
                   <article class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= img_url('thumbs/placeholder.png') ?>" style="height: 15em;" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="card-subtitle mb-2 text-muted">Par <a href="#">Dimitric Sitchet</a> le 19 juillet 2020</div>
                                    <h4 class="card-title my-2">
                                        <a href="#" data-toggle="read" data-id="1" class="text-dark">Sortie du site web officiel de la communauté dFramework</a></h4>
                                    <p class="card-text">
                                        Mauris eu eros in metus elementum porta eget sed ligula. Praesent
                                        consequat, ipsum molestie pellentesque venenatis.
                                    </p>
                                    <div class="text-end mt-2">
                                        <a href="#" class="card-more" data-toggle="read" data-id="1">Lire la suite <i class="ion-ios-arrow-right"></i></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            
            <div class="col-lg-6 py-lg-4 pe-lg-5">
                <svg class="bi mb-2 fs-2 text-body-secondary"><use xlink:href="<?= get_bi_path('chat-square-dots') ?>"></use></svg>
                <h3 class="fw-semibold">Sur le forum</h3>
                <div class="mt-4">
                   <article class="card mb-3">
                        <div class="card-body">
                            <div class="card-subtitle mb-2 text-muted">Par <a href="#">Dimitric Sitchet</a> le 19 juillet 2020</div>
                            <h4 class="card-title">
                                <a href="#" data-toggle="read" data-id="1" class="text-dark">Sortie du site web officiel de la communauté dFramework</a></h4>
                        </div>
                    </article>
                   <article class="card mb-3">
                        <div class="card-body">
                            <div class="card-subtitle mb-2 text-muted">Par <a href="#">Dimitric Sitchet</a> le 19 juillet 2020</div>
                            <h4 class="card-title">
                                <a href="#" data-toggle="read" data-id="1" class="text-dark">Sortie du site web officiel de la communauté dFramework</a></h4>
                        </div>
                    </article>
                </div>
            </div>
            
            <div class="col-md-8 mx-auto text-center">
                <h4 class="fw-semibold">Une combinaison de 3 monstres</h4>
                <p>
                    BlitzPHP est une fusion intelligente de 3 principaux monstres de l'univers PHP. 
                    Nous avons tirez le meilleur des meilleurs pour vous offir un outils encore plus agréable.
                </p>
                <div class="d-flex flex-wrap align-items-center justify-content-center gap-4 mt-4">
                    <a target="_blank" class="d-flex flex-column align-items-center text-decoration-none animate-img" href="https://laravel.com">
                        <img class="d-block mb-2" src="<?= img_url('brand/laravel.png') ?>" alt="" width="72" height="72" loading="lazy">
                        <span class="text-body-secondary">Laravel</span>
                    </a>
                    <a target="_blank" class="d-flex flex-column align-items-center text-decoration-none animate-img" href="https://codeigniter.com">
                        <img class="d-block mb-2" src="<?= img_url('brand/codeigniter.png') ?>" alt="" width="72" height="72" loading="lazy">
                        <span class="text-body-secondary">CodeIgniter</span>
                    </a>
                    <a target="_blank" class="d-flex flex-column align-items-center text-decoration-none animate-img" href="https://cakephp.org">
                        <img class="d-block mb-2" src="<?= img_url('brand/cakephp.png') ?>" alt="" width="72" height="72" loading="lazy">
                        <span class="text-body-secondary">Cake PHP</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
    
</main>

<?php $this->stop(); ?>