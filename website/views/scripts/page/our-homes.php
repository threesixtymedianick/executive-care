<?php
    $ourHomesDescription       = $this->wysiwyg("our_homes_description");
?>
<div class="container">
    <div class="container__inner">
        <div class="our-homes">
            <div class="our-homes__left">
                <div class="our-homes__left__title">
                    Our Homes
                </div>
                <div class="our-homes__left__content">
                    <p>
                        <?= $ourHomesDescription ?>
                    </p>
                    <input type="search" placeholder="Search by name, town or postcode" />
                    <!-- TODO: Here we will eventually loop over the database of homes and add them automatically for now, here are some default ones I've added -->
                    <br style="clear: both;" />
                    <div class="our-homes__left__content__homes-box-left">
                        <img class="our-homes__left__content__homes-box-left__image"
                             src="website/static/images/home/find-a-home.png" alt=""/>
                        <div class="our-homes__left__content__homes-box-left__info">
                            <div class="our-homes__left__content__homes-box-left__info__title">
                                Fernedale<br />
                                Care Home
                            </div>
                            <div class="our-homes__left__content__homes-box-left__info__distance">
                                xx Miles away<br/>
                            </div>
                            <div class="our-homes__left__content__homes-box-left__info__address">
                                Parksprings Road</br >
                                Gainsborough<br/>
                                Lincolnshire<br/>
                            </div>
                        </div>
                        <div class="our-homes__left__content__homes-box-left__find-out-more">
                            Find out more
                        </div>

                        <br style="clear:both" />
                    </div>

                    <div class="our-homes__left__content__homes-box-right">
                        <img class="our-homes__left__content__homes-box-right__image"
                             src="website/static/images/home/find-a-home.png" alt=""/>
                        <div class="our-homes__left__content__homes-box-right__info">
                            <div class="our-homes__left__content__homes-box-right__info__title">
                                Fernedale<br />
                                Care Home
                            </div>
                            <div class="our-homes__left__content__homes-box-right__info__distance">
                                xx Miles away<br/>
                            </div>
                            <div class="our-homes__left__content__homes-box-right__info__address">
                                Parksprings Road</br >
                                Gainsborough<br/>
                                Lincolnshire<br/>
                            </div>
                        </div>
                        <div class="our-homes__left__content__homes-box-right__find-out-more">
                            Find out more
                        </div>

                        <br style="clear:both" />
                    </div>
                    <br style="clear:both" />
                </div>
            </div>
            <div class="our-homes__right">
            </div>
        </div>
    </div>
</div>