<?php
    echo $this->snippetEditModeStyles();
    $title = $this->input("title");
    $content = $this->textarea("content");
?>

<div class="sidebar__panel">
    <div class="sidebar__panel--find-a-home">
        <div class="sidebar__panel--find-a-home-image"></div>
        <div class="sidebar__panel--content full-width-panel">
            <h3><?= $title; ?></h3>

            <p><?= $content; ?></p>

            <input type="search" class="sidebar__panel--button" name="search" placeholder="Search" />
        </div>
    </div>
</div>