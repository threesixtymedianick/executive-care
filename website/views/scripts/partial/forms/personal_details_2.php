<?php $form = $this->applicationForm; ?>
<fieldset class="application_form_fields" id="personal_details_two">
    <div class="careers__apply__left__form__title">
        Personal Details (4/7)
    </div>
    <p>
        <?= $form->application_recent_company_name; ?>
        <?= $form->application_recent_company_position; ?>
        <?= $form->application_recent_company_address; ?>
        <?= $form->application_recent_company_number; ?>
        <?= $form->application_recent_company_email; ?>
        <?= $form->application_recent_company_from_date; ?>
        <?= $form->application_recent_company_to_date; ?>
        <?= $form->application_reason_for_leaving; ?>

        <?= $form->application_recent_company_name_two; ?>
        <?= $form->application_recent_company_position_two; ?>
        <?= $form->application_recent_company_address_two; ?>
        <?= $form->application_recent_company_number_two; ?>
        <?= $form->application_recent_company_email_two; ?>
        <?= $form->application_recent_company_from_date_two; ?>
        <?= $form->application_recent_company_to_date_two; ?>
        <?= $form->application_reason_for_leaving_two; ?>
    </p>
    <a href="#" class="careers__apply__left__form__nextbutton">
        Next
    </a>
</fieldset>
