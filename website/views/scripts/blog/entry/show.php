<?php
    $this->layout()->setLayout('layout');
    $entry = $this->entry;
?>

<div class="blog__header">-</div>
<div class="container">
    <div class="container__inner">
        <div class="blog">
            <?php
                foreach ($this->entry->getCategories() as $category) {
                    $catName = $category->getName();
                }

                if ($catName === "Open Days") {
                    echo $this->partial("blog/partial/open-day.php", [ "entry" => $entry ]);
                } else {
                    echo $this->partial("blog/partial/news-article.php", [ "entry" => $entry ]);
                }
            ?>
            <div class="blog__right">
                <div class="blog__right__boxes open-days">
                    <div class="blog__right__boxes__title">
                        Upcoming<br />Open Days
                    </div>
                    <div class="blog__right__boxes__content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique rem, qui consectetur perspiciatis, mollitia voluptate.
                    </div>
                    <a href="#" class="blog__right__boxes__button">Read More</a>
                </div>
                <div class="blog__right__boxes book-a-visit">
                    <div class="blog__right__boxes__title full-width-panel">
                        Book a visit
                    </div>
                    <div class="blog__right__boxes__content full-width-panel">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure illo, officiis, explicabo mollitia nemo natus, unde suscipit neque non distinctio quas, quidem numquam laborum nisi et reprehenderit facilis reiciendis officia. Consectetur adipisicing elit enim fuga illo officiis aliquam molestiae accusantium.
                    </div>
                    <a href="#" class="blog__right__boxes__button">Read More</a>
                </div>
                <div class="blog__right__boxes recommendation">
                    <div class="recommendations-logo">
                        <img src="/website/static/images/home/carehome-co-uk.png" alt="Carehome">
                    </div>
                    <div class="recommendations-logo-copy">
                        Latest recommendations for homes in our group
                    </div>
                    <div class="blog__right__boxes__title full-width-panel">
                        Recommendation for Crystal Court
                    </div>
                    <div class="blog__right__boxes__content full-width-panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit ipsum praesentium earum dolorum fugiat ut similique facilis quod.<br >
                        <a href="#">continue reading</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
