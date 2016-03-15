<?php $form = $this->applicationForm; ?>
<fieldset class="application_form_fields" id="complete">
    <div class="careers__apply__left__form__title">
        Complete Application (7/7)
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae qui enim nemo laboriosam cumque vero perferendis alias in nobis blanditiis voluptatum pariatur quo suscipit, asperiores minus quidem quia earum nesciunt.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae qui enim nemo laboriosam cumque vero perferendis alias in nobis blanditiis voluptatum pariatur quo suscipit, asperiores minus quidem quia earum nesciunt.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae qui enim nemo laboriosam cumque vero perferendis alias in nobis blanditiis voluptatum pariatur quo suscipit, asperiores minus quidem quia earum nesciunt.</p>
    
    <div class="tab__controls">
      <div class="field-wrap">
        <?= $form->application_agree_statement; ?>
      </div>
    </div>
    <div class="tab__controls">
      <div class="field-wrap half">
        <?= $form->application_signature; ?>
      </div>
    </div>
    <div class="tab__controls">
      <div class="field-wrap">
        <?= $form->application_keep_on_file; ?>
      </div>
    </div>
    <?= $form->application_submit; ?>
</fieldset>
