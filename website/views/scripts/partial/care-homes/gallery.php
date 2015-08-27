<?php $careHomeObject = $this->careHomeObject; ?>

<div class="our-homes__left__sliding sliding_content">
    <div class="our-homes__left__sliding__title">
        <?= "Gallery" ?>
        <?php if (!$this->editmode) : ?>
            <div class="our-homes__left__sliding__title__show-hide">
                <a href="#" class="show_hide">Show More +</a>
            </div>
        <?php endif; ?>
    </div>
    <div class="our-homes__left__sliding__content <?= $this->editmode ? "" : "slide"; ?>">
        <?php
        foreach ($careHomeObject->getGallery() as $element) {
            if (!($element->getFullPath() === "" || $element->getFullPath() === null) && $element instanceof \Pimcore\Model\Asset\Image) {
                echo '<img class="our-homes__left__sliding__content__gallery-item" src="' . $element->getFullPath() . '"/>';
            }
        }
        ?>
    </div>
</div>