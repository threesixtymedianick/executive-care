<?php $form = $this->applicationForm; ?>
<fieldset class="application_form_fields" id="personal_details_two">
    <div class="careers__apply__left__form__title">
        Personal Details (4/7)
    </div>
        <p><strong>Current or most recent employer:</strong></p>
        <div class="row">
            <div class="tab__left field-wrap">
                <?= $form->application_recent_company_name; ?>
            </div>
            <div class="tab__right field-wrap">
                <?= $form->application_recent_company_position; ?>
            </div>
        </div>
        <div class="row">
            <div class="tab__left field-wrap">
                <?= $form->application_recent_company_address; ?>
            </div>
            <div class="tab__right field-wrap">
                <?= $form->application_recent_company_number; ?>
            </div>
        </div>
        <div class="row">
            <div class="tab__left field-wrap">
                <?= $form->application_recent_company_email; ?>
            </div>
            <div class="tab__right field-wrap">
                <div class="tab__right--col-1-2">
                    <?= $form->application_recent_company_from_date; ?>
                </div>
                <div class="tab__right--col-1-2">
                    <?= $form->application_recent_company_to_date; ?>
                </div>
            </div>
        </div>
        <div class="tab__controls">
            <div class="field-wrap">
                <?= $form->application_reason_for_leaving; ?>
            </div>
        </div>
        <p><strong>Current or most recent employer:</strong></p>
        <div class="row">
            <div class="tab__left field-wrap">
                <?= $form->application_recent_company_name_two; ?>
            </div>
            <div class="tab__right field-wrap">
                <?= $form->application_recent_company_position_two; ?>
            </div>
        </div>
        <div class="row">
            <div class="tab__left field-wrap">
                <?= $form->application_recent_company_address_two; ?>
            </div>
            <div class="tab__right field-wrap">
                <?= $form->application_recent_company_number_two; ?>
            </div> 
        </div>
        <div class="row">
            <div class="tab__left field-wrap">
                <?= $form->application_recent_company_email_two; ?>
            </div>
            <div class="tab__right field-wrap">
                <div class="tab__right--col-1-2">
                    <?= $form->application_recent_company_from_date_two; ?>
                </div>
                <div class="tab__right--col-1-2">
                    <?= $form->application_recent_company_to_date_two; ?>
                </div>
            </div>
        </div>
        <div class="tab__controls">
            <div class="field-wrap">
                <?= $form->application_reason_for_leaving_two; ?>
            </div>
        </div>
    <a href="#" class="careers__apply__left__form__nextbutton">
        Next
    </a>
</fieldset>
