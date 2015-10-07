<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
$recommendation = $this->recommendation;
$image = $this->image('sidebar_images');
?>

<?php if ($this->editmode) : ?>
    <div style="width: 410px;">
    <p>Add the sidebar image below</p>
    <?= $image; ?>
<?php endif; ?>

    <div class="sidebar__panel">
        <div class="sidebar__panel--recommendation">
            <div class="sidebar__panel--recommendation-image"
                 style="background: url('<?= $image->getThumbnail('sidebar_image'); ?>') no-repeat top center;"></div>
            <div class="sidebar__panel--content full-width-panel heightMatch">
                <img src="/website/static/images/reccomendation-logo.png">
                <div class="rec-text">
                Latest recomendations for homes in our group
                </div>
                <div class="clear">
                </div>
                <h3><?= $recommendation['title']; ?></h3>
                <small><?= $recommendation['pubDate']; ?> by <?= $recommendation['author']; ?></small>
                <p><?= $recommendation['description']; ?></p>
                <a href="<?= $recommendation['link']; ?>" target="_blank">
                    Continue reading
                </a>
            </div>
        </div>
    </div>

<?php if ($this->editmode) : ?>
    </div>
<?php endif; ?>