<?php
    echo $this->snippetEditModeStyles();
    $title = $this->input("title");
    $content = $this->textarea("content");
    $linkTarget = $this->textarea("linkTarget");
    $linkTitle = $this->textarea("linkTitle");
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