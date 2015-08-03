<?php
    $ourCareInfoBox       = $this->wysiwyg("our-care_info");
?>

<div class="our-care__header">-</div>
<div class="container">
    <div class="container__inner">
        <div class="our-care">
            <div class="our-care__left">
                <div class="our-care__left__content">
                    <div class="our-care__left__content__title">
                        Our Care
                    </div>
                    <div class="our-care__left__content__box">
                        <?= $ourCareInfoBox ?>
                    </div>
                </div>
                <?php while($this->block("contentblock")->loop()) : ?>
                    <div class="our-care__left__sliding sliding_content">
                        <div class="our-care__left__sliding__title">
                            <?= $this->input("title"); ?>
                            <div class="our-care__left__sliding__title__show-hide">
                                Show <a href="#" class="show_hide">More   +</a>
                            </div>
                        </div>
                        <div class="our-care__left__sliding__content slide">
                            <?= $this->wysiwyg("content") ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="our-care__right">

            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>