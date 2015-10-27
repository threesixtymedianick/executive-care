<?php
$thankyouDesc = $this->wysiwyg("thankyouDesc");
$headerImage = $this->image("thankyouHeader");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php else : ?>
    <div class="thankyou__header" style="background-image: url('<?= $headerImage->getThumbnail('header_images'); ?>');">
        -
    </div>
<?php endif; ?>


<div class="container">
    <div class="container__inner">
        <div class="thank-you">
            <div class="thank-you__left">
                <ul class="tabs">
                    <li><a id="info_tab" href='#info'>Thank You</a></li>
                </ul>
                <div class="tab" id="info">
                    <?= $thankyouDesc ?>
                </div>
            </div>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/find-a-home')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/news-and-events')); ?>
            </div>
        </div>
    </div>
</div>