<?php
echo $this->snippetEditModeStyles();
$title = $this->input("title");
$content = $this->textarea("content");
$link = $this->link("link");
?>

<?php if ($this->editmode) : ?>
    <p>Add the contact page link here</p>
    <?= $link; ?>
<?php endif; ?>

<div class="sidebar__panel">
    <div class="sidebar__panel--news-and-events">
        <div class="sidebar__panel--news-and-events-image"></div>
        <div class="sidebar__panel--content full-width-panel">
            <h3><?= $title; ?></h3>
            <p><?= $content; ?></p>
            <a href="<?= $link->getHref(); ?>" class="sidebar__panel--button right"><?= $link->getText(); ?></a>
        </div>
    </div>
</div>