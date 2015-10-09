<?php 
    $headerImage = $this->image("about_us_header");
    $form = $this->applicationForm;
?>
<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php else : ?>
    <div class="careers__apply__header" style="background-image: url('<?= $headerImage->getThumbnail('header_images'); ?>');">-</div>
<?php endif; ?>

<div class="container">
    <div class="container__inner">
        <div class="careers__apply">
            <div class="careers__apply__left">
                <div class="careers__apply__left__title">
                    Online Application Form
                </div>
                <div class="careers__apply__left__form">
                    <form enctype="application/x-www-form-urlencoded" action="" method="post" id="application_form">
                        <div class="tab__left field-wrap">
                            <?= $form->application_careHomes ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $form->application_vacancyRoles ?>
                        </div>
                        <div class="tab__left field-wrap">
                            <?= $form->application_name ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $form->application_number ?>
                        </div>
                        <div class="tab__controls field-wrap">
                            <?= $form->application_email ?>
                        </div>
                        <div class="tab__controls">
                            <div class="field-wrap">
                                <?= $form->application_coverLetter ?>
                            </div>
                            <?= $form->application_submit ?>
                        </div>
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
