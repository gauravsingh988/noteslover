<!-- Latest Study Notes Start -->
<section class="py-70 px-20" aria-labelledby="latest-notes-heading" aria-describedby="latest-notes-description">
    <div class="container-fluid fruite">
        <div class="tab-class">

            <!-- Header Section -->
            <div class="row g-4 align-items-center mb-3">
                <div class="col-lg-9 col-md-9 col-12 text-md-start text-center">
                    <h2 id="latest-notes-heading" class="h2_title">
                        Latest Study Notes
                    </h2>
                    <p id="latest-notes-description" class="p_subtitle">
                        Dive into our newest notes tailored to match current exam patterns and syllabus trends.
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-12 text-md-end text-center marginb_0">
                    <a href="<?= base_url('notes') ?>" class="view_allbtn"
                        aria-label="View all study notes">
                        View All
                    </a>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content" role="region" aria-label="List of latest study notes">
                <div id="tab-1" class="tab-pane fade show p-0 active" role="tabpanel"
                    aria-labelledby="latest-notes-heading">
                    <div class="row g-4" role="list">
                        <?php foreach ($recent_notes as $note): ?>
                        <?= view('partials/note', ['note' => $note, 'class' => 'col-xl-3', 'role' => 'listitem']) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Latest Study Notes End -->