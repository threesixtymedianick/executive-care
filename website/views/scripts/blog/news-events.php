<div class="container">
    <div class="container__inner">
        <div class="blog">
            <div class="blog__left">
                <ul class="tabs">
                    <li><a id="news_tab" href='#news'>Latest News</a></li>
                    <li><a id="events_tab" href='#events'>Events</a></li>
                </ul>
                <div class="blog__content">
                    <div class="tab" id="news">
                        <?php foreach ($this->news as $entry) {
                            $url = $this->url(['key' => $entry->getUrlPath()], 'blog-show', false, false);
                            echo $this->partial("blog/partial/blog-entry.php", ["url" => $url, "entry" => $entry]);
                        } ?>
                        <div class="blog__pagination"><?= $this->news ?></div>
                    </div>
                    <div class="tab" id="events">
                        <?php foreach ($this->events as $entry) {
                            $url = $this->url(['key' => $entry->getUrlPath()], 'blog-show', false, false);
                            echo $this->partial("blog/partial/blog-entry.php", ["url" => $url, "entry" => $entry]);
                        } ?>
                        <div class="blog__pagination"><?= $this->events ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>