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
                        <br clear="all" />
                        </div>
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
        </div>
    </div>
</div>
<script type="text/javascript">
    window.lpTag = window.lpTag || {};
    if (typeof window.lpTag._tagCount === 'undefined') {
        window.lpTag = {
            site: '12085730' || "",
            section: lpTag.section || "",
            autoStart: lpTag.autoStart === false ? false : true,
            ovr: lpTag.ovr || {},
            _v: '1.5.1',
            _tagCount: 1,
            protocol: location.protocol,
            events: {
                bind: function(app, ev, fn) {
                    lpTag.defer(function() {
                        lpTag.events.bind(app, ev, fn);
                    }, 0);
                },
                trigger: function(app, ev, json) {
                    lpTag.defer(function() {
                        lpTag.events.trigger(app, ev, json);
                    }, 1);
                }
            },
            defer: function(fn, fnType) {
                if (fnType == 0) {
                    this._defB = this._defB || [];
                    this._defB.push(fn);
                } else if (fnType == 1) {
                    this._defT = this._defT || [];
                    this._defT.push(fn);
                } else {
                    this._defL = this._defL || [];
                    this._defL.push(fn);
                }
            },
            load: function(src, chr, id) {
                var t = this;
                setTimeout(function() {
                    t._load(src, chr, id);
                }, 0);
            },
            _load: function(src, chr, id) {
                var url = src;
                if (!src) {
                    url = this.protocol + '//' + ((this.ovr && this.ovr.domain) ? this.ovr.domain : 'lptag.liveperson.net') + '/tag/tag.js?site=' + this.site;
                }
                var s = document.createElement('script');
                s.setAttribute('charset', chr ? chr : 'UTF-8');
                if (id) {
                    s.setAttribute('id', id);
                }
                s.setAttribute('src', url);
                document.getElementsByTagName('head').item(0).appendChild(s);
            },
            init: function() {
                this._timing = this._timing || {};
                this._timing.start = (new Date()).getTime();
                var that = this;
                if (window.attachEvent) {
                    window.attachEvent('onload', function() {
                        that._domReady('domReady');
                    });
                } else {
                    window.addEventListener('DOMContentLoaded', function() {
                        that._domReady('contReady');
                    }, false);
                    window.addEventListener('load', function() {
                        that._domReady('domReady');
                    }, false);
                } if (typeof(window._lptStop) == 'undefined') {
                    this.load();
                }
            },
            start: function() {
                this.autoStart = true;
            },
            _domReady: function(n) {
                if (!this.isDom) {
                    this.isDom = true;
                    this.events.trigger('LPT', 'DOM_READY', {
                        t: n
                    });
                }
                this._timing[n] = (new Date()).getTime();
            },
            vars: lpTag.vars || [],
            dbs: lpTag.dbs || [],
            ctn: lpTag.ctn || [],
            sdes: lpTag.sdes || [],
            ev: lpTag.ev || []
        };
        lpTag.init();
    } else {
        window.lpTag._tagCount += 1;
    }
</script>