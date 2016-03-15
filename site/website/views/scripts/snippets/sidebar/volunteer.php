<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
$title = $this->input("title", ["width" => 300]);
$content = $this->textarea("content");
$link = $this->link("link");
$image = $this->image('sidebar_image');
?>

<?php if ($this->editmode) : ?>
    <div style="width: 410px;">
    <p>Add the volunteer page link below</p>
    <?= $link; ?>
    <p>Add the sidebar image below</p>
    <?= $image; ?>
<?php endif; ?>

    <div class="sidebar__panel">
        <div class="sidebar__panel--volunteer">
            <a href="<?= $link->getHref(); ?>" class="sidebar__panel--volunteer-image"
                 style="background: url('<?= $image->getThumbnail('sidebar_image'); ?>') no-repeat top center;"></a>
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