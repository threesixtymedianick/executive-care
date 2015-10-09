<?php
    $trainingTab       = $this->wysiwyg("training-tab");
    $developmentTab   = $this->wysiwyg("development-tab");
    $headerImage = $this->image("thankyouHeader");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php else : ?>
    <div class="training-development__header" style="background-image: url('<?= $headerImage->getThumbnail('header_images'); ?>');">-</div>
<?php endif; ?>
<div class="container">
    <div class="container__inner">
        <div class="training-development">
            <div class="training-development__left">

                <?php if (!$this->editmode) : ?>
                    <ul class="tabs">
                        <li><a id="training_tab" href='#training'>Training</a></li>
                        <li><a id="development_tab" href='#development'>Development</a></li>
                    </ul>
                    <div class="tab" id="training">
                        <?= $trainingTab ?>
                    </div>
                    <div class="tab" id="development">
                        <?= $developmentTab ?>
                    </div>
                <?php else : ?>
                    <ul class="tabs">
                        <li><a id="training_tab" href='#training'>Training</a></li>
                    </ul>
                    <div class="tab" id="training">
                        <?= $trainingTab ?>
                    </div>
                    <br />
                    <ul class="tabs">
                        <li><a id="development_tab" href='#development'>Development</a></li>
                    </ul>
                    <div class="tab" id="development">
                        <?= $developmentTab ?>
                    </div>
                <?php endif; ?>
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
