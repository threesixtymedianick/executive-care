<?php
    $title                = $this->input('title', [ 'width' => 250 ]);
    $ourCareInfoBox       = $this->wysiwyg("our-care_info");
    $headerImage          = $this->href("our-care_header");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="our-care__header" style="background-image: url('<?= $headerImage->getFullPath(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="our-care">
            <div class="our-care__left">
                <div class="our-care__left__content">
                    <div class="our-care__left__content__title">
                        <?= $title ?>
                    </div>
                    <div class="our-care__left__content__box">
                        <?= $ourCareInfoBox ?>
                    </div>
                </div>
                <?php while($this->block("contentblock")->loop()) : ?>
                    <div class="our-care__left__sliding sliding_content">
                        <div class="our-care__left__sliding__title">
                            <?= $this->input("title"); ?>
                            <?php if (!$this->editmode) : ?>
                                <div class="our-care__left__sliding__title__show-hide">
                                    <a href="#" class="show_hide">Show More +</a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="our-care__left__sliding__content <?= $this->editmode ? "" : "slide"; ?>">
                            <?= $this->wysiwyg("content") ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="our-care__right">
                <div class="our-care__right__boxes find-a-home">
                    <div class="our-care__right__boxes__title">
                        Find a<br />Home
                    </div>
                    <div class="our-care__right__boxes__content">
                        Use our interactive search tool to find an Executive Care home near you. Enter your postcode, town or city below:
                    </div>
                    <input type="search" class="our-care__right__boxes__button" name="search" placeholder="Search" />
                </div>
                <div class="our-care__right__boxes open-days">
                    <div class="our-care__right__boxes__title">
                        Upcoming<br />Open Days
                    </div>
                    <div class="our-care__right__boxes__content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique rem, qui consectetur perspiciatis, mollitia voluptate.
                    </div>
                    <a href="#" class="our-care__right__boxes__button">Read More</a>
                </div>
                <div class="our-care__right__boxes book-a-visit">
                    <div class="our-care__right__boxes__title full-width-panel">
                        Book a visit
                    </div>
                    <div class="our-care__right__boxes__content full-width-panel">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure illo, officiis, explicabo mollitia nemo natus, unde suscipit neque non distinctio quas, quidem numquam laborum nisi et reprehenderit facilis reiciendis officia. Consectetur adipisicing elit enim fuga illo officiis aliquam molestiae accusantium.
                    </div>
                    <a href="#" class="our-care__right__boxes__button">Read More</a>
                </div>
                <div class="our-care__right__boxes recommendation">
                    <div class="recommendations-logo">
                        <img src="website/static/images/home/carehome-co-uk.png" alt="Carehome">
                    </div>
                    <div class="recommendations-logo-copy">
                        Latest recommendations for homes in our group
                    </div>
                    <div class="our-care__right__boxes__title full-width-panel">
                        Recommendation for Crystal Court
                    </div>
                    <div class="our-care__right__boxes__content full-width-panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit ipsum praesentium earum dolorum fugiat ut similique facilis quod.<br >
                        <a href="#">continue reading</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
