<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
    $applicationFormPDF = $this->href("downloadApplicationForm");
?>

<?php if ($this->editmode): ?>
    <p>Place application form asset here</p>
    <?= $applicationFormPDF ?>
<?php endif; ?>

<div class="sidebar__buttons download">
    <a href="<?= $applicationFormPDF->getFullPath(); ?>" alt="Download application form">Download form</a>
</div>
