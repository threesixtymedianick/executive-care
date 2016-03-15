<?php $form = $this->applicationForm; ?>
<fieldset class="application_form_fields" id="education_training">
    <div class="careers__apply__left__form__title">
        Education and Training (3/7)
    </div>
    <p>Please tick the qualifications that you have:</p>
    <div class="tab__col-1-3 field-wrap">
        <?= $form->application_qualification_one; ?>
    </div>
    <div class="tab__col-1-3 field-wrap">
        <?= $form->application_qualification_two; ?>
    </div>
    <div class="tab__col-1-3 field-wrap">
        <?= $form->application_qualification_three; ?>
    </div>
    <div class="tab__col-1-3 field-wrap">
        <?= $form->application_qualification_four; ?>
    </div>
    <div class="tab__col-1-3 field-wrap">
        <?= $form->application_qualification_five; ?>
    </div>
    <div class="tab__col-1-3 field-wrap">
        <?= $form->application_qualification_six; ?>
    </div>
    <div class="tab__controls">
        <div class="field-wrap">
            <?= $form->application_relevant_qualifications; ?>
        </div>
    </div>
    <div class="tab__controls">
        <div class="field-wrap">
            <?= $form->application_professional_bodies; ?>
        </div>
    </div>
    <div class="tab__controls">
        <div class="field-wrap">
            <?= $form->application_nurse_details; ?>
        </div>
    </div>
    <a href="#" class="careers__apply__left__form__nextbutton">
        Next
    </a>
</fieldset>