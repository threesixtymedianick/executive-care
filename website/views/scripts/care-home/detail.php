<?php
$careHome        = $this->careHome;
$recommendations = $this->recommendations;

$googleMapsUrl = 'https://www.google.com/maps/preview/@' . $careHome->getLat() . ',' . $careHome->getLon() . ',13z';
?>

<div class="our-care__header">-</div>
<div class="container">
    <div class="container__inner">
        <div class="our-homes">
            <div class="our-homes__left">
                <div class="our-homes__left__title">
                    Welcome to
                </div>
                <div class="our-homes__left__content">

                    <img class="our-homes__left__content__headerimage"
                         src="<?= $this->careHomeImage($careHome); ?>"/>

                    <div class="our-homes__left__content__wrapper">
                        <div class="our-homes__left__content__box">
                            <?= $careHome->getDescription(); ?>
                        </div>
                        <?= $this->partial("partial/care-homes/letter-from-the-manager.php", ["careHomeObject" => $careHome]); ?>

                        <?= $this->partial("partial/care-homes/life-here-at-the-home.php", ["careHomeObject" => $careHome]); ?>

                        <?= $this->partial("partial/care-homes/gallery.php", ["careHomeObject" => $careHome]); ?>

                        <?= $this->partial("partial/care-homes/ratings-and-report.php", [
                            "careHomeObject"  => $careHome,
                            "recommendations" => $recommendations,
                        ]); ?>
                    </div>
                </div>
                <br/>

                <div class="our-homes__left__title">
                    Others nearby
                </div>
                <div class="our-homes__left__nearby">
                    More 'ere
                </div>
            </div>
            <div class="sidebar">
                <div class="map-container">
                    <div id="careHomeMap"
                         class="map"
                         data-id="<?= $careHome->getId() ?>"
                         data-lat="<?= $careHome->getLat() ?>"
                         data-lon="<?= $careHome->getLon() ?>">
                    </div>
                    <div class="address">
                        <h2>How to find us</h2>
                        <?= $careHome->getTitle() ?>
                        <?= $careHome->getAddress() ?>
                        <?= $careHome->getPostcode() ?>

                        <a href="<?= $googleMapsUrl ?>" target="_blank">Find us</a>
                    </div>
                </div>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/get-in-touch')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/request-brochure')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/vacancies')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/news-and-events')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/recommendation')); ?>
            </div>
        </div>
    </div>
</div>
</div>
