<?php
    echo $this->snippetEditModeStyles();
    $title = $this->input("title");
    $content = $this->textarea("content");
?>

<div class="sidebar__panel">
    <div class="sidebar__panel--find-a-home">
        <div class="sidebar__panel--find-a-home-image"></div>
        <div class="sidebar__panel--content">
            <h3><?= $title; ?>Test Title</h3>
            <p><?= $content; ?>Lorem ipsum dolor sit amet, consectetur adipiscing el</p>
            <input type="search" class="sidebar__panel--button" name="search" placeholder="Search" />
        </div>
    </div>
</div>