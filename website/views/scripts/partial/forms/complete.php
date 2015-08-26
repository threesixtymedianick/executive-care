<?php $form = $this->applicationForm; ?>
<fieldset class="application_form_fields" id="complete">
    <div class="careers__apply__left__form__title">
        Complete Application (7/7)
    </div>
    <p>
        <?= $form->application_agree_statement; ?>
        <?= $form->application_signature; ?>
        <?= $form->application_agree_statement; ?>
    </p>
    <?= $form->application_submit; ?>
</fieldset>
