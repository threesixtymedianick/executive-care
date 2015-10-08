<div class="pagination">
    <!-- Numbered page links -->
    <?php foreach ($this->pagesInRange as $page): ?>
        <?php if ($page != $this->current): ?>
            <a href="<?= $this->url(array('page' => $page)); ?>"><?= $page; ?></a>
        <?php else: ?>
            <span id="pagination-current"><?= $page; ?></span>
        <?php endif; ?>
        &nbsp;
    <?php endforeach; ?>
</div>
