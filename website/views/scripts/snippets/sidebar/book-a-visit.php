<?php
    echo $this->snippetEditModeStyles();
    $title = $this->input("title");
    $content = $this->textarea("content");
    $linkTarget = $this->textarea("linkTarget");
    $linkTitle = $this->textarea("linkTitle");
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