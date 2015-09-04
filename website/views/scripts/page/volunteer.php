<?php
    $volunteerForm = $this->volunteerForm;
    $volunteerTitle = $this->input("volunteerTitle");
    $volunteerDesc = $this->wysiwyg("volunteerDesc");
    $volunteerReq = $this->wysiwyg("volunteerReq");
?>

<div class="volunteer__header">-</div>
<div class="container">
    <div class="container__inner">
        <div class="volunteer">
            <div class="volunteer__left">
                <div class="volunteer__left__content">
                    <div class="volunteer__left__content__title">
                        <?= $volunteerTitle ?>
                    </div>
                    <div class="volunteer__left__content__box">
                        <?= $volunteerDesc ?>

                        <?= $volunteerReq ?>

                        <form enctype="application/x-www-form-urlencoded" action="" method="post" id="volunteer_form">
                            <div class="volunteer__left__content__box__left field-wrap">
                                <?= $volunteerForm->volunteer_name ?>
                            </div>
                            <div class="volunteer__left__content__box__right field-wrap">
                                <?= $volunteerForm->volunteer_email ?>
                            </div>
                            <div class="volunteer__left__content__box__left field-wrap">
                                <?= $volunteerForm->volunteer_number ?>
                            </div>
                            <div class="volunteer__left__content__box__right field-wrap">
                                <?= $volunteerForm->volunteer_address ?>
                            </div>
                            <div class="volunteer__left__content__box__controls">
                                <div class="field-wrap">
                                    <?= $volunteerForm->volunteer_message ?>
                                </div>
                                <?= $volunteerForm->volunteer_opt_in ?>
                                <label for="volunteer_opt_in">I would like to hear about the latest news and upcoming events</label>
                                <?= $volunteerForm->volunteer_submit ?>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="sidebar">
                    
                </div>
            </div>
        </div>
    </div>