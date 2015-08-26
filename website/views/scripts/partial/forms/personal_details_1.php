<?php $form = $this->applicationForm; ?>
<fieldset class="application_form_fields" id="personal_details">
    <div class="careers__apply__left__form__title">
        Personal Details (1/7)
    </div>
    <p>
        <?= $form->application_name; ?>
        <?= $form->application_email; ?>
        <?= $form->application_number; ?>
        <?= $form->application_address; ?>
        <?= $form->application_work_permits; ?>
        <?= $form->application_apply_reason; ?>
        <?= $form->application_special_experience; ?>
        <?= $form->application_strengths; ?>
    </p>
    <a href="#" class="careers__apply__left__form__nextbutton">
        Next
    </a>
</fieldset>
