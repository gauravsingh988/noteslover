<!-- Blog Story Start -->
<?php if (!empty($blogs) && is_array($blogs)) : ?>
<section 
  class="py-70 px-20"
  aria-labelledby="fresh-reads-heading"
  aria-describedby="fresh-reads-description"
>
  <div class="container-fluid vesitable">

    <!-- Header -->
    <div class="row align-items-center mb-3">
      <div class="col-lg-9 col-md-9 col-12 text-md-start text-center">
        <h2 id="fresh-reads-heading" class="h2_title">Fresh Reads</h2>
        <p id="fresh-reads-description" class="p_subtitle">
          Stay updated with trending topics, expert guidance, and inspiring content from our
          latest blog entries.
        </p>
      </div>
      <div class="col-lg-3 col-md-3 col-12 text-md-end text-center marginb_0">
        <a 
          href="<?= base_url('blogs') ?>" 
          class="view_allbtn"
          aria-label="View all blog posts"
        >
          View All
        </a>
      </div>
    </div>

    <!-- Blog Cards -->
    <div class="row g-4" role="list" aria-label="List of latest blogs">
      <?php foreach ($blogs as $blog) : ?>
      <div class="col-md-6 col-lg-4 col-xl-3" role="listitem">
        <a 
          href="<?= base_url('blogs/' . esc($blog['slug'], 'url')) ?>" 
          class="text-decoration-none d-block h-100"
          aria-label="Read blog: <?= esc($blog['title']) ?>"
        >
          <article 
            class="fresh_read_maincard"
            aria-labelledby="blog-title-<?= esc($blog['id'] ?? uniqid()) ?>"
          >

            <!-- Blog Thumbnail -->
            <div class="vesitable-img">
              <picture>
                <source 
                  srcset="<?= esc(str_replace(['.jpg', '.jpeg', '.png'], '.webp', $blog['thumbnail'])) ?>" 
                  type="image/webp"
                >
                <img 
                  src="<?= esc($blog['thumbnail']) ?>" 
                  class="img-fluid w-100"
                  alt="Thumbnail image for blog titled <?= esc($blog['title']) ?>"
                  loading="lazy" 
                >
              </picture>
            </div>


            <!-- Content -->
            <div class="fresh_read_content">
              <h3 
                id="blog-title-<?= esc($blog['id'] ?? uniqid()) ?>" 
                class=""
              >
                <?= character_limiter(esc($blog['title']), 100) ?>
              </h3>
              <div class="fresh_read_footer">
                <small class="d-inline-flex align-items-center" aria-label="Total views <?= esc($blog['total_views']) ?>">
                  <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="20" 
                    height="20" 
                    fill="none"
                    stroke="#fff" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"
                    viewBox="0 0 24 24"
                    aria-hidden="true" 
                    focusable="false"
                    style="margin-right: 6px;"
                  >
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                  <?= esc($blog['total_views']) ?>
                </small>

                <div >
                  <small class="view_allbtn">
                    Know more
                    <svg 
                      xmlns="http://www.w3.org/2000/svg" 
                      width="20" 
                      height="20" 
                      fill="none"
                      stroke="currentColor" 
                      stroke-width="2" 
                      stroke-linecap="round"
                      stroke-linejoin="round" 
                      viewBox="0 0 24 24"
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
  </div>
</section>
<?php endif; ?>
<!-- Blog Story End -->
