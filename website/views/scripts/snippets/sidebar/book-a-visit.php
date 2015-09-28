<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
    $title = $this->input("title");
    $content = $this->textarea("content");
    $link = $this->link("link");
?>

<?php if ($this->editmode) : ?>
    <p>Add the book a visit page link here</p>
    <?= $link; ?>
<?php endif; ?>

<div class="sidebar__panel">
    <div class="sidebar__panel--visit">
        <div class="sidebar__panel--visit-image"></div>
        <div class="sidebar__panel--content full-width-panel heightMatch">
            <h3><?= $title; ?></h3>
            <p><?= $content; ?></p>
            <div class="visit-btn">
            <?php if ($link !== null) : ?>
                <a href="<?= $link->getHref(); ?>" class="sidebar__panel--button"><?= $link->getText(); ?></a>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
