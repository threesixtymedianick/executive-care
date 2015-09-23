<?php
    $headerImage          = $this->image("open-days_header");
    $days                 = $this->days
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php else: ?>
    <div class="blog__header" style="background-image: url('<?= $headerImage->getThumbnail('header_image'); ?>');">-</div>
<?php endif; ?>
<div class="container">
    <div class="container__inner">
        <div class="blog">
            <div class="blog__left opendays">
                <ul class="tabs">
                    <li><a id="open_day_tab" href='#opendays'>Upcoming open days</a></li>
                </ul>
                <div class="blog__content">
                    <div class="tab" id="opendays">
                        <?php foreach ($days as $entry) {
                            echo $this->partial("blog/partial/blog-entry.php", ["entry" => $entry]);
                        } ?>
                        <?= $this->paginationControl($days, 'Sliding', 'partial/pagination.php', [
                            'urlprefix' => $this->document->getFullPath() . '?page=',
                            'appendQueryString' => true
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="sidebar m-bottom">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/news-and-events')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/book-a-visit')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/recommendation')); ?>
            </div>
        </div>
    </div>
</div>