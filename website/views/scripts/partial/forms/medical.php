<?php $form = $this->applicationForm; ?>
<fieldset class="application_form_fields" id="medical">
    <div class="careers__apply__left__form__title">
         Medical (6/7)
    </div>
    <p>
        <?= $form->application_medical_problem_one; ?>
        <?= $form->application_medical_problem_two; ?>
        <?= $form->application_medical_problem_three; ?>
        <?= $form->application_medical_problem_four; ?>
        <?= $form->application_medical_problem_five; ?>
        <?= $form->application_medical_problem_six; ?>
        <?= $form->application_medical_problem_seven; ?>
        <?= $form->application_medical_problem_eight; ?>
        <?= $form->application_medical_problem_nine; ?>

        <?= $form->application_medical_impairment_one; ?>
        <?= $form->application_medical_impairment_two; ?>
        <?= $form->application_medical_impairment_three; ?>
        <?= $form->application_medical_impairment_reasons; ?>
    </p>
    <a href="#" class="careers__apply__left__form__nextbutton">
        Next
    </a>
</fieldset>