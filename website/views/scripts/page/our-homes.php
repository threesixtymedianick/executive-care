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
                         src="<?= $this->careHomeObject->getHomeImage()->getFullPath(); ?>"/>

                    <div class="our-homes__left__content__wrapper">
                        <div class="our-homes__left__content__box">
                            <?= $this->careHomeObject->getDescription(); ?>
                        </div>
                        <?php
                        $title = "Letter from the manager";
                        $content = $this->careHomeObject->getLetterFromManager();
                        echo $this->partial("partial/care-home-slide.php", ["title" => $title, "content" => $content]);

                        $title = "Activities Calendar";
                        $content = $this->careHomeObject->getActivitiesCalendar();
                        echo $this->partial("partial/care-home-slide.php", ["title" => $title, "content" => $content]);

                        $title = "Gallery";
                        $content = "";
                        foreach ($this->careHomeObject->getGallery() as $element) {
                            if (!($element->getFullPath() === "" || $element->getFullPath() === null) && $element instanceof \Pimcore\Model\Asset\Image) {
                                $content .= "<img class=\"our-homes__left__sliding__content__gallery-item\" src=\"" . $element->getFullPath() . "\"/>";
                            }
                        }
                        echo $this->partial("partial/care-home-slide.php", ["title" => $title, "content" => $content]);

                        $title = "Ratings and Reports";
                        $content = "Ratings and Reports";
                        echo $this->partial("partial/care-home-slide.php", ["title" => $title, "content" => $content]);
                        ?>

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