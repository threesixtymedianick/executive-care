<?php $entry = $this->entry; ?>
<div class="blog__left">
    <div class="blog__left--title">
        <h2><?= $this->entry->getTitle() ?></h2>
    </div>
    <div class="blog__content">
        <div class="blog__content--date">
            <?= $this->entry->getDate()->toString('dd.MM.Y') ?>
        </div>
        <div class="blog__content--article">
            <?= $this->flashMessenger() ?>

            <?php if ($this->entry->getBlogImage() !== null) : ?>
                <img src="<?= $this->entry->getBlogImage()->getFullPath() ?>" class="image-left" />
            <?php endif; ?>

            <?= $this->entry->getContent() ?>
        </div>
        <div class="span3">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <?= $this->snippet("blog-snippet-$i") ?>
            <?php endfor; ?>
        </div>
    </div>
</div>
