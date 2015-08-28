<?php
    $careHomeObject = $this->careHomeObject;
    $ourCareHomesLetter   = $this->input("ourCareLetter");
?>

<div class="our-homes__left__sliding sliding_content">
    <div class="our-homes__left__sliding__title">
        <?= $ourCareHomesLetter ?>
        <?php if (!$this->editmode) : ?>
            <div class="our-homes__left__sliding__title__show-hide">
                <a href="#" class="show_hide">Show More +</a>
            </div>
        <?php endif; ?>
    </div>
    <div class="our-homes__left__sliding__content <?= $this->editmode ? "" : "slide"; ?>">
        <?= $careHomeObject->getLetterFromManager(); ?>
    </div>
</div>