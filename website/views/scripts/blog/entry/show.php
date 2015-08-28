<?php
    $this->layout()->setLayout('layout');
    $entry = $this->entry;
?>

<div class="blog__header" style="background-image:url('<?= $this->entry->getBlogImage()->getFullPath(); ?>');">-</div>
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
            <div class="sidebar">
                <div class="sidebar__panel">
                    <div class="sidebar__panel--news-events">
                        <div class="sidebar__panel--news-events-image"></div>
                        <div class="sidebar__panel--content">
                            <h3>News &amp;<br />events</h3>
                            <p>Lorem ipsum dolor sit amet, aperiam gubergren vim ei, ex usu imperdiet moderatius. Solet tation</p>
                            <a href="/contact-us" class="sidebar__panel--button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="sidebar__panel">
                    <div class="sidebar__panel--visit">
                        <div class="sidebar__panel--content full-width-panel">
                            <h3>Book a visit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure illo, officiis, explicabo mollitia nemo natus, unde suscipit neque non distinctio quas, quidem numquam laborum nisi et reprehenderit facilis reiciendis officia. Consectetur adipisicing elit enim fuga illo officiis aliquam molestiae accusantium.</p>
                            <a href="/contact-us" class="sidebar__panel--button right">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="sidebar__panel">
                    <div class="sidebar__panel--recommendation">
                        <div class="recommendations-logo">
                            <img src="/website/static/images/home/carehome-co-uk.png" alt="Carehome" />
                        </div>
                        <div class="recommendations-logo-copy">
                            Latest recommendations for homes in our group
                        </div>
                        <div class="sidebar__panel--content full-width-panel">
                            <h4>Recommendation for Crystal Court</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit ipsum praesentium earum dolorum fugiat
                                ut similique facilis quod.<br>
                            <a href="#">continue reading</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
