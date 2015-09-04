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
    <div class="sidebar__panel--work-for-us">
        <div class="sidebar__panel--work-for-us-image"></div>
        <div class="sidebar__panel--content">
            <h3><?= $title; ?>Test Title</h3>
            <p><?= $content; ?>Lorem ipsum dolor sit amet, consectetur adipiscing el</p>
            <?php if ($link !== null) : ?>
                <a href="<?= $link->getHref(); ?>" class="sidebar__panel--button mleft"><?= $link->getText(); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>