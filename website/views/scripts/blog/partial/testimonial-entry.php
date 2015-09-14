<?php $entry = $this->entry; ?>

<div class="blog__content__item">
    <div class="blog__content__item--image">
        <?php if ($entry->getBlogImage() !== null): ?>
            <img src="<?= $entry->getBlogImage()->getFullPath(); ?>" />
        <?php endif; ?>
    </div>
    <div class="blog__content__item--summary">
        <div class="blog__content__item--summary--title">
            <a href="<?= $this->url(['key' => $entry->getUrlPath()], 'blog-show', false, false); ?>">
                <?= $entry->getTitle() ?>
            </a>
        </div>
        <?php if ($entry->getName() !== null): ?>
            <div class="blog__content__item--summary--name">
                <?= $entry->getName(); ?>
            </div>
        <?php endif; ?>
        <div class="blog__content__item--summary--date">
            <?= $entry->getDate()->toString('dd.MM.Y'); ?>
        </div>
        <div class="blog__content__item--summary-text">
            <?= (trim($entry->getSummary()))
                ? $entry->getSummary()
                : Website_Tool_Text::cutStringRespectingWhitespace(trim(strip_tags($entry->getContent())), 200) ?>
        </div>
    </div>
</div>