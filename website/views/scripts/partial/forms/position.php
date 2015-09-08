<?php $form = $this->applicationForm; ?>
<fieldset class="application_form_fields" id="position">
    <div class="careers__apply__left__form__title">
        The Position (2/7)
    </div>
    <div class="tab__left field-wrap">
        <?= $form->application_home_name_1; ?>
    </div>
    <div class="tab__right field-wrap">
        <?= $form->application_home_name_2; ?>
    </div>
    <div class="tab__left field-wrap">
        <?= $form->application_home_name_3; ?>
    </div>
    <div class="tab__right field-wrap">
        <?= $form->application_position_1; ?>
    </div>
    <div class="tab__left field-wrap">
        <?= $form->application_position_2; ?>
    </div>
    <div class="tab__right field-wrap">
        <?= $form->application_position_3; ?>
    </div>
    <div class="tab__left field-wrap">
        <?= $form->application_preferred_shift; ?>
    </div>
    <div class="tab__right field-wrap">
        <?= $form->application_preferred_hours; ?>
    </div>
    <div class="tab__controls">
        <div class="field-wrap">
            <?= $form->application_bank_positions; ?>
        </div>
    </div>
    <div class="tab__controls">
        <div class="field-wrap half">
            <?= $form->application_how_did_you_hear; ?>
        </div>
    </div>
    <div class="tab__left field-wrap">
        <?= $form->application_how_did_you_hear_other; ?>
    </div>
    <div class="tab__right field-wrap">
        <?= $form->application_friend_referral; ?>
    </div>
    <a href="#" class="careers__apply__left__form__nextbutton">
        Next
    </a>
</fieldset>