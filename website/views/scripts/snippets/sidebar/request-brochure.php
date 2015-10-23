<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
$link = $this->link("link");
?>

<?php if ($this->editmode) : ?>
<div style="width: 410px;">
    <p>Add the request brochure page link below</p>
    <?= $link; ?>
    <?php endif; ?>

    <div class="sidebar__buttons request-brochure">
        <?php if (!$this->editmode) : ?>
            <?php if ($link !== null) : ?>
                <a href="<?= $link->getHref(); ?>" class="mleft"><?= $link->getText(); ?></a>
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
