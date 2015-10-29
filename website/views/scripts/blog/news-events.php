<?php
$news = $this->news;
$events = $this->events;
?>

<div class="blog__slider">
    <ul class="blogslider">
        <?php foreach ($news as $slider): ?>
            <?php if ($slider->getBlogImage() !== null): ?>
                <a href="<?= $this->url(['key' => $slider->getUrlPath()], 'blog-show', false, false); ?>">
                    <li style="background-image:url('<?= $slider->getBlogImage()->getThumbnail('header_images'); ?>');">
                        <div class="blogslider__details">
                            <div class="blogslider__details--title">
                                <?= $slider->getTitle() ?>
                            </div>
                            <div class="blogslider__details--date">
                                <?= $slider->getDate()->toString('dd.MM.Y'); ?>
                            </div>
                        </div>
                    </li>
                </a>
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
                            <?= $this->partial("blog/partial/blog-entry.php", ["entry" => $entry]); ?>
                        <?php endforeach; ?>

                        <?= $this->paginationControl($news, 'Sliding', 'partial/pagination.php', [
                            'urlprefix' => $this->document->getFullPath() . '?page=',
                            'urlsuffix' => '#news',
                            'appendQueryString' => true
                        ]); ?>
                    </div>
                    <div class="tab" id="events">
                        <?php foreach ($events as $entry) : ?>
                            <?= $this->partial("blog/partial/blog-entry.php", ["entry" => $entry]); ?>
                        <?php endforeach; ?>

                        <?= $this->paginationControl($events, 'Sliding', 'partial/pagination.php', [
                            'urlprefix' => $this->document->getFullPath() . '?page=',
                            'urlsuffix' => '#events',
                            'appendQueryString' => true
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="sidebar blog">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/upcoming-open-days')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/book-a-visit')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/recommendation')); ?>
            </div>
        </div>
    </div>
</div>
