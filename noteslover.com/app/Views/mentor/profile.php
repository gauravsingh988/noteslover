<?= view('includes/header') ?>
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Mentor</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('/mentors') ?>">Mentor</a></li>
        <li class="breadcrumb-item active text-white"><?= esc($mentor['full_name']) ?></li>
    </ol>
</div>

<div class="container py-5">
    <div class="row">
        <!-- Profile Picture -->
        <div class="col-lg-4 text-center mb-4">
            <img src="<?= $mentor['profile_pic'] ?>" alt="<?= esc($mentor['full_name']) ?>"
                 class="img-fluid rounded-circle shadow" style="width: 200px; height: 200px; object-fit: cover;">
            <h3 class="mt-3"><?= esc($mentor['full_name']) ?></h3>
            <p class="text-muted">@<?= esc($mentor['username']) ?></p>
        </div>

        <!-- Profile Info -->
        <div class="col-lg-8">
            <h4 class="fw-bold">About</h4>
            <p><?= nl2br(esc($mentor['about'])) ?></p>

            <!--<h5 class="fw-bold mt-4">Contact</h5>-->
            <!--<p><i class="fa fa-envelope me-2"></i> <?= esc($mentor['email']) ?></p>-->
            <!--<p><i class="fa fa-map-marker-alt me-2"></i> <?= esc($mentor['address']) ?></p>-->

            <!-- Social Media -->
            <div class="mt-4">
                <h5 class="fw-bold">Connect with me</h5>
                <div class="d-flex flex-wrap gap-3 mt-2">
                    <?php if (!empty($mentor['linkedin_url'])): ?>
                        <a href="<?= esc($mentor['linkedin_url']) ?>" target="_blank" class="btn btn-outline-primary rounded-pill px-3">
                            <i class="fab fa-linkedin"></i> LinkedIn
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($mentor['twitter_url'])): ?>
                        <a href="<?= esc($mentor['twitter_url']) ?>" target="_blank" class="btn btn-outline-info rounded-pill px-3">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($mentor['instagram_url'])): ?>
                        <a href="<?= esc($mentor['instagram_url']) ?>" target="_blank" class="btn btn-outline-danger rounded-pill px-3">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($mentor['youtube_url'])): ?>
                        <a href="<?= esc($mentor['youtube_url']) ?>" target="_blank" class="btn btn-outline-danger rounded-pill px-3">
                            <i class="fab fa-youtube"></i> YouTube
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($mentor['facebook_url'])): ?>
                        <a href="<?= esc($mentor['facebook_url']) ?>" target="_blank" class="btn btn-outline-primary rounded-pill px-3">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($mentor['website_url'])): ?>
                        <a href="<?= esc($mentor['website_url']) ?>" target="_blank" class="btn btn-outline-secondary rounded-pill px-3">
                            <i class="fa fa-globe"></i> Website
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>
