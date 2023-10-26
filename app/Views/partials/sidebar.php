<aside class="bd-sidebar">
    <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="bdSidebar" aria-labelledby="bdSidebarOffcanvasLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="bdSidebarOffcanvasLabel">
                Browse docs
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                data-bs-target="#bdSidebar"></button>
        </div>

        <div class="offcanvas-body">
            <nav class="bd-links w-100" id="bd-docs-nav" aria-label="Docs navigation">
                <ul class="bd-links-nav list-unstyled mb-0 pb-3 pb-md-2 pe-lg-2">
                    <?php foreach ($indexes as $group => $chapters): ?>
                    <li class="bd-links-group py-2">
                        <strong class="bd-links-heading d-flex w-100 align-items-center fw-semibold">
                            <svg class="bi me-2" style="color: var(--bs-indigo)" aria-hidden="true">
                                <use xlink:href="#book-half"></use>
                            </svg>
                            <?= $group ?>
                        </strong>

                        <ul class="list-unstyled fw-normal pb-2 small">
                            <?php foreach ($chapters as $title => $url): ?>
                            <li>
                                <a href="<?= $url ?>" class="bd-links-link d-inline-block rounded <?= link_active(trim($url, '/')) ?>"
                                    aria-current="page"><?= $title ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</aside>