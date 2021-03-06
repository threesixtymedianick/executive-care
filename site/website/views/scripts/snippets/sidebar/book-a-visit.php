<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
$title = $this->input("title");
$content = $this->textarea("content");
$link = $this->link("link");
$image = $this->image('sidebar_image');
?>

<?php if ($this->editmode) : ?>
    <div style="width: 410px;">
    <p>Add the book a visit page link below</p>
    <?= $link; ?>
    <p>Add the sidebar image below</p>
    <?= $image; ?>
<?php endif; ?>

    <div class="sidebar__panel">
        <div class="sidebar__panel--visit">
            <div class="sidebar__panel--visit-image"
                 style="background: url('<?= $image->getThumbnail('sidebar_image'); ?>') no-repeat top center;"></div>
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

<?php if ($this->editmode) : ?>
    </div>
<?php endif; ?>