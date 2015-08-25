<?php $form = $this->volunteerForm; ?>
<form enctype="application/x-www-form-urlencoded" action="" method="post" id="volunteer_form">
    <?= $form->volunteer_name; ?>
    <?= $form->volunteer_email; ?>
    <?= $form->volunteer_number; ?>
    <?= $form->volunteer_address; ?>
    <?= $form->volunteer_message; ?>
    <?= $form->volunteer_opt_in; ?>
    <?= $form->volunteer_submit; ?>
</form>
