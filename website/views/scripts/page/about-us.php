<?php
    $aboutUsInfoTab       = $this->wysiwyg("about_us_info");
    $aboutUsTrainingTab   = $this->wysiwyg("about_us_training");
    $headerImage          = $this->href("about_us_header");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="about-us__header" style="background-image: url('<?= $headerImage->getFullPath(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="about-us">
            <div class="about-us__left">
                <ul class="tabs">
                    <li><a id="info_tab" href='#info'>About Us</a></li>
                    <li><a id="training_tab" href='#training'>Staff Training</a></li>
                </ul>
                <div class="tab" id="info">
                    <?= $aboutUsInfoTab ?>
                </div>
                <div class="tab" id="training">
                    <?= $aboutUsTrainingTab ?>
                </div>
            </div>
            <div class="about-us__right">
                <div class="about-us__right__boxes find-a-home">
                    <div class="about-us__right__boxes__title">
                        Find a<br />Home
                    </div>
                        <div class="about-us__right__boxes__content">
                            Use our interactive search tool to find an Executive Care home near you. Enter your postcode, town or city below:
                        </div>
                        <input type="search" class="about-us__right__boxes__button" name="search" placeholder="Search" />
                    </div>
                <div class="about-us__right__boxes contact-us">
                    <div class="about-us__right__boxes__title">
                        Contact<br />us
                    </div>
                    <div class="about-us__right__boxes__content">
                        Lorem ipsum dolor sit amet, aperiam gubergren vim ei, ex usu imperdiet moderatius. Solet tation
                    </div>
                    <div class="about-us__right__boxes__button">
                        <a href="/contact-us">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
