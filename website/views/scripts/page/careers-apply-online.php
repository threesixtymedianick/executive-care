<?php 
    $headerImage = $this->href("about_us_header");
?>
<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="careers__apply__header" style="background-image: url('<?= $headerImage->getFullPath(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="careers__apply">
            <div class="careers__apply__left">
                <div class="careers__apply__left__title">
                    Online Application Form
                </div>
                <div class="careers__apply__left__form">
                    <form enctype="application/x-www-form-urlencoded" action="" method="post" id="application_form">
                        <?= $this->partial("partial/forms/personal_details_1.php", $this); ?>
                        <?= $this->partial("partial/forms/position.php", $this); ?>
                        <?= $this->partial("partial/forms/education_training.php", $this); ?>
                        <?= $this->partial("partial/forms/personal_details_2.php", $this); ?>
                        <?= $this->partial("partial/forms/references.php", $this); ?>
                        <?= $this->partial("partial/forms/medical.php", $this); ?>
                        <?= $this->partial("partial/forms/complete.php", $this); ?>
                    </form>
                    <br style="clear:both;"/>
                </div>
            </div>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/volunteer')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/training')); ?>
                
                <?= $this->inc(Document_Snippet::getByPath('/snippets/download-form')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/job-alerts')); ?>
            </div>
        </div>
    </div>
</div>
