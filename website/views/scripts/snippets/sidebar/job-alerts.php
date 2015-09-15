<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
    $title = $this->input("title");
    $content = $this->textarea("content");
?>

<div class="sidebar__job-alerts">
    <h5>Sign up for job alerts</h5>
    <form action="//execcaregroup.us6.list-manage.com/subscribe/post?u=4540541692bd0d70b7d94231e&amp;id=0fa2f6e5ba" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Your email">

        <input type="text" value="" name="NAME" class="" id="mce-NAME" placeholder="Your name">

        <select name="MMERGE3" class="" id="mce-MMERGE3">
            <option value="">Location</option>
            <option value="Scotland">Scotland</option>
            <option value="North East">North East</option>
            <option value="North West">North West</option>
            <option value="Yorkshire">Yorkshire</option>
            <option value="West Midlands">West Midlands</option>
            <option value="East Midlands">East Midlands</option>
            <option value="East England">East England</option>
            <option value="Wales">Wales</option>
            <option value="London">London</option>
            <option value="South East">South East</option>
            <option value="South West">South West</option>
        </select>
        <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;"><input type="text" name="b_4540541692bd0d70b7d94231e_0fa2f6e5ba" tabindex="-1" value=""></div>
        <div class="clear"><button class="signup-btn" type="submit" role="button" id="mc-embedded-subscribe">Sign up</button></div>
    </form>
</div>