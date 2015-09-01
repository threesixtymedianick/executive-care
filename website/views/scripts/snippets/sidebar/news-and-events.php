<?php
    echo $this->snippetEditModeStyles();
    $title = $this->input("title");
    $content = $this->textarea("content");
    $linkTarget = $this->textarea("linkTarget");
    $linkTitle = $this->textarea("linkTitle");
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