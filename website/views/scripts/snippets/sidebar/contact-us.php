<?php
    echo $this->snippetEditModeStyles();
    $title = $this->input("title");
    $content = $this->textarea("content");
    $linkTarget = $this->textarea("linkTarget");
    $linkTitle = $this->textarea("linkTitle");
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