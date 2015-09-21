<?php
$bookAVisitForm = $this->bookAVisitForm;
$headerImage = $this->href("book-a-visitHeader");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="book-a-visit__header" style="background-image: url('<?= $headerImage->getFullPath(); ?>');">-</div>
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
                            <div class="book-a-visit__left__content__box__left field-wrap">
                                <?= $bookAVisitForm->bookAVisit_date ?>

                                <?= $bookAVisitForm->bookAVisit_day ?>

                                <?= $bookAVisitForm->bookAVisit_time ?>
                            </div>
                            <div class="book-a-visit__left__content__box__left field-wrap">
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
            </div>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/find-a-home')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/upcoming-open-days')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/recommendation')); ?>
            </div>
        </div>
    </div>