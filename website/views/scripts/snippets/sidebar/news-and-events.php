<?php
    $page = "newsAndEvents";
    echo $this->snippetEditModeStyles();
    $title = $this->input($page . "Title");
    $content = $this->textarea($page . "Content");
    $linkTarget = $this->textarea($page . "LinkTarget");
    $linkTitle = $this->textarea($page . "LinkTitle");
?>

<div class="sidebar__panel">
    <div class="sidebar__panel--news-events">
        <div class="sidebar__panel--news-events-image"></div>
        <div class="sidebar__panel--content">
            <h3>News &amp;<br />events</h3>
            <p>Lorem ipsum dolor sit amet, aperiam gubergren vim ei, ex usu imperdiet moderatius. Solet tation</p>
            <a href="/contact-us" class="sidebar__panel--button">Read More</a>
        </div>
    </div>
</div>