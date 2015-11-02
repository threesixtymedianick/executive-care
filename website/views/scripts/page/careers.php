<?php
    $applicationFormPDF = Asset::getById(25);
    $headerImage        = $this->image("careers_header");
    $pageDescription    = $this->wysiwyg('description');
    $vacancies          = $this->paginator;
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php else : ?>
    <div class="careers__header" style="background-image: url('<?= $headerImage->getThumbnail('header_images'); ?>');">-</div>
<?php endif; ?>

<div class="container">
    <div class="container__inner">
        <div class="careers">
            <div class="careers__left main">
                <div class="careers__left__content">
                    <div class="careers__left__content__title">
                        Jobs in our care homes
                    </div>
                    <div class="careers__left__content__box">
                        <?= $pageDescription; ?>

                        <?= $this->inc(Document_Snippet::getByPath('/snippets/vacancy-search')); ?>

                    </div>
                    <div class="careers__left__content__title results">
                        Vacancies
                    </div>
                    <div class="careers__left__content__box hide">

                        <?php if (empty($vacancies)) : ?>
                            No vacancies
                        <?php else: ?>
                            <?php foreach ($vacancies as $item) : ?>
                                <?= $this->partial("partial/vacancy/vacancy-item.php", [ "item" => $item ]); ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?= $this->paginationControl($vacancies, 'Sliding', 'partial/pagination.php', [
                            'urlprefix' => $this->document->getFullPath() . '?page=',
                            'appendQueryString' => true
                        ]); ?>
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
