<!-- Hero Start -->
<section 
  class="container-fluid hero-header px-0"
  aria-label="Homepage featured banners"
>
  <div class="container-fluid px-0">
    <div 
      id="heroCarousel" 
      class="carousel slide" 
      data-bs-ride="carousel"
      aria-roledescription="carousel"
      aria-label="Promotional Banners"
    >

      <!-- Carousel Indicators -->
      <div class="carousel-indicators" role="tablist">
        <?php foreach ($banners as $index => $banner): ?>
          <button 
            type="button" 
            data-bs-target="#heroCarousel" 
            data-bs-slide-to="<?= $index ?>" 
            class="<?= $index === 0 ? 'active' : '' ?>" 
            <?php if ($index === 0): ?>aria-current="true"<?php endif; ?>
            aria-label="Show banner <?= $index + 1 ?>: <?= esc($banner['title'] ?? 'Slide ' . ($index + 1)) ?>"
            role="tab"
          ></button>
        <?php endforeach; ?>
      </div>

      <!-- Carousel Inner -->
      <div class="carousel-inner">
        <?php foreach ($banners as $index => $banner): ?>
          <div 
            class="carousel-item <?= $index === 0 ? 'active' : '' ?>"
            role="group"
            aria-roledescription="slide"
            aria-label="Banner <?= $index + 1 ?> of <?= count($banners) ?>"
          >
            <a 
              href="<?= esc($banner['url']) ?>" 
              aria-label="Read more about <?= esc($banner['title'] ?? 'this banner') ?>"
            >
              <img 
                src="<?= esc($banner['thumbnail']) ?>" 
                alt="<?= esc($banner['title'] ?? 'Banner image') ?>"
                class="d-block w-100 img-fluid"
                loading="<?= $index === 0 ? 'eager' : 'lazy' ?>"
                fetchpriority="<?= $index === 0 ? 'high' : 'low' ?>"
                width="1200"
                height="300"
                decoding="async"
              />
            </a>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Controls -->
      <button 
        class="carousel-control-prev" 
        type="button" 
        data-bs-target="#heroCarousel" 
        data-bs-slide="prev"
        aria-label="Previous banner"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button 
        class="carousel-control-next" 
        type="button" 
        data-bs-target="#heroCarousel" 
        data-bs-slide="next"
        aria-label="Next banner"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>
<!-- Hero End -->
