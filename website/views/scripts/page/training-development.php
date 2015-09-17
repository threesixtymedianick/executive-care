<?php
    $trainingTab       = $this->wysiwyg("training-tab");
    $developmentTab   = $this->wysiwyg("development-tab");
?>

<div class="training-development__header">-</div>
<div class="container">
    <div class="container__inner">
        <div class="training-development">
            <div class="training-development__left">
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
            </div>
                <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/volunteer')); ?>
                
                <?= $this->inc(Document_Snippet::getByPath('/snippets/training')); ?>
                </div>
        </div>
    </div>
</div>
