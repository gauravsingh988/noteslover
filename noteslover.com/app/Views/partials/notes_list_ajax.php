<?php if (!empty($notes)): ?>
    <?php foreach ($notes as $note): ?>
        <?= view('partials/note', ['note' => $note, 'class' => 'col-xl-3']) ?>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center text-muted">No notes found.</p>
<?php endif; ?>

<div class="col-12 mt-3">
    <?= $pager->links('notes_pagination', 'default_full') ?>
</div>
