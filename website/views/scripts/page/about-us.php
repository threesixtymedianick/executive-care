<?php
    $aboutUsInfoTab       = $this->wysiwyg("about_us_info");
    $aboutUsTrainingTab   = $this->wysiwyg("about_us_training");
    $headerImage          = $this->href("about_us_header");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="about-us__header" style="background-image: url('<?= $headerImage->getFullPath(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="about-us">
            <div class="about-us__left">
                <ul class="tabs">
                    <li><a id="info_tab" href='#info'>About Us</a></li>
                    <li><a id="training_tab" href='#training'>Staff Training</a></li>
                </ul>
                <div class="tab" id="info">
                    <?= $aboutUsInfoTab ?>
                </div>
                <div class="tab" id="training">
                    <?= $aboutUsTrainingTab ?>
                </div>
            </div>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/find-a-home')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/contact-us')); ?>
            </div>
        </div>
    </div>
</div>
