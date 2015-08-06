<?php
    $contactUsAddress               = $this->wysiwyg("contact-us-address", ["width" => 200, "height" => 300]);
    $contactUsEnquiryNumber         = $this->input("contact-us_enquiry-number");
    $contactUsEnquiryNumberSecond   = $this->input("contact-us_enquiry-number-second");
    $contactUsOpeningTimes          = $this->input("contact-us_opening_times");
    $googleMapLocation              = $this->input("contact-us_map_location");
    $contactUsLiveChatDetails       = $this->wysiwyg("live_chat_details_content");
?>
<div class="container">
    <div class="container__inner">
        <div class="contact-us">
            <div class="contact-us__left">
                <ul class="tabs">
                    <li><a id="enquiry_tab" href='#enquiry'>Make an enquiry</a></li>
                    <li><a id="brochure_tab" href='#brochure'>Request a brochure</a></li>
                </ul>
                <div class="tab" id="enquiry">
                    <form enctype="application/x-www-form-urlencoded" action="" method="post" id="enquiry_form">
                        <div class="tab__left field-wrap">
                            <?= $this->enquiryForm->name ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $this->enquiryForm->email ?>
                        </div>
                        <div class="tab__left field-wrap">
                            <?= $this->enquiryForm->number ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $this->enquiryForm->address ?>
                        </div>
                        <div class="tab__controls">
                            <div class="field-wrap">
                                <?= $this->enquiryForm->message ?>
                            </div>
                            <?= $this->enquiryForm->opt_in ?>
                            <label for="opt_in">I would like to hear about the latest news and upcoming events</label>
                            <?= $this->enquiryForm->submit ?>
                        </div>
                    </form>
                </div>
                <div class="tab" id="brochure">
                    <form enctype="application/x-www-form-urlencoded" action="" method="post" id="brochure_form">
                        <div class="tab__left select-wrap">
                            <?= $this->brochureForm->care_home ?>
                        </div>
                        <div class="tab__right select-wrap">
                            <?= $this->brochureForm->delivery_method ?>
                        </div>
                        <div class="tab__left field-wrap">
                            <?= $this->enquiryForm->name ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $this->enquiryForm->email ?>
                        </div>
                        <div class="tab__left field-wrap">
                            <?= $this->enquiryForm->number ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $this->enquiryForm->address ?>
                        </div>
                        <div class="tab__controls">
                            <div class="field-wrap">
                                <?= $this->brochureForm->message ?>
                            </div>
                            <?= $this->brochureForm->opt_in ?>
                            <label for="opt_in">I would like to hear about the latest news and upcoming events</label>
                            <?= $this->brochureForm->submit ?>
                        </div>
                    </form>
                </div>
                <div class="contact-us__live-chat">
                    <div class="contact-us__live-chat__icon">
                        <img src="website/static/images/home/woman_headset2.png" />
                    </div>
                    <div class="contact-us__live-chat__details">
                        <div class="contact-us__live-chat__details__title">
                            Chat
                        </div>
                        <div class="contact-us__live-chat__details__content">
                            <?= $contactUsLiveChatDetails ?>
                        </div>
                        <div class="contact-us__live-chat__details__open-chat">
                            <a href="#livechat">Chat now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-us__right">
                <div class="contact-us__address">
                    <div class="contact-us__address__title">
                        Crystal Court Care Home
                    </div>
                    <div class="contact-us__address__address">
                        <?= $contactUsAddress ?>
                    </div>
                    <div class="contact-us__address__enquiries">
                    <div class="contact-us__address__enquiries__left">
                        Enquiries:
                    </div>
                    <div class="contact-us__address__enquiries__right">
                        <?= $contactUsEnquiryNumber ?><br />
                        <span id="opening_times"><?= $contactUsOpeningTimes ?></span>
                    </div>
                    <br clear="all" />
                    </div>
                    <div class="contact-us__address__telephone">
                        Tel: <?= $contactUsEnquiryNumberSecond ?>
                    </div>
                </div>
                <div id="map-canvas" data-placeId="<?= $this->config->place_id; ?>"></div>
            </div>

            <br clear="all" />
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
