<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
$link = $this->link('link');
$applyUrlString = $this->getParam('applyUrlString');
?>

<?php if ($this->editmode): ?>
    <div style="width: 410px;">
    <p>Add the apply online page link below</p>
    <?= $link; ?>
<?php endif; ?>

    <div class="sidebar__buttons applyonline">
        <?php if (!$this->editmode) : ?>
            <?php if ($link !== null) : ?>
                <a href="<?= $link->getHref(); ?><?= $applyUrlString; ?>" class="mleft"><?= $link->getText(); ?></a>
            <?php endif; ?>
        <?php else : ?>
            <?php if ($link !== null) : ?>
                <a><?= $link->getText(); ?></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>

<?php if ($this->editmode) : ?>
    </div>
<?php endif; ?>