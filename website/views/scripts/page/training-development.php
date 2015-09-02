<?php
    $trainingTab       = $this->wysiwyg("training-tab");
    $developmentTab   = $this->wysiwyg("development-tab");
?>

<div class="training-development__header">-</div>
<div class="container">
    <div class="container__inner">
        <div class="training-development">
            <div class="training-development__left">
                <ul class="tabs">
                    <li><a id="training_tab" href='#training'>Training</a></li>
                    <li><a id="development_tab" href='#development'>Development</a></li>
                </ul>
                <div class="tab" id="training">
                    <?= $trainingTab ?>
                </div>
                <div class="tab" id="development">
                    <?= $developmentTab ?>
                </div>
            </div>
            <div class="training-development__right">
                <div class="training-development__right__boxes find-a-home">
                    <div class="training-development__right__boxes__title">
                        Find a<br />Home
                    </div>
                    <div class="training-development__right__boxes__content">
                        Use our interactive search tool to find an Executive Care home near you. Enter your postcode, town or city below:
                    </div>
                    <input type="search" class="training-development__right__boxes__button" name="search" placeholder="Search" />
                </div>
                <div class="training-development__right__boxes contact-us">
                    <div class="training-development__right__boxes__title">
                        Contact<br />us
                    </div>
                    <div class="training-development__right__boxes__content">
                        Lorem ipsum dolor sit amet, aperiam gubergren vim ei, ex usu imperdiet moderatius. Solet tation
                    </div>
                    <div class="training-development__right__boxes__button">
                        <a href="/contact-us">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
