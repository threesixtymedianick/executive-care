<?php
$headerImage = $this->image("careers_header");
$results = $this->results;
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>


<div class="careers__header" style="background-image: url('<?= $headerImage->getThumbnail('header_images'); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="careers">
            <div class="careers__left">
                <div class="careers__left__content">
                    <div class="careers__left__content__title results">
                        Current Vacancies
                    </div>
                    <div class="careers__left__content__box">
                        <?= $this->inc(Document_Snippet::getByPath('/snippets/vacancy-search')); ?>

                        <?php foreach ($results as $i => $item) : ?>
                            <?= $this->partial("partial/vacancy/vacancy-item.php", ["item" => $item]); ?>
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
