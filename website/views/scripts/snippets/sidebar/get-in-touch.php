<?php
if ($this->editmode) {
    echo $this->snippetEditModeStyles();
}

$title = $this->input("title");
?>

<div class="sidebar__buttons get-in-touch">
    <?php if (!$this->editmode) : ?>
        <a href="/contact-us" alt="Get in touch with us"><?= $title; ?></a>
    <?php else : ?>
        <?= $title; ?>
    <?php endif; ?>
</div>
