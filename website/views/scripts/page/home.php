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
                            <?php $image = $element->getThumbnail('homepage_slider');
                            if (!($image === "" || $image === null) && $element instanceof \Pimcore\Model\Asset\Image) : ?>
                                <?php
                                $linkDocument = $element->getMetadata("Link-Document");
                                $linkObject = $element->getMetadata("Link-Object");
                                $linkExternal = $element->getMetadata("Link-External");
                                if (null !== $linkDocument && "" !== $linkDocument) {
                                    $link = $linkDocument;
                                } elseif (null !== $linkObject && "" !== $linkObject) {
                                    $link = $linkObject;
                                } elseif (null !== $linkExternal && "" !== $linkExternal) {
                                    $link = $linkExternal;
                                } else {
                                    $link = "";
                                } ?>
                                <a href="<?= $link; ?>">
                                    <li style="background-image: url('<?= $image; ?>');">
                                        <div class="bxslider__slider-caption">
                                            <?php $metadataTitle = $element->getMetadata("title");
                                            if (null !== $metadataTitle && "" !== $metadataTitle) : ?>
                                                <h1>
                                                    <?= $metadataTitle; ?>
                                                </h1>
                                            <?php endif; ?>
                                            <?php $metadataSubtitle = $element->getMetadata("subtitle");
                                            if (null !== $metadataSubtitle && "" !== $metadataSubtitle) : ?>
                                                <h2>
                                                    <?= $metadataSubtitle; ?>
                                                </h2>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="home__panels">
                    <div class="sidebar__panel">
                        <div class="sidebar__panel--care-explained">
                            <div class="sidebar__panel--care-explained-image"></div>
                            <div class="sidebar__panel--content heightMatch">
                                <h3><?= $title; ?></h3>

                                <p><?= $content; ?></p>
                                <a href="/our-care" class="sidebar__panel--button mleft">Read More</a>
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
