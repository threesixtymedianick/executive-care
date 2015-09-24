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
                                <?php
                                if (null !== $element->getMetadata("Link-Document") && "" !== $element->getMetadata("Link-Document")) {
                                    $link = $element->getMetadata("Link-Document");
                                } elseif (null !== $element->getMetadata("Link-Object") && "" !== $element->getMetadata("Link-Object")) {
                                    $link = $element->getMetadata("Link-Object");
                                } elseif (null !== $element->getMetadata("Link-External") && "" !== $element->getMetadata("Link-External")) {
                                    $link = $element->getMetadata("Link-External");
                                } else {
                                    $link = "";
                                } ?>
                                <a href="<?= $link; ?>">
                                    <li style="background-image: url('<?= $element->getFullPath(); ?>');">
                                        <div class="bxslider__slider-caption">
                                            <?php if (null !== $element->getMetadata("title") && "" !== $element->getMetadata("title")) : ?>
                                                <h1>
                                                    <?= $element->getMetadata("title"); ?>
                                                </h1>
                                            <?php endif; ?>
                                            <?php if (null !== $element->getMetadata("subtitle") && "" !== $element->getMetadata("subtitle")) : ?>
                                                <h2>
                                                    <?= $element->getMetadata("subtitle"); ?>
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
