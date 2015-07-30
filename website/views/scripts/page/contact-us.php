<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
            // Wait until the DOM has loaded before querying the document
            $(document).ready(function(){
                $('ul.tabs').each(function(){
                    // For each set of tabs, we want to keep track of
                    // which tab is active and it's associated content
                    var $active, $content, $links = $(this).find('a');

                    // If the location.hash matches one of the links, use that as the active tab.
                    // If no match is found, use the first link as the initial active tab.
                    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                    $active.addClass('active');

                    $content = $($active[0].hash);

                    // Hide the remaining content
                    $links.not($active).each(function () {
                        $(this.hash).hide();
                    });

                    // Bind the click event handler
                    $(this).on('click', 'a', function(e){
                        // Make the old tab inactive.
                        $active.removeClass('active');
                        $content.hide();

                        // Update the variables with the new link and content
                        $active = $(this);
                        $content = $(this.hash);

                        // Make the tab active.
                        $active.addClass('active');
                        $content.show();

                        // Prevent the anchor's default click action
                        e.preventDefault();
                    });
                });
            });
        </script>
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

    <br clear="all" />

    LIVE CHAT HERE
</div>
