<?php
$whyWorkForm = $this->whyWorkForm;
$whyWorkTitle = $this->input("whyWorkTitle", ["width"=> 300]);
$whyWorkDesc = $this->wysiwyg("whyWorkDesc");
$whyWorkReq = $this->wysiwyg("whyWorkReq");
$headerImage = $this->image("whyWorkHeader");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="whyWork__header" style="background-image: url('<?= $headerImage->getSrc(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="volunteer">
            <div class="volunteer__left">
                <div class="volunteer__left__content">
                    <div class="volunteer__left__content__title">
                        <?= $whyWorkTitle ?>
                    </div>
                    <div class="volunteer__left__content__box">
                        <?= $whyWorkDesc ?>

                        <?= $whyWorkReq ?>

                        <?= $this->inc(Document_Snippet::getByPath('/snippets/vacancy-search')); ?>
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