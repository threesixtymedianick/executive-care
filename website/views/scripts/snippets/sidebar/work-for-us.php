<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
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
        <div class="sidebar__panel--content heightMatch">
            <h3><?= $title; ?></h3>
            <p><?= $content; ?></p>
            <?php if ($link !== null) : ?>
                <a href="<?= $link->getHref(); ?>" class="sidebar__panel--button mleft"><?= $link->getText(); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
