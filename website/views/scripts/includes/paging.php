<div class="our-homes__left--pagination">
    <div style="float:right;width:70%;">
        <!-- Previous page link -->
        <?php if (isset($this->previous)): ?>
              <a href="<?= $this->url(array('page' => $this->previous)); ?>">&lt; Previous</a> |
        <?php else: ?>
            <span class="disabled">&lt; Previous</span> |
        <?php endif; ?>
        <!-- Numbered page links -->
        <?php foreach ($this->pagesInRange as $page): ?>
            <?php if ($page != $this->current): ?>
                <a href="<?= $this->url(array('page' => $page)); ?>"><?= $page; ?></a>
            <?php else: ?>
                <?= $page; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- Next page link -->
        <?php if (isset($this->next)): ?>
              | <a href="<?= $this->url(array('page' => $this->next)); ?>">Next &gt;</a>
        <?php else: ?>
            | <span class="disabled">Next &gt;</span>
        <?php endif; ?>
    </div>
 </div>
