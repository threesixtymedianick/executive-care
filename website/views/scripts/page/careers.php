<?php
$applicationFormPDF = Asset::getById(25);
$careersVolunteerHeader = $this->wysiwyg("careers_volunteer_header");
$careersVolunteerDescription = $this->wysiwyg("careers_volunteer_description");
?>
<div class="container">
    <div class="container__inner">
        <div class="careers">
            <div class="careers__left">
                <div class="careers__left__title">
                    Volunteer Program
                </div>
                <div class="careers__left__content">
                    <div class="careers__left__content__container">
                        <?= $careersVolunteerHeader; ?>
                    </div>
                    <div class="careers__left__content__subtitle">
                        You will:
                    </div>
                    <div class="careers__left__content__container">
                        <?= $careersVolunteerDescription; ?>
                    </div>
                    <div class="careers__left__content__container">
                        <?= $this->partial("partial/forms/volunteer.php", $this); ?>
                    </div>
                </div>
            </div>
            <div class="careers__right">
                <div class="careers__right__applyonline">
                    <a href="/careers/apply" alt="Apply online now">Apply Online</a>
                </div>

                <div class="careers__right__download">
                    <a href="<?= $applicationFormPDF->getFullPath() ?>" alt="Download application form">Download
                        form</a>
                </div>
            </div>
        </div>
    </div>
</div>
