<?php
    $page = "findAHome";
    $this->snippetEditModeStyles();
    $title = $this->input($page . "Title");
    $content = $this->textarea($page . "Content");
    $linkTarget = $this->textarea($page . "LinkTarget");
    $linkTitle = $this->textarea($page . "LinkTitle");
?>

<div class="our-care__right__boxes find-a-home">
    <div class="our-care__right__boxes__title">
        Find a<br />Home
    </div>
    <div class="our-care__right__boxes__content">
        Use our interactive search tool to find an Executive Care home near you. Enter your postcode, town or city below:
    </div>
    <input type="search" class="our-care__right__boxes__button" name="search" placeholder="Search" />
</div>