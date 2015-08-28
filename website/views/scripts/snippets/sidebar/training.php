<?php
    $page = "training";
    $this->snippetEditModeStyles();
    $title = $this->input($page . "Title");
    $content = $this->textarea($page . "Content");
    $linkTarget = $this->textarea($page . "LinkTarget");
    $linkTitle = $this->textarea($page . "LinkTitle");
?>

<div class="sidebar__panel">
    <div class="sidebar__panel--training">
        <div class="sidebar__panel--training-image"></div>
        <div class="sidebar__panel--content">
            <h3>Staff<br />training</h3>
            <p>Lorem ipsum dolor sit amet, aperiam gubergren vim ei, ex usu imperdiet moderatius. Solet tation</p>
            <a href="/contact-us" class="sidebar__panel--button">Read More</a>
        </div>
    </div>
</div>