<?php
    $page = "contactUs";
    echo $this->snippetEditModeStyles();
    $title = $this->input($page . "Title");
    $content = $this->textarea($page . "Content");
    $linkTarget = $this->textarea($page . "LinkTarget");
    $linkTitle = $this->textarea($page . "LinkTitle");
?>

<div class="our-homes__right__boxes contact-us">
    <div class="our-homes__right__boxes__title">
        Contact<br />us
    </div>
    <div class="our-homes__right__boxes__content">
        Lorem ipsum dolor sit amet, aperiam gubergren vim ei, ex usu imperdiet moderatius. Solet tation
    </div>
    <div class="our-homes__right__boxes__button">
        <a href="/contact-us">Read More</a>
    </div>
</div>