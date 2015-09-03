<?php if ($this->editmode) : ?>
    <div>
        <span id="admin_carousel">
            <p>Drop image assets from the panel on the left here to add to carousel, then refresh the page to see them
                below.</p>
        </span>
        <?= $this->multihref("homepage-carousel"); ?>
    </div>
<?php endif; ?>
<div class="container">
    <div class="container__inner">
        <div class="home">
            <div class="home__left">
                <div class="home__panel home__welcome">
                    <ul class="bxslider">
                        <?php foreach ($this->multihref("homepage-carousel") as $element) : ?>
                            <?php if (!($element->getFullPath() === "" || $element->getFullPath() === null) && $element instanceof \Pimcore\Model\Asset\Image) : ?>
                                <li style="background-image: url('<?= $element->getFullPath(); ?>');">
                                    <div class="bxslider__slider-caption">
                                        <h1>Welcome to Executive Care</h1>

                                        <h2><a href="#">Find out more about us</a></h2>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="home__panels">
                    <div class="home__panel home__panel--split home__our-care-explained">
                        <h3 class="home__panel-header"><?= $this->textarea("our-care-explained"); ?></h3>

                        <p><?= $this->textarea("our-care-explained-description"); ?></p>
                        <a class="home__button home__button--white" href="#">Read more</a>
                    </div>

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
