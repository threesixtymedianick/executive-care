<?php
$applicationFormPDF         = Asset::getById(25);
$headerImage                = $this->href("careers_header");
$vacancy                    = $this->vacancy;

$vacancyChunk = array_chunk($vacancy, 2, true);
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>


<div class="careers__header" style="background-image: url('<?= $headerImage->getFullPath(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="careers">
            <div class="careers__left">
                <div class="careers__left__content">
                    <div class="careers__left__content__title results">
                        Current Vacancies
                    </div>
                    <div class="careers__left__content__box">
                        <?php foreach($vacancyChunk as $chunk) : ?>
                            <div class="careers__left__content__box--row">
                                <?php foreach ($chunk as $home) : ?>
                                    <div class="careers__left__content__box--result">
                                        <p>
                                            <?= $home->getRoleTitle(); ?><br />
                                            <?= $home->getCareHomes()[0]->getTitle(); ?> <br />
                                            <?= $home->getContractHours(); ?> hours, <?= $home->getContractShift(); ?> - <?= $home->getContractType(); ?><br />
                                            Closing date: <?= $home->getClosingDate(); ?>
                                        </p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/volunteer')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/training')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/apply-online')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/download-form')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/job-alerts')); ?>
            </div>
        </div>
    </div>
</div>