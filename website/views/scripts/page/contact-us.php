<div class="contact-us">
    <div class="contact-us__left">
        <ul class="tabs">
            <li><a id="enquiry_tab" href='#enquiry'>Make an enquiry</a></li>
            <li><a id="brochure_tab" href='#brochure'>Request a brochure</a></li>
        </ul>
        <div class="tab" id="enquiry">
            <form enctype="application/x-www-form-urlencoded" action="" method="post">
                <div class="tab__left">
                    <?= $this->enquiryForm->name ?>
                    <?= $this->enquiryForm->number ?>
                </div>
                <div class="tab__right">
                    <?= $this->enquiryForm->email ?>
                    <?= $this->enquiryForm->address ?>
                </div>
                <div class="tab__controls">
                    <?= $this->enquiryForm->message ?>
                    <?= $this->enquiryForm->opt_in ?>
                    <label for="opt_in">I would like to hear about the latest news and upcoming events</label>
                    <?= $this->enquiryForm->submit ?>
                </div>
            </form>
        </div>
        <div class="tab" id="brochure">
            <form enctype="application/x-www-form-urlencoded" action="" method="post">
                <div class="tab__left">
                    <?= $this->brochureForm->care_home ?>
                    <?= $this->brochureForm->name ?>
                    <?= $this->brochureForm->number ?>
                </div>
                <div class="tab__right">
                    <?= $this->brochureForm->delivery_method ?>
                    <?= $this->brochureForm->email ?>
                    <?= $this->brochureForm->address ?>
                </div>
                <div class="tab__controls">
                    <?= $this->brochureForm->message ?>
                    <?= $this->brochureForm->opt_in ?>
                    <label for="opt_in">I would like to hear about the latest news and upcoming events</label>
                    <?= $this->brochureForm->submit ?>
                </div>
            </form>
        </div>
    </div>

    <div class="contact-us__right">
        <div class="contact-us__address">
            <div class="contact-us__address__title">
                Crystal Court Care Home
            </div>
            <div class="contact-us__address__address">
                Pannal Green<br />Pannal<br />Harrogate<br />HG3 1LH
            </div>
            <div class="contact-us__address__enquiries">
            <div class="contact-us__address__enquiries__left">
                Enquiries:
            </div>
            <div class="contact-us__address__enquiries__right">
                01423 859 859<br />
                <span id="opening_times">(Mon - Fri 8:30am - 5:00pm)</span>
            </div>
            <br clear="all" />
            </div>
            <div class="contact-us__address__telephone">
                Tel: 01423 810 627
            </div>
        </div>
        <iframe
          width="100%"
          height="275"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAhZDrFac9-J2GF1Of27sv4W-YrfzZHna4
            &q=Crystal+Court,Harrogate,UK" allowfullscreen>
        </iframe>
    </div>

    <br clear="all" />

    LIVE CHAT HERE
</div>
