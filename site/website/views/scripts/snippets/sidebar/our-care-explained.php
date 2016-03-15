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
    <p>Add the work for us page link below</p>
    <?= $link; ?>
    <p>Add the sidebar image below</p>
    <?= $image; ?>
<?php endif; ?>

    <div class="sidebar__panel">
        <div class="sidebar__panel--care-explained">
            <div class="sidebar__panel--care-explained-image"
                 style="background: url('<?= $image->getThumbnail('sidebar_image'); ?>') no-repeat top center;"></div>
            <div class="sidebar__panel--content heightMatch">
                <h3><?= $title; ?></h3>

                <p><?= $content; ?></p>
                <?php if ($link !== null) : ?>
                    <a href="<?= $link->getHref(); ?>" class="sidebar__panel--button mleft"><?= $link->getText(); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php if ($this->editmode) : ?>
    </div>
<?php endif; ?>