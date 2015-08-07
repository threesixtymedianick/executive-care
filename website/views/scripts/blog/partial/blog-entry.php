<?php $entry = $this->entry; ?>

<div class="blog__content__item">
    <?php if ($entry->getBlogImage() !== null): ?>
        <img class="blog__content__item__image" src="<?= $entry->getBlogImage()->getFullPath(); ?>" />
    <?php endif; ?>
    <div class="blog__content__item__title">
        <a href="<?= $this->url(['key' => $entry->getUrlPath()], 'blog-show', false, false); ?>">
            <?= $entry->getTitle() ?>
        </a>
    </div>
    <div class="blog__content__item__date">
        <?= $entry->getDate()->toString('FFFFF'); ?>
    </div>
    <div class="blog__content__item__summary">
        <?= (trim($entry->getSummary()))
            ? $entry->getSummary()
            : Website_Tool_Text::cutStringRespectingWhitespace(trim(strip_tags($entry->getContent())), 200) ?>
    </div>
</div>
