<div class="container">
    <div class="container__inner">
        <div class="blog">
            <div class="blog__left">
                <ul class="tabs">
                    <li><a id="news_tab" href='#opendays'>Upcoming open days</a></li>
                </ul>
                <div class="blog__content">
                    <div class="tab" id="opendays">
                        <?php foreach ($this->days as $entry) {
                            echo $this->partial("blog/partial/blog-entry.php", ["entry" => $entry]);
                        } ?>
                        <div class="blog__content__pagination"><?= $this->days ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>