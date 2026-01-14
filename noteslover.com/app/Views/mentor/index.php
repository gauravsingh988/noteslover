<div class="container-fluid fruite py-50 px-20">
    <div class="col-lg-12 justify-content-center">
        <div class="row g-4">
            <?php if (!empty($mentors)): ?>
                <?php foreach ($mentors as $mentor): ?>
                    <div class="col-md-6 col-lg-4 col-xs-3">
                        <a href="<?= base_url('mentor/' . esc($mentor['username'], 'url')) ?>" class="text-decoration-none">
                            <div class="position-relative fruite-item border border-top-0 bg-light h-100 d-flex flex-column">
                              
                              <!-- Optimized Image -->
                              <div class="fruite-img">
                                <picture>
                                  <source srcset="<?= esc($mentor['profile_pic']) ?>" type="image/webp">
                                  <img 
                                    src="<?= esc($mentor['profile_pic']) ?>" 
                                    class="img-fluid w-100"
                                    alt="<?= esc($mentor['full_name']) ?>"
                                    loading="lazy"
                                    width="400" height="200"
                                    style="object-fit: cover; max-height: 200px; min-height: 200px;">
                                </picture>
                             </div>
                              <!-- Content -->
                              <div class="p-2 d-flex flex-column justify-content-between flex-grow-1">
                                
                                <!-- Title -->
                                <div class="mb-3">
                                  <h6>
                                    <a href="<?= base_url('mentor/' . esc($mentor['username'], 'url')) ?>" class="text-secondary" title="<?= esc($mentor['full_name']) ?>">
                                      <?= esc($mentor['full_name']) ?>
                                    </a>
                                  </h6>
                                </div>
                                <!-- Uploaded By -->
                                <small class="text-dark mb-2">
                                  <a href="<?= base_url('mentor/'.$mentor['username']) ?>"><?= esc($mentor['designation']) ?> <?= esc($mentor['department']) ?></a>
                                </small>
                                <hr>
                              </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-muted">No notes found.</p>
            <?php endif; ?>
        </div>
    </div>            
</div>
