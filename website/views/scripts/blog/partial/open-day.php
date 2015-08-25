<?php $entry = $this->entry; ?>
<div class="blog__left">
    <div class="blog__left--title">
        <h2><?= $entry->getTitle() ?></h2>
    </div>
    <div class="blog__content">
        <div class="blog__content--date uppercase">
            <?= $this->entry->getDate()->toString('FFFFF') ?>
        </div>
        <div class="blog__content--article">
            <?= $this->flashMessenger() ?>

            <p>
                Pannal Green<br />
                Pannal<br />
                Harrogate<br />
                HG3 1LH
            </p>

            <h3 class="blog__content--article-subtitle">Lorem ipsum</h3>

            <?=$this->entry->getContent();?>

            <?php if ($this->entry->getBlogImage() !== null): ?>
                <img src="<?= $this->entry->getBlogImage()->getFullPath(); ?>" class="image-strip" />
                <img src="<?= $this->entry->getBlogImage()->getFullPath(); ?>" class="image-strip" />
            <?php endif; ?>
        </div>
        <div class="span3">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <?= $this->snippet("blog-snippet-$i") ?>
            <?php endfor; ?>
        </div>
    </div>
</div>
