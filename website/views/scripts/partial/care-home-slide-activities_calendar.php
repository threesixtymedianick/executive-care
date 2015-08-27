<?php $careHomeObject = $this->careHomeObject; ?>

<div class="our-homes__left__sliding sliding_content">
    <div class="our-homes__left__sliding__title">
        <?= "Calendar Activities" ?>
        <?php if (!$this->editmode) : ?>
            <div class="our-homes__left__sliding__title__show-hide">
                <a href="#" class="show_hide">Show More +</a>
            </div>
        <?php endif; ?>
    </div>
    <div class="our-homes__left__sliding__content <?= $this->editmode ? "" : "slide"; ?>">
        <?= $careHomeObject->getActivitiesCalendar(); ?>
    </div>
</div>