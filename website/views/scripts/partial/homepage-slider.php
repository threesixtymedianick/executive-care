<?php $element = $this->element; ?>

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