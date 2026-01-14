<div class="container-fluid fruite py-90 px-20">
    <div class="row g-4">
        <div class="col-lg-12 justify-content-center">
            <div class="row g-4">

            <?php if (!empty($model_papers) && is_array($model_papers)) : ?>
                <?php foreach ($model_papers as $paper) : 
                    $webpSrc = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $paper['thumbnail']);
                ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <a 
                        href="<?= base_url('model-papers/' . esc($paper['slug'], 'url')) ?>" 
                        class="text-decoration-none"
                        aria-label="View model paper <?= esc($paper['title']) ?>"
                    >
                        <div class="position-relative fruite-item border border-top-0 bg-light h-100 d-flex flex-column">
                            
                            <!-- Optimized Image -->
                            <div class="vesitable-img">
                                <picture>
                                    <source srcset="<?= esc($webpSrc) ?>" type="image/webp">
                                    <img 
                                        src="<?= esc($paper['thumbnail']) ?>"
                                        class="img-fluid w-100"
                                        alt="Model paper for <?= esc($paper['title']) ?>"
                                        loading="lazy"
                                    >
                                </picture>
                            </div>

                            <!-- Content -->
                            <div class="p-2 rounded-bottom d-flex flex-column justify-content-between flex-grow-1">
                                <h6 class="h6 mb-1 text-dark">
                                    <?= character_limiter(esc($paper['title']), 80) ?>
                                </h6>
                                <hr>
                                <div class="d-flex justify-content-between flex-lg-wrap align-items-center">
                                    <small>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="20" height="20"
                                            fill="none"
                                            stroke="#6c757d"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            viewBox="0 0 24 24"
                                            style="margin-right: 6px;">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        <?= esc($paper['total_views']) ?>
                                    </small>

                                    <span class="text-success ms-auto">
                                        <small>
                                            Practice now
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                width="20" height="20"
                                                fill="none"
                                                stroke="#6c757d"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                viewBox="0 0 24 24"
                                                style="vertical-align: middle;">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </small>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
                <?php endforeach; ?>

            </div>

            <!-- Pagination -->
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    <?= $pager->links('model_papers', 'default_full') ?>
                </div>
            </div>

            <?php else : ?>
                <p class="text-muted">Abhi koi model paper uplabdh nahi hai.</p>
            <?php endif; ?>

        </div>
    </div>
</div>
