<?php
$headerImage          = $this->image("careers_header");
$vacancy              = $this->vacancy[0];

$vacancyRoleId = null;
$vacancyCareHomeId = null;

// Grab the Vacancy Role ID for the application form
if (isset($vacancy->getRoleTitle()[0])) {
    $vacancyRoleId = $vacancy->getRoleTitle()[0]->getId();
}

// Grab the Care Home ID for the application form
if (isset($vacancy->getCareHomes()[0])) {
    $vacancyCareHomeId = $vacancy->getCareHomes()[0]->getId();
}

// Format the URL parameters
$urlFormat = "?carehome=%s&vacancy=%s";
$applyUrlString = sprintf($urlFormat, $vacancyCareHomeId, $vacancyRoleId);

?>
<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="container">
    <div class="container__inner">
        <div class="careers careers-detail">
            <div class="careers__left main">
                <div class="careers__left__content">
                    <div class="careers__left__content__title">
                        <?php if (isset($vacancy->getRoleTitle()[0])) : ?>
                            <?= $vacancy->getRoleTitle()[0]->getName(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="careers__left__content__box">
                        <div class="careers__left__content__box--detailrow">
                            <div class="details-title">
                                Home:
                            </div>
                            <div class="details">
                                <?php if (isset($vacancy->getCareHomes()[0])) : ?>
                                    <?= $vacancy->getCareHomes()[0]->getTitle(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="careers__left__content__box--detailrow">
                            <div class="details-title">
                                Hours:
                            </div>
                            <div class="details">
                                <?= $vacancy->getContractHours(); ?> p/w
                            </div>
                        </div>
                        <div class="careers__left__content__box--detailrow">
                            <div class="details-title">
                                Reporting to:
                            </div>
                            <div class="details">
                                <?= $vacancy->getReportTo(); ?>
                            </div>
                        </div>
                        <div class="careers__left__content__box--detailrow">
                            <div class="details-title">
                                Purpose:
                            </div>
                            <div class="details">
                                <?= $vacancy->getPurpose(); ?>
                            </div>
                        </div>
                        <h2>Skills, knowledge and qualifications</h2>
                        <?= $vacancy->getSkillsKnoweldgeQualification(); ?>
                        <div class="careers__left__content__box--responsibilities">
                            <h2>Main responsibilities</h2>
                            <?= $vacancy->getMainResponsibilities(); ?>
                        </div>
                    </div>
                    <div class="careers__left__content--button">
                        <a href="/careers/apply<?= $applyUrlString;?>" alt="Apply online now">Apply Online</a>
                    </div>
                    <?php if ($vacancy->getApplicationForm() || $vacancy->getApplicationForm() !== null) : ?>
                        <div class="careers__left__content--button">
                            <a href="<?= $vacancy->getApplicationForm()->getFullPath() ?>" alt="Download application form">Download Application</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/volunteer')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/training')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/apply-online'), ['applyUrlString' => $applyUrlString]); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/download-form')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/job-alerts')); ?>
            </div>
        </div>
    </div>
</div>