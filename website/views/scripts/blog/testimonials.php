<?php
$title                = $this->input('title', [ 'width' => 250 ]);
$ourCareInfoBox       = $this->wysiwyg("our-care_info");
$headerImage          = $this->href("our-care_header");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="our-care__header" style="background-image: url('<?= $headerImage->getFullPath(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="our-care">
            <div class="our-care__left">
                <div class="our-care__left__content">
                    <div class="testimonials__left__content__title">
                        <?= $title ?>
                    </div>
                    <div class="our-care__left__content__box">
                        <?php foreach ($this->testimonial as $entry) {
                            echo $this->partial("blog/partial/testimonial-entry.php", ["entry" => $entry]);
                        } ?>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/find-a-home')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/upcoming-open-days')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/book-a-visit')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/recommendation')); ?>
            </div>
        </div>
    </div>
</div>