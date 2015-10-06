<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
    $title = $this->input("title");
    $content = $this->textarea("content");
?>

<div class="sidebar__panel">
    <div class="sidebar__panel--find-a-home">
        <div class="sidebar__panel--find-a-home-image"></div>
        <div class="sidebar__panel--content heightMatch">
            <h3><?= $title; ?></h3>
            <p><?= $content; ?></p>
            <input type="search" class="sidebar__panel--button mleft" name="search" placeholder="Search" />
            <button class="search-submit" type="submit" role="button">
                                    Search
                                </button>
        </div>
    </div>
</div>
