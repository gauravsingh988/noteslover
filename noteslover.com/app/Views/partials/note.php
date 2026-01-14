<div class="col-md-6 col-lg-4 <?= esc($class) ?>" role="listitem">
    <article class="category_card" aria-labelledby="note-title-<?= esc($note['id']) ?>">
        <!-- Main Link (wraps entire card) -->
        <a href="<?= base_url('notes/' . esc($note['slug'], 'url')) ?>" class="stretched-link text-decoration-none"
            aria-label="Read note: <?= esc($note['title']) ?>"></a>

        <!-- Image -->
        <div class="fruite-img">
            <?php 
            // Use note thumbnail if available, otherwise fallback to placeholder
            $thumbnail = !empty($note['thumbnail']) ? $note['thumbnail'] : 'https://via.placeholder.com/400x200?text=No+Image';
        ?>
            <picture>
                <source srcset="<?= esc(preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $thumbnail)) ?>"
                    type="image/webp">
                <img src="<?= esc($thumbnail) ?>" class="img-fluid w-100 rounded-top"
                    alt="<?= esc($note['title']) ?> note thumbnail" loading="lazy" width="400" height="200">
            </picture>
        </div>

        <!-- Card Body -->
        <div class="cat_contentbody">

            <!-- Title -->
            <header class="category_title_head">
                <h3 id="note-title-<?= esc($note['id']) ?>">
                    <?= character_limiter(esc($note['title']), 80) ?>
                </h3>
            </header>

            <!-- Uploaded By -->
            <p class="upload_nl_link">
                <a href="<?= base_url('mentor/' . esc($note['user_name'], 'url')) ?>"
                    aria-label="View profile of <?= esc($note['uploaded_by']) ?>">
                    Added by <span><?= esc($note['uploader_name']) ?></span>
                </a>
            </p>


            <!-- Footer Info: Downloads & Ratings -->
            <div class="notes_l_footer" aria-label="Note details">
                <div class="notel_f_lft">
                  <button class="view_allbtn">View</button>
                </div>
                <div class="notel_f_right">
                    <!-- Download Count -->
                    <div class="d-flex align-items-center text-muted"
                        title="Downloaded <?= number_format($note['download_count']) ?> times"
                        aria-label="Downloaded <?= number_format($note['download_count']) ?> times"><small>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#6c757d"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"
                                aria-hidden="true" focusable="false" style="margin-right: 6px;">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <span>(<?= esc($note['views']) ?>)</span></small>
                    </div>

                    <!-- Rating -->
                    <div class="d-flex align-items-center text-warning"
                        title="Rated <?= number_format($note['average_rating'] ?? 0, 1) ?> out of 5"
                        aria-label="Rated <?= number_format($note['average_rating'] ?? 0, 1) ?> out of 5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 24 24" class="me-1" aria-hidden="true">
                            <path
                                d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span><?= round($note['average_rating'] ?? 0) ?></span>
                    </div>
                </div>
            </div>
        </div>

    </article>
</div>