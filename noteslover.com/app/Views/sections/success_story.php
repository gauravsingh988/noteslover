<!-- Success Story Start -->
<section 
  class="py-70 px-20"
  aria-labelledby="success-stories-heading"
>
  <div class="container-fluid vesitable">
    <div class="row align-items-center mb-3">
      <div class="col-lg-9 col-md-9 col-12 text-md-start text-center">
        <h1 id="success-stories-heading" class="h2_title">Dreams Delivered</h1>
        <p class="p_subtitle">
          Every dream here began with a challenge and ended with a milestone worth celebrating.
        </p>
      </div>
      <div class="col-lg-3 col-md-3 col-12 text-md-end text-center marginb_0">
        <a 
          href="<?= base_url('success-stories') ?>" 
          class="view_allbtn"
          aria-label="View all success stories"
        >
          View All
        </a>
      </div>
    </div>

    <?php if (!empty($success_stories) && is_array($success_stories)) : ?>
    <div class="row g-4" role="list">
      <?php foreach ($success_stories as $story) : 
          $webpSrc = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $story['thumbnail']);
      ?>
      <div class="col-md-6 col-lg-4 col-xl-3" role="listitem">
        <a 
          href="<?= base_url('success-stories/' . esc($story['slug'], 'url')) ?>" 
          class="text-decoration-none d-block h-100"
          aria-label="Read success story: <?= esc($story['title']) ?>"
        >
          <article 
            class="dreams_deli_card"
            aria-labelledby="story-title-<?= esc($story['id']) ?>"
          >

            <!-- Optimized image -->
            <div class="vesitable-img">
              <picture>
                <source srcset="<?= esc($webpSrc) ?>" type="image/webp">
                <img 
                  src="<?= esc($story['thumbnail']) ?>" 
                  class="img-fluid w-100" 
                  alt="Thumbnail image for <?= esc($story['title']) ?>" 
                  loading="lazy"
                >
              </picture>
            </div>

            <!-- Content -->
            <div class="dreams_story_content">
              <h2 id="story-title-<?= esc($story['id']) ?>" >
                <?= character_limiter(esc($story['title']), 100) ?>
              </h2>
              <div class="dreams_content_footer">
                <small class="d-inline-flex align-items-center" aria-label="Total views <?= esc($story['total_views']) ?>">
                  <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="20" 
                    height="20" 
                    fill="none"
                    stroke="#6c757d" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"
                    viewBox="0 0 24 24" 
                    role="img"
                    aria-hidden="true"
                    focusable="false"
                    style="margin-right: 6px;"
                  >
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                  <?= esc($story['total_views']) ?>
                </small>

                <div class="text-success ms-auto d-inline-flex align-items-center">
                  <small class="view_allbtn">
                    Know more
                    <svg 
                      xmlns="http://www.w3.org/2000/svg" 
                      width="20" 
                      height="20" 
                      fill="none"
                      stroke="currentcolor" 
                      stroke-width="2" 
                      stroke-linecap="round" 
                      stroke-linejoin="round" 
                      viewBox="0 0 24 24"
                      role="img"
                      aria-hidden="true"
                      focusable="false"
                      style="vertical-align: middle;"
                    >
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
    <p class="text-muted">Koi success story uplabdh nahi hai.</p>
    <?php endif; ?>
  </div>
</section>
<!-- Success Story End -->
