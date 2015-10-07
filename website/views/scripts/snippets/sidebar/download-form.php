<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
$applicationFormPDF = $this->href("downloadApplicationForm");
?>

<?php if ($this->editmode): ?>
<div style="width: 410px;">
    <p>Place application form asset here</p>
    <?= $applicationFormPDF ?>
    <?php endif; ?>
    <div class="sidebar__buttons download">
        <?php if (null !== $applicationFormPDF || "" !== $applicationFormPDF) : ?>
            <a href="<?= $applicationFormPDF->getFullPath(); ?>" alt="Download application form">Download form</a>
        <?php endif; ?>
    </div>
    <?php if ($this->editmode) : ?>
</div>
<?php endif; ?>
