<?php
    $news = $this->news;
    $events = $this->events;
?>

<div class="blog__slider">
    <ul class="blogslider">
        <?php foreach ($events as $slider): ?>
            <?php if ($slider->getBlogImage() !== null): ?>
                <li style="background-image:url('<?= $slider->getBlogImage()->getFullPath(); ?>');">
                    <div class="blogslider__details">
                        <div class="blogslider__details--title">
                            <a href="<?= $this->url(['key' => $slider->getUrlPath()], 'blog-show', false, false); ?>">
                                <?= $slider->getTitle() ?>
                            </a>
                        </div>
                        <div class="blogslider__details--date">
                            <?= $slider->getDate()->toString('dd.MM.Y'); ?>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>
<div class="container">
    <div class="container__inner">
        <div class="blog">
            <div class="blog__left news-home">
                <ul class="tabs">
                    <li><a id="news_tab" href="#news">Latest News</a></li>
                    <li><a id="events_tab" href="#events">Events</a></li>
                </ul>
                <div class="blog__content">
                    <div class="tab" id="news">
                        <?php foreach ($news as $entry) : ?>
                            <?= $this->partial("blog/partial/blog-entry.php", [ "entry" => $entry ]); ?>
                        <?php endforeach; ?>

                        <div class="blog__content__pagination"><?= $news ?></div>
                    </div>
                    <div class="tab" id="events">
                        <?php foreach ($events as $entry) : ?>
                            <?= $this->partial("blog/partial/blog-entry.php", [ "entry" => $entry ]); ?>
                        <?php endforeach; ?>

                        <div class="blog__content__pagination"><?= $events ?></div>
                    </div>
                </div>
            </div>
            <div class="blog__right news-home">
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
