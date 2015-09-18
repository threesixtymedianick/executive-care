<?php
    $careHomeObject = $this->careHomeObject;
    $recommendations = $this->recommendations;
?>

<div class="our-homes__left__sliding sliding_content">
    <div class="our-homes__left__sliding__title">
        <div class="title1">
            Ratings and reports
        </div>        <?php if (!$this->editmode) : ?>
            <div class="our-homes__left__sliding__title__show-hide">
                <a href="#" class="show_hide">View +</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="our-homes__left__sliding__content equalHeight <?= $this->editmode ? "" : "slide"; ?>">
        <?php if (!empty($recommendations)) : ?>
            <?php foreach ($recommendations as $recommendation) : ?>
                <?= $recommendation['title']; ?>
                <?= $recommendation['description']; ?>
                <?= $recommendation['pubDate']; ?>
                <?= $recommendation['author']; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
