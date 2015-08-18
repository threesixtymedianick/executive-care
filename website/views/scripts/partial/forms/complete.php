<?php $form = $this->applicationForm; ?>
<fieldset id="complete">
    <div class="careers__apply__left__form__title">
        Complete Application (7/7)
    </div>
    <p>
        <?= $form->application_agree_statement; ?>
        <?= $form->application_signature; ?>
        <?= $form->application_agree_statement; ?>
    </p>
    <a href="#" onclick="return $('#application_form').nextpage();" class="careers__apply__left__form__nextbutton">
        Submit
    </a>
</fieldset>
