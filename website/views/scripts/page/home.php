<?php
$title = $this->input("our-care-title");

$carouselImages = $this->multihref("homepage-carousel");

if ($this->editmode) : ?>
    <div>
        <span id="admin_carousel">
            <p>Drop image assets from the panel on the left here to add to carousel, then refresh the page to see them
                below.</p>
        </span>
        <?= $carouselImages; ?>
    </div>
<?php endif; ?>
<div class="container">
    <div class="container__inner">
        <div class="home">
            <div class="home__left">
                <div class="home__panel home__welcome">
                    <ul class="bxslider">
                        <?php foreach ($carouselImages as $element) : ?>
                            <?php if ($element instanceof \Pimcore\Model\Asset\Image) : ?>
                                <?= $this->partial("partial/homepage-slider.php", ['element' => $element]); ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="home__panels">
                    <?= $this->inc(Document_Snippet::getByPath('/snippets/our-care-explained')); ?>

                    <?= $this->inc(Document_Snippet::getByPath('/snippets/recommendation')); ?>
                </div>
            </div>

            <div class="sidebar home">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/find-a-home')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/news-and-events')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/work-for-us')); ?>
            </div>
        </div>
    </div>
</div>
