<?php if ($this->editmode) :
    echo $this->snippetEditModeStyles();
endif; ?>

<?php
$title = $this->input("title");
$content = $this->textarea("content");
$image = $this->image('sidebar_image');
?>

<?php if ($this->editmode) : ?>
    <div style="width: 410px;">
    <p>Add the sidebar image below</p>
    <?= $image; ?>
<?php endif; ?>

    <div class="sidebar__panel">
        <div class="sidebar__panel--find-a-home">
            <div class="sidebar__panel--find-a-home-image"
                 style="background: url('<?= $image->getThumbnail('sidebar_image'); ?>') no-repeat top center;"></div>
            <div class="sidebar__panel--content heightMatch">
                <h3><?= $title; ?></h3>

                <p><?= $content; ?></p>
                <form action="/our-homes/search" method="get">
                    <input type="search" class="sidebar__panel--button mleft" name="query" placeholder="Search"/>
                    <button class="search-submit" type="submit" role="button"/>
                </form>
            </div>
        </div>
    </div>

<?php if ($this->editmode) : ?>
    </div>
<?php endif; ?>