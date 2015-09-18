<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
    $recommendation = $this->recommendation;
?>

<?php if ($this->editmode) : ?>
    <p>Add the contact page link here</p>
    <?= $link; ?>
<?php endif; ?>

<div class="sidebar__panel">
    <div class="sidebar__panel--recommendation equalHeight">
        <div class="sidebar__panel--recommendation-image"></div>
        <div class="sidebar__panel--content full-width-panel">
            <h3><?= $recommendation['title']; ?></h3>
            <small><?= $recommendation['pubDate']; ?> by <?= $recommendation['author']; ?></small>
            <p><?= $recommendation['description']; ?></p>
            <a href="<?= $recommendation['link']; ?>" target="_blank">
                Continue reading
            </a>
        </div>
    </div>
</div>
