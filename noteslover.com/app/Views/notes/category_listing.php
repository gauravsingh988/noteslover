<div class="container-fluid fruite py-50 px-20">
<?php if (!empty($subCategoryNotes)): ?>
    <?php foreach ($subCategoryNotes as $item): ?>
        <?php if (empty($item['notes'])) continue; ?>
        <div class="subcategory-section mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0"><?= esc($item['sub_category']['name']) ?></h4>
                <a href="<?= site_url($category['slug'] . '/' . $item['sub_category']['slug']) ?>" class="btn btn-outline-primary btn-sm">
                    View All
                </a>
            </div>
            <div class="row g-4">
                <?php if (!empty($item['notes'])): ?>
                    <?php foreach ($item['notes'] as $note): ?>
                        <?= view('partials/note', ['note' => $note, 'class' => 'col-xl-3']) ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">No notes found in this subcategory.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center text-muted">No subcategories found for this category.</p>
<?php endif; ?>
</div>