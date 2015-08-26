<?php $formName = "application_"; ?>

<div class="container">
    <div class="container__inner">
        <div class="careers__apply">
            <div class="careers__apply__left">
                <div class="careers__apply__left__title">
                    Online Application Form
                </div>
                <div class="careers__apply__left__form">
                    <form enctype="application/x-www-form-urlencoded" action="" method="post" id="application_form">
                        <?= $this->partial("partial/forms/personal_details_1.php", $this); ?>
                        <?= $this->partial("partial/forms/position.php", $this); ?>
                        <?= $this->partial("partial/forms/education_training.php", $this); ?>
                        <?= $this->partial("partial/forms/personal_details_2.php", $this); ?>
                        <?= $this->partial("partial/forms/references.php", $this); ?>
                        <?= $this->partial("partial/forms/medical.php", $this); ?>
                        <?= $this->partial("partial/forms/complete.php", $this); ?>
                    </form>
                    <br style="clear:both;"/>
                </div>
            </div>
            <div class="careers__apply__right">
                Panel Right
            </div>
        </div>
    </div>
</div>
