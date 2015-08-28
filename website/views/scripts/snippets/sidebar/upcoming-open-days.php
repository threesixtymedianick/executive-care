<?php
    $page = "upcomingOpenDays";
    $this->snippetEditModeStyles();
    $title = $this->input($page . "Title");
    $content = $this->textarea($page . "Content");
    $linkTarget = $this->textarea($page . "LinkTarget");
    $linkTitle = $this->textarea($page . "LinkTitle");
?>

<div class="sidebar__panel">
    <div class="sidebar__panel--open-days">
        <div class="sidebar__panel--open-days-image"></div>
        <div class="sidebar__panel--content">
            <h3>Upcoming<br />Open Days</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique rem, qui consectetur perspiciatis, mollitia voluptate.</p>
            <a href="#" class="sidebar__panel--button">Read More</a>
        </div>
    </div>
</div>