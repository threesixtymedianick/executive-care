<?php
    $title = $this->title;
    $content = $this->content;
?>

<div class="our-homes__left__sliding sliding_content">
    <div class="our-homes__left__sliding__title">
        <?= $title ?>
        <?php if (!$this->editmode) : ?>
            <div class="our-homes__left__sliding__title__show-hide">
                <a href="#" class="show_hide">Show More +</a>
            </div>
        <?php endif; ?>
    </div>
    <div class="our-homes__left__sliding__content <?= $this->editmode ? "" : "slide"; ?>">
        <?= $content ?>
    </div>
</div>