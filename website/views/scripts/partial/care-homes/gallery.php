<?php
    $careHomeObject = $this->careHomeObject;
?>

<div class="our-homes__left__sliding sliding_content">
    <div class="our-homes__left__sliding__title">
        <div class="title1">
            Gallery
        </div>
        <?php if (!$this->editmode) : ?>
            <div class="our-homes__left__sliding__title__show-hide">
                <a href="#" class="show_hide">View +</a>
            </div>
        <?php endif; ?>
    </div>
    <div class="our-homes__left__sliding__content equalHeight gallery <?= $this->editmode ? "" : "slide"; ?>">
        <?php foreach ($careHomeObject->getGallery() as $element) : ?>
           <?php if (!($element->getFullPath() === "" || $element->getFullPath() === null) && $element instanceof \Pimcore\Model\Asset\Image) : ?>
                <a data-lightbox="<?= $careHomeObject->getTitle(); ?>" href="<?= $element->getFullPath();?>">
                    <img src="<?=$element->getThumbnail('care_home_gallery');?>" />
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>