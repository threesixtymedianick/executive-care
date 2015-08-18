<?php $form = $this->applicationForm; ?>
<fieldset id="education_training">
    <div class="careers__apply__left__form__title">
        Education and Training (3/7)
    </div>
    <p>
        <?= $form->application_qualification_one; ?>
        <?= $form->application_qualification_two; ?>
        <?= $form->application_qualification_three; ?>
        <?= $form->application_qualification_four; ?>
        <?= $form->application_qualification_five; ?>
        <?= $form->application_qualification_six; ?>
        <?= $form->application_relevant_qualifications; ?>
        <?= $form->application_professional_bodies; ?>
        <?= $form->application_nurse_details; ?>
    </p>
    <a href="#" onclick="return $('#application_form').nextpage();" class="careers__apply__left__form__nextbutton">
        Next
    </a>
</fieldset>