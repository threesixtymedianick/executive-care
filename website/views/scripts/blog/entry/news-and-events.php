<?php $this->layout()->setLayout('layout') ?>
<?php
    DEFINE("NEWS_ID", 5);
    DEFINE("EVENTS_ID", 6);
?>
<div class="container">
    <div class="container__inner">
        <div class="blog">
            <div class="blog__left">
                <ul class="tabs">
                    <li><a id="enquiry_tab" href='#enquiry'>Make an enquiry</a></li>
                    <li><a id="brochure_tab" href='#brochure'>Request a brochure</a></li>
                </ul>
                <div class="blog__content">
                    <div class="tab" id="enquiry">
                        <?php foreach ($this->paginator as $entry) {
                            if ($entry->getCategories()[0]->getId() === EVENTS_ID) {
                                $url = $this->url(['key' => $entry->getUrlPath()], 'blog-show', false, false);
                                echo $this->partial("blog/partial/blog-entry.php", ["url" => $url, "entry" => $entry]);
                            }
                        } ?>
                    </div>
                    <div class="tab" id="enquiry">
                        <?php foreach ($this->paginator as $entry) {
                            if ($entry->getCategories()[0]->getId() === NEWS_ID) {
                                $url = $this->url(['key' => $entry->getUrlPath()], 'blog-show', false, false);
                                echo $this->partial("blog/partial/blog-entry.php", ["url" => $url, "entry" => $entry]);
                            }
                        } ?>
                    </div>
                    <div class="blog__pagination"><?= $this->paginator ?></div>
                </div>
            </div>
        </div>
    </div>
</div>