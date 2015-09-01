<?php
    $page = "workForUs";
    echo $this->snippetEditModeStyles();
    $title = $this->input($page . "Title");
    $content = $this->textarea($page . "Content");
    $linkTarget = $this->textarea($page . "LinkTarget");
    $linkTitle = $this->textarea($page . "LinkTitle");
?>

<div class="home__panel home__panel--split home__panel--purple home__work-for-us">
    <h3 class="home__panel-header"><?= $this->textarea("work-for-us"); ?></h3>
    <p><?= $this->textarea("work-for-us-description"); ?></p>
    <a class="home__button home__button--white" href="#">Read more</a>
</div>