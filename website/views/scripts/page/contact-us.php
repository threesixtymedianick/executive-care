<?php
    $contactUsAddress               = $this->wysiwyg("contact-us-address", ["width" => 200, "height" => 300]);
    $contactUsEnquiryNumber         = $this->input("contact-us_enquiry-number");
    $contactUsEnquiryNumberSecond   = $this->input("contact-us_enquiry-number-second");
    $contactUsOpeningTimes          = $this->input("contact-us_opening_times");
    $googleMapLocation              = $this->input("contact-us_map_location");
    $contactUsLiveChatDetails       = $this->wysiwyg("live_chat_details_content");
    $contactUsEnquiryHeader         = $this->wysiwyg("contact-us-header");
?>
<div class="container">
    <div class="container__inner">
        <div class="contact-us">
            <div class="sidebar contact">
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
                        </div>
                        <br />
                        <div class="contact-us__address__telephone">
                            Tel: <?= $contactUsEnquiryNumberSecond ?>
                        </div>
                    </div>
                    <div id="map-canvas" data-placeId="<?= $this->config->place_id; ?>"></div>
                </div>
            <div class="contact-us__left">
                <ul class="tabs">
                    <li><a id="enquiry_tab" href='#enquiry'>Make an enquiry</a></li>
                    <li><a id="brochure_tab" href='#brochure'>Request a brochure</a></li>
                </ul>
                <div class="tab" id="enquiry">
                    <div class="contact-us__left__header">
                        <?= $contactUsEnquiryHeader; ?>
                    </div>
                    <form enctype="application/x-www-form-urlencoded" action="" method="post" id="enquiry_form">
                        <div class="tab__left field-wrap">
                            <?= $this->enquiryForm->enquiry_name ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $this->enquiryForm->enquiry_email ?>
                        </div>
                        <div class="tab__left field-wrap">
                            <?= $this->enquiryForm->enquiry_number ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $this->enquiryForm->enquiry_address ?>
                        </div>
                        <div class="tab__controls">
                            <div class="field-wrap">
                                <?= $this->enquiryForm->enquiry_message ?>
                            </div>
                            <?= $this->enquiryForm->enquiry_opt_in ?>
                            <label for="enquiry_opt_in">I would like to hear about the latest news and upcoming events</label>
                            <br />
                            <?= $this->enquiryForm->enquiry_send_brochure ?>
                            <label for="enquiry_send_brochure">I would like to receive a brochure through the post</label>
                            <?= $this->enquiryForm->enquiry_submit ?>
                        </div>
                    </form>
                </div>
                <div class="tab" id="brochure">
                    <form enctype="application/x-www-form-urlencoded" action="" method="post" id="brochure_form">
                        <div class="tab__left select-wrap">
                            <?= $this->brochureForm->care_home_options ?>
                        </div>
                        <div class="tab__right select-wrap">
                            <?= $this->brochureForm->delivery_method_options ?>
                        </div>
                        <div class="tab__left field-wrap">
                            <?= $this->brochureForm->brochure_name ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $this->brochureForm->brochure_email ?>
                        </div>
                        <div class="tab__left field-wrap">
                            <?= $this->brochureForm->brochure_number ?>
                        </div>
                        <div class="tab__right field-wrap">
                            <?= $this->brochureForm->brochure_address ?>
                        </div>
                        <div class="tab__controls">
                            <div class="field-wrap">
                                <?= $this->brochureForm->brochure_message ?>
                            </div>
                            <?= $this->brochureForm->brochure_opt_in ?>
                            <label for="brochure_opt_in">I would like to hear about the latest news and upcoming events</label>
                            <?= $this->brochureForm->brochure_submit ?>
                        </div>
                    </form>
                </div>
                <?= $this->inc(Document_Snippet::getByPath('/snippets/live-chat')); ?>
            </div>
        </div>
    </div>
</div>