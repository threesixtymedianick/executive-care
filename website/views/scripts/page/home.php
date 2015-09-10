<?php
    $title = $this->input("our-care-title");
    $content = $this->textarea("our-care-content");
    
    if ($this->editmode) : ?>
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
                    <div class="sidebar__panel">
                        <div class="sidebar__panel--care-explained equalHeight">
                            <div class="sidebar__panel--care-explained-image"></div>
                            <div class="sidebar__panel--content">
                                <h3><?= $title; ?></h3>
                                <p><?= $content; ?></p>
                                <a class="sidebar__panel--button mleft"></a>
                            </div>
                        </div>
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
