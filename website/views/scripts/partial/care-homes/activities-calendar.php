<?php
    $careHomeObject = $this->careHomeObject;
?>

<div class="our-homes__left__sliding sliding_content">
    <div class="our-homes__left__sliding__title">
        <div class="title1">
            Activities Calendar
        </div>
        <?php if (!$this->editmode) : ?>
            <div class="our-homes__left__sliding__title__show-hide">
                <a href="#" class="show_hide">View +</a>
            </div>
        <?php endif; ?>
    </div>
    <div class="our-homes__left__sliding__content equalHeight <?= $this->editmode ? "" : "slide"; ?>">
        <?= $careHomeObject->getActivitiesCalendar(); ?>
    </div>
</div>