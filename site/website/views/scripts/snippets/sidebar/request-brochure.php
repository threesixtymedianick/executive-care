<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
$linkText = "Request a Brochure";
$careHome = $this->careHome;
?>

<?php if ($this->editmode) : ?>
<div style="width: 410px;">
    <p>Add the request brochure page link below</p>
    <?= $link; ?>
    <?php endif; ?>

    <div class="sidebar__buttons request-brochure">
        <?php if (!$this->editmode) : ?>
            <?php if ($careHome !== null) : ?>
                <a href="/contact-us?carehome=<?= $careHome->getId(); ?>&#brochure" class="mleft"><?= $linkText; ?></a>
            <?php else : ?>
                <a href="/contact-us?#brochure" class="mleft"><?= $linkText; ?></a>
            <?php endif; ?>
        <?php else : ?>
            <a><?= $linkText; ?></a>
        <?php endif; ?>
    </div>
    <?php if ($this->editmode) : ?>
</div>
<?php endif; ?>
