<?php
    $bookAVisitForm = $this->bookAVisitForm;
    $contactUsLiveChatDetails = $this->wysiwyg("live_chat_details_content", ["width" => 300, "height" => 100]);
    $headerImage = $this->image("book-a-visitHeader");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php else: ?>
    <div class="book-a-visit__header" style="background-image: url('<?= $headerImage->getThumbnail('header_images'); ?>');">-</div>
<?php endif; ?>

<div class="container">
    <div class="container__inner">
        <div class="volunteer">
            <div class="book-a-visit__left">
                <div class="book-a-visit__left__content">
                    <div class="book-a-visit__left__content__title">
                        Book a Visit
                    </div>
                    <div class="book-a-visit__left__content__box">
                        <form enctype="application/x-www-form-urlencoded" action="" method="post" id="bookAVisit_form">
                            <div class="book-a-visit__left__content__box__left field-wrap">
                                <?php
                                $careHome = $bookAVisitForm->bookAVisit_careHomes;
                                $careHome->setOptions($this->careHomeSelect());
                                echo $careHome;
                                ?>
                            </div>
                            <div id="dates"></div>
                            <div class="book-a-visit__left__content__box__left field-wrap clear fullWidth">
                                <div class="bkv">
                                    <label for="bookAVisit_date">Date:</label>
                                    <?= $bookAVisitForm->bookAVisit_date ?>
                                </div>

                                <div class="bkv">
                                    <label for="bookAVisit_time">Time:</label>
                                    <?= $bookAVisitForm->bookAVisit_time ?>
                                </div>
                            </div>
                            <div class="book-a-visit__left__content__box__left field-wrap clear">
                                <?= $bookAVisitForm->bookAVisit_name ?>
                            </div>
                            <div class="book-a-visit__left__content__box__right field-wrap">
                                <?= $bookAVisitForm->bookAVisit_email ?>
                            </div>
                            <div class="book-a-visit__left__content__box__left field-wrap">
                                <?= $bookAVisitForm->bookAVisit_number ?>
                            </div>
                            <div class="book-a-visit__left__content__box__right field-wrap">
                                <?= $bookAVisitForm->bookAVisit_address ?>
                            </div>
                            <div class="book-a-visit__left__content__box__controls">
                                <?= $bookAVisitForm->bookAVisit_opt_in ?>
                                <label for="$bookAVisit_opt_in">I would like to hear about the latest news and upcoming
                                    events</label>
                                <?= $bookAVisitForm->bookAVisit_submit ?>
                            </div>
                        </form>
                    </div>
                </div>
                <?= $this->inc(Document_Snippet::getByPath('/snippets/live-chat')); ?>
            </div>
            <div class="sidebar book-a-visit">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/find-a-home')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/upcoming-open-days')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/recommendation')); ?>
            </div>
        </div>
    </div>
