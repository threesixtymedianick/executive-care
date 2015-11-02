<?php
$title                  = $this->input('title', [ 'width' => 250 ]);
$ourCareInfoBox         = $this->wysiwyg("our-care_info");
$headerImage            = $this->image("our-care_header");
$testimonial            = $this->testimonial;
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php else: ?>
    <div class="our-care__header" style="background-image: url('<?= $headerImage->getThumbnail('header_image'); ?>');">-</div>
<?php endif; ?>
<div class="container">
    <div class="container__inner">
        <div class="our-care">
            <div class="our-care__left main">
                <div class="our-care__left__content">
                    <div class="testimonials__left__content__title">
                        <?= $title ?>
                    </div>
                    <div class="our-care__left__content__box">
                        <?php foreach ($testimonial as $entry) {
                            echo $this->partial("blog/partial/testimonial-entry.php", ["entry" => $entry]);
                        } ?>
                        <?= $this->paginationControl($testimonial, 'Sliding', 'partial/pagination.php', [
                            'urlprefix' => $this->document->getFullPath() . '?page=',
                            'appendQueryString' => true
                        ]); ?>
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