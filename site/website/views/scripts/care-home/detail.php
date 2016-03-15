<?php
$careHome        = $this->careHome;
$recommendation  = $this->recommendations;
$googleMapsUrl   = 'https://www.google.com/maps/preview/@' . $careHome->getLat() . ',' . $careHome->getLon() . ',13z';
$nearbyHomes     = $this->nearbyHomes;
$careHomeImage   = $this->careHomeImage($careHome);
$banner = $careHome->getBanner();
?>

<div class="our-care__header home-header" style="background-image: url('<?= $careHomeImage; ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="our-homes">
            <div class="our-homes__left main">
                <div class="our-homes__left__title">
                    Welcome to <?= $careHome->getTitle(); ?>
                </div>
                <div class="our-homes__left__content">
                    <?php
                    if (null !== $banner && "" !== $careHome->getBanner()) : ?>
                        <img class="our-homes__left__content__headerimage" src="<?= $careHome->getBanner(); ?>"/>
                    <?php endif; ?>
                    <div class="our-homes__left__content__wrapper">
                        <div class="our-homes__left__content__box">
                            <?= $careHome->getDescription(); ?>
                        </div>
                        <?= $this->partial("partial/care-homes/letter-from-the-manager.php", ["careHomeObject" => $careHome]); ?>

                        <?= $this->partial("partial/care-homes/life-here-at-the-home.php", ["careHomeObject" => $careHome]); ?>

                        <?= $this->partial("partial/care-homes/gallery.php", ["careHomeObject" => $careHome]); ?>

                        <?= $this->partial("partial/care-homes/ratings-and-report.php", ["careHomeObject"  => $careHome]); ?>
                    </div>
                </div>
                <br/>

                <div class="our-homes__left__title">
                    Others nearby
                </div>
                <div class="our-homes__left__nearby">
                    <div class="nearby-homes-slider">
                        <?php if (isset($nearbyHomes)) : ?>
                            <?php foreach ($nearbyHomes as $nearbyHome) : ?>
                                <div class="slide">
                                    <img src="<?= $nearbyHome->getHomeImage() ?>" />
                                    <div class="slide--home-details">
                                        <h3><?= $nearbyHome->getTitle(); ?></h3>
                                        <p><?= round($nearbyHome->distance, 2) ?> miles away</p>
                                        <a href="<?= $nearbyHome->getKey() ?>">Find out more</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="sidebar homes-detail">
                <div class="map-container">
                    <div id="careHomeMap"
                         class="map-container__map"
                         data-id="<?= $careHome->getId() ?>"
                         data-lat="<?= $careHome->getLat() ?>"
                         data-lon="<?= $careHome->getLon() ?>">
                    </div>
                    <div class="address">
                        <h2>How to find us</h2>
                        <p>
                            <?= $careHome->getTitle() ?><br />
                            <?= $careHome->getAddress() ?><br />
                            <?= $careHome->getPostcode() ?><br />
                            <?php if ($careHome->getPhoneNumber() !== null || $careHome->getPhoneNumber()): ?>
                                TEL: <?=$careHome->getPhoneNumber(); ?>
                            <?php endif ?>
                         </p>

                        <a href="<?= $googleMapsUrl ?>" target="_blank">Find us</a>
                    </div>
                </div>

                <div class="sidebar__buttons get-in-touch">
                    <a href="/contact-us?carehome=<?= $careHome->getId() ?>" alt="Get in touch with us">
                        Get in touch
                    </a>
                </div>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/request-brochure'), ['careHome' => $careHome]); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/vacancies')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/news-and-events')); ?>

                <?php if (null !== $recommendation): ?>
                    <div class="sidebar__panel">
                        <div class="sidebar__panel--recommendation">
                            <div class="sidebar__panel--recommendation-image"></div>
                            <div class="sidebar__panel--content full-width-panel heightMatch">
                                <div class="recommendation-logo">    
                                    <img src="/website/static/images/logos/reccomendation-logo.png">
                                </div>
                                <h3><?= $recommendation['title']; ?></h3>
                                <small><?= $recommendation['pubDate']; ?> by <?= $recommendation['author']; ?></small>
                                <p><?= mb_strimwidth($recommendation['description'], 0, 150, "..."); ?></p>
                                <a href="<?= $recommendation['link']; ?>" target="_blank">
                                    Continue reading
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
