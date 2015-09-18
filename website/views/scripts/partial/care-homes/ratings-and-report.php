<?php
$careHomeObject = $this->careHomeObject;
$recommendations = $this->recommendations;
?>

<div class="our-homes__left__sliding sliding_content">
    <div class="our-homes__left__sliding__title">
        <div class="title1">
            Ratings and reports
        </div> <?php if (!$this->editmode) : ?>
            <div class="our-homes__left__sliding__title__show-hide">
                <a href="#" class="show_hide">View +</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="our-homes__left__sliding__content equalHeight <?= $this->editmode ? "" : "slide"; ?>">
        <?php if (!empty($recommendations)) : ?>
            <?php foreach ($recommendations as $recommendation) : ?>
                <div class="our-homes__left__content--ratings-row">
                    <div class="author">
                        <?= $recommendation['author']; ?>
                    </div>
                    <br />
                    <div class="date">
                        <?= (new DateTime($recommendation['pubDate']))->format('j F Y'); ?><br />
                    </div>
                    <br />
                    <div class="description">
                        <?= $recommendation['description']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
