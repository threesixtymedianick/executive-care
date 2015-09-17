<?php $careHome = $this->careHome; ?>

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

                        <?= $this->partial("partial/care-homes/activities-calendar.php", ["careHomeObject" => $careHome]); ?>

                        <?= $this->partial("partial/care-homes/gallery.php", ["careHomeObject" => $careHome]); ?>

                        <?= $this->partial("partial/care-homes/ratings-and-report.php", ["careHomeObject" => $careHome]); ?>
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
                <?= $this->inc(Document_Snippet::getByPath('/snippets/get-in-touch')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/news-and-events')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/recommendation')); ?>
            </div>
        </div>
    </div>
</div>
</div>