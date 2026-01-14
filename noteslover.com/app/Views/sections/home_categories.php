<div class="bg-light py-50 px-20">
    <div class="container-fluid ">
        <div class="row g-4">
            <div class="home_cat_row">
                <?php if ($home_categories) {
                foreach ($home_categories as $category) {
                    $webpSrc = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $category['thumbnail']);
            ?>
                <div class="home_cat_col">
                    <a href="<?= base_url($category['slug']) ?>" class="text-decoration-none">
                            <!-- <picture class="d-none d-sm-block">
                            <source srcset="<?= esc($webpSrc) ?>" type="image/webp">
                            <img src="<?= esc($category['thumbnail']) ?>" alt="<?= esc($category['name']) ?>"
                                 loading="lazy" width="40" height="40"
                                 class="rounded-circle img-fluid" style="width: 40px; height: 40px;">
                        </picture> -->

                            <?= esc($category['name']) ?>
                            <!-- <small class="ms-auto text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                    </path>
                                </svg>
                            </small> -->
                    </a>
                </div>
                <?php }
            } ?>
            </div>
        </div>
    </div>
</div>