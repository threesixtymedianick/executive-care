<div class="container">
    <div class="container__inner">
        <div class="blog">
            <div class="blog__left">
                <ul class="tabs">
                    <li><a id="news_tab" href='#opendays'>Open Days</a></li>
                </ul>
                <div class="blog__content">
                    <div class="tab" id="opendays">
                        <?php foreach ($this->days as $entry) {
                            $url = $this->url(['key' => $entry->getUrlPath()], 'blog-show', false, false);
                            echo $this->partial("blog/partial/blog-entry.php", ["url" => $url, "entry" => $entry]);
                        } ?>
                        <div class="blog__pagination"><?= $this->news ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>