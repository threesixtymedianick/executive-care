<?php
$thankyouDesc = $this->wysiwyg("thankyouDesc");
$headerImage = $this->image("thankyouHeader");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="thankyou__header" style="background-image: url('<?= $headerImage->getSrc(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="thankyou">
            <div class="thankyou__left">
                <div class="thankyou__left__content">
                    <div class="thankyou__left__content__title">
                        Thankyou
                    </div>
                    <div class="thankyou__left__content__box">
                        <?= $thankyouDesc ?>

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