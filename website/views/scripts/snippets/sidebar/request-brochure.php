<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
$title = $this->input("title");
?>

<div class="sidebar__buttons request-brochure">
    <?php if (!$this->editmode) : ?>
        <a href="/contact-us" alt="Get in touch with us"><?= $title; ?></a>
    <?php else : ?>
        <?= $title; ?>
    <?php endif; ?>
</div>
