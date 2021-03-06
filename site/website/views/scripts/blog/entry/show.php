<?php
$this->layout()->setLayout('layout');
$entry = $this->entry;

if (strcasecmp($entry->getCategories()[0]->getName(), "testimonials") === 0) {
    $headerImage = '/website/var/assets/header-images/thanks_1.jpg';
} else {
    $headerImage = '/website/static/images/default/news-and-events-stock.jpg';
}

?>

<div class="blog__header" style="background-image:url('<?= $headerImage; ?>')">-</div>
<div class="container">
    <div class="container__inner">
        <div class="blog">
            <?php
            foreach ($this->entry->getCategories() as $category) {
                $catName = $category->getName();
            }

            if ($catName === "Open Days") {
                echo $this->partial("blog/partial/open-day.php", ["entry" => $entry]);
            } else {
                echo $this->partial("blog/partial/news-article.php", ["entry" => $entry]);
            }
            ?>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/news-and-events')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/book-a-visit')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/recommendation')); ?>
            </div>
        </div>
    </div>
</div>
