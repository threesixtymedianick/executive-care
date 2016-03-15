<?php $form = $this->applicationForm; ?>
<fieldset class="application_form_fields" id="personal_details">
    <div class="careers__apply__left__form__title">
        Personal Details (1/7)
    </div>
    <div class="tab__left field-wrap">
        <?= $form->application_name; ?>
    </div>
    <div class="tab__right field-wrap">
        <?= $form->application_email; ?>
    </div>
    <div class="tab__left field-wrap">
        <?= $form->application_number; ?>
    </div>
    <div class="tab__right field-wrap">
        <?= $form->application_address; ?>
    </div>
    <div class="tab__controls">
        <div class="field-wrap">
            <?= $form->application_work_permits; ?>
        </div>
    </div>
    <div class="tab__controls">
        <div class="field-wrap">
            <?= $form->application_apply_reason; ?>
        </div>
    </div>
    <div class="tab__controls">
        <div class="field-wrap">
            <?= $form->application_special_experience; ?>
        </div>
    </div>
    <div class="tab__controls">
        <div class="field-wrap">
            <?= $form->application_strengths; ?>
        </div>
    </div>
    <a href="#" class="careers__apply__left__form__nextbutton">
        Next
    </a>
</fieldset>
