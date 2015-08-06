<?php
    $entry = $this->entry;
    $url = $this->url;
?>

<div class="blog__item">
    <h2>
        <a href="<?= $url; ?>"><?= $entry->getTitle() ?></a>
    </h2>
    <small><?= $entry->getDate()->toString('FFFFF'); ?></small>
    <p>
        <?= (trim($entry->getSummary()))
            ? $entry->getSummary()
            : Website_Tool_Text::cutStringRespectingWhitespace(trim(strip_tags($entry->getContent())), 200) ?>

        <?php if ($entry->getBlogImage() !== null): ?>
            <img class="blog__image"
                 src="<?= $entry->getBlogImage()->getFullPath(); ?>"/>
        <?php endif; ?>
    </p>
</div>