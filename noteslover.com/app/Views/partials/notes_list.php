<?php if (!empty($notes)): ?>
    <?php foreach ($notes as $note): ?>
        <?= view('partials/note', ['note' => $note, 'class' => 'col-xl-3']) ?>
    <?php endforeach; ?>
    <?= $pager->links() ?>
<?php else: ?>
    <p class="text-center text-muted">No notes found.</p>
<?php endif; ?>
