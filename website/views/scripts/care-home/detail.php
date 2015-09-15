<?php $careHomeObject = $this->careHomeObject; ?>

<div class="our-care__header">-</div>
<div class="container">
    <div class="container__inner">
        <div class="our-homes">
            <div class="our-homes__left">
                <div class="our-homes__left__content">

                    <div class="our-homes__left__content__title">
                        Welcome to
                    </div>
                    <img class="our-homes__left__content__headerimage"
                         src="<?= $this->careHomeImage($careHomeObject); ?>"/>

                    <div class="our-homes__left__content__wrapper">
                        <div class="our-homes__left__content__box">
                            <?= $careHomeObject->getDescription(); ?>
                        </div>
                        <?= $this->partial("partial/care-homes/letter-from-the-manager.php", ["careHomeObject" => $careHomeObject]); ?>

                        <?= $this->partial("partial/care-homes/activities-calendar.php", ["careHomeObject" => $careHomeObject]); ?>

                        <?= $this->partial("partial/care-homes/gallery.php", ["careHomeObject" => $careHomeObject]); ?>

                        <?= $this->partial("partial/care-homes/ratings-and-report.php", ["careHomeObject" => $careHomeObject]); ?>

                        <div class="our-homes__left__content__title">
                            Others nearby
                        </div>
                        <div class="our-homes__left__content__box">
                            More 'ere
                        </div>
                    </div>
                </div>
                <div class="our-homes__right">
                </div>
            </div>
        </div>
    </div>