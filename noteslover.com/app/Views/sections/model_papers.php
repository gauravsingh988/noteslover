<!-- Model Papers Start -->
<section class="py-70 px-20" aria-labelledby="model-papers-heading">
    <div class="container-fluid vesitable">
        <div class="row align-items-center mb-3">
            <div class="col-lg-9 col-md-9 col-12 text-md-start text-center">
                <h1 id="model-papers-heading" class="h2_title">
                    Latest Model Papers
                </h1>
                <p class="p_subtitle">
                    Practice with expertly curated model papers designed as per the latest exam patterns and syllabus.
                </p>
            </div>
            <div class="col-lg-3 col-md-3 col-12 text-md-end text-center marginb_0">
                <a href="<?= base_url('model-papers') ?>" class="view_allbtn" aria-label="View all model papers">
                    View All
                </a>
            </div>
        </div>

        <?php if (!empty($model_papers) && is_array($model_papers)) : ?>
        <div class="row g-4" role="list">
            <?php foreach ($model_papers as $paper) : 
          $webpSrc = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $paper['thumbnail']);
      ?>
            <div class="col-md-6 col-lg-4 col-xl-3" role="listitem">
                <a href="<?= base_url('model-papers/' . esc($paper['slug'], 'url')) ?>"
                    class="text-decoration-none d-block h-100"
                    aria-label="View model paper: <?= esc($paper['title']) ?>">
                    <article class="modal_paper_maincard" aria-labelledby="paper-title-<?= esc($paper['id']) ?>">

                        <!-- Optimized image -->
                        <div class="vesitable-img">
                            <picture>
                                <source srcset="<?= esc($webpSrc) ?>" type="image/webp">
                                <img src="<?= esc($paper['thumbnail']) ?>" class="img-fluid w-100"
                                    alt="Model paper thumbnail for <?= esc($paper['title']) ?>" loading="lazy">
                            </picture>
                        </div>

                        <!-- Content -->
                        <div class="">
                            <h2 id="paper-title-<?= esc($paper['id']) ?>" class="">
                                <?= character_limiter(esc($paper['title']), 100) ?>
                            </h2>
                            <div class="modal_paper_footer">
                                <small class="d-inline-flex align-items-center"
                                    aria-label="Total views <?= esc($paper['total_views']) ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                        stroke="#6c757d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        viewBox="0 0 24 24" aria-hidden="true" focusable="false"
                                        style="margin-right: 6px;">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <?= esc($paper['total_views']) ?>
                                </small>

                                <div>
                                    <small class="view_allbtn">
                                        Practice Now
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true"
                                            focusable="false" style="vertical-align: middle;">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else : ?>
        <p class="text-muted">Abhi koi model paper uplabdh nahi hai.</p>
        <?php endif; ?>
    </div>
</section>
<!-- Model Papers End -->