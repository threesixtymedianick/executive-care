<?php $entry = $this->entry; ?>
<div class="blog__left">
    <div class="blog__left--title">
        <h2><?=$entry->getTitle()?></h2>
    </div>
    <div class="blog__content">
        <div class="blog__content--date uppercase">
            <?=$this->entry->getDate()->toString('FFFFF');?>
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

            <?php try { $tags = $this->entry->getTags();?>
            <?php if (count($tags)): ?>
            <div class="tags">
                <small><?= $this->translate('tags') ?>:
                <?php foreach($tags as $tag): ?>
                    <a href="<?=$this->url(array(
                        'tag' => $tag
                        ), 'blog-tag')?>"><?=$tag?></a>
                <?php endforeach; ?>
                </small>
            </div>
            <?php endif; ?>
            <?php } catch (Exception $e) {} ?>

            <?php if (count($this->comments)): ?>
            <div class="comments">
                <h4><?= $this->translate('Comments') ?>:</h4>

                <?php foreach ($this->comments as $comment): ?>
                <blockquote>
                    <h4>
                        <?=$comment->getMetadata()->name?>
                        <small><?=$comment->getDate()->toString('FFFFF')?></small>
                    </h4>
                    <?=nl2br($comment->getData())?>
                </blockquote>
                <?php endforeach; ?>

                <?=$this->comments; ?>
            </div>
            <?php endif; ?>

            <?php if ($this->commentForm): ?>
            <div class="comments-form">
                <h4><?= $this->translate('Add comment') ?>:</h4>
                <?=$this->commentForm?>
            </div>
            <?php endif; ?>

        </div>
        <div class="span3">
            <?php for($i = 1; $i <= 3; $i++): ?>
                <?=$this->snippet("blog-snippet-$i")?>
            <?php endfor; ?>
        </div>
    </div>
</div>