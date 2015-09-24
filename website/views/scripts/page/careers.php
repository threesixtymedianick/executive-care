<?php
    $applicationFormPDF = Asset::getById(25);
    $headerImage        = $this->href("careers_header");
    $pageDescription    = $this->wysiwyg('description');
    $vacancies          = $this->vacancies;
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

                        <div class="careers__left__content__box--row-pagination">
                            <ul>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5...</a></li>
                                <li><a href="#">16</a></li>
                                <li><a href="#">></a></li>
                            </ul>
                        </div>
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
