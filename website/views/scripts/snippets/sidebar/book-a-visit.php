<?php
    $page = "bookAVisit";
    $this->snippetEditModeStyles();
    $title = $this->input($page . "Title");
    $content = $this->textarea($page . "Content");
    $linkTarget = $this->textarea($page . "LinkTarget");
    $linkTitle = $this->textarea($page . "LinkTitle");
?>

<div class="sidebar__panel">
    <div class="sidebar__panel--visit">
        <div class="sidebar__panel--content full-width-panel">
            <h3><?= $title; ?></h3>
            <p><?= $content; ?></p>
            <a href="<?= $linkTarget; ?>" class="sidebar__panel--button right"><?= $linkTitle; ?></a>
        </div>
    </div>
</div>