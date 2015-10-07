<?php
    $aboutUsInfoTab = $this->wysiwyg("about_us_info");
    $headerImage = $this->image("about_us_header");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php else: ?>
    <div class="about-us__header" style="background-image: url('<?= $headerImage->getThumbnail('header_images'); ?>');">-</div>
<?php endif; ?>

<div class="container">
    <div class="container__inner">
        <div class="about-us">
            <div class="about-us__left">
                <ul class="tabs">
                    <li><a id="info_tab" href='#info'>About Us</a></li>
                </ul>
                <div class="tab" id="info">
                    <?= $aboutUsInfoTab ?>
                </div>
            </div>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/find-a-home')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/contact-us')); ?>
            </div>
        </div>
    </div>
</div>
