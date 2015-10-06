<?php
$ourHomesDescription = $this->wysiwyg("our_homes_description");
$headerImage = $this->href("our_homes_header");
$results = $this->results;
$distances = $this->distances;
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>

<div class="our-homes__header" style="background-image: url('<?= $headerImage->getFullPath(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="our-homes">
            <div class="our-homes__left">
                <div class="our-homes__left__title">
                    Our Homes
                </div>
                <div class="our-homes__left__content">
                    <div class="our-homes__left__content__box">
                        <p><?= $ourHomesDescription ?></p>

                        <div class="our-homes__left--search">
                            <form action="/our-homes/search" method="POST">
                                <input type="search" name="query" placeholder="Search by name, town or postcode"/>
                                <button class="search-submit" type="submit" role="button">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>

                    <?php if (count($results) === 0) : ?>
                        No results found
                    <?php endif; ?>

                    <?php foreach ($results as $i => $home) : ?>
                        <div class="our-homes__left__content__homes-box">
                            <?php if ($home->getListingImage()) : ?>
                                <?php $image = $home->getListingImage()->getFullPath(); ?>
                            <?php else : ?>
                                <?php $image = "/website/static/images/home/find-a-home.png"; ?>
                            <?php endif; ?>
                            <div class="our-homes__left__content__homes-box--image"
                                 style="background-image: url('<?= $image; ?>');"></div>
                            <div class="our-homes__left__content__homes-box__info">
                                <div class="our-homes__left__content__homes-box__info__title">
                                    <?= $home->getTitle() ?>
                                </div>
                                <div class="our-homes__left__content__homes-box__info__distance">
                                    <?= round($home->distance, 2); ?> Miles away<br/>
                                </div>
                                <div class="our-homes__left__content__homes-box__info__address">
                                    <?= $home->getAddress() ?><br/>
                                    <?= $home->getPostcode() ?>
                                </div>
                                <div class="our-homes__left__content__homes-box__info__find-out-more">
                                    <a href="#">Find out more</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- pagination start -->
                    <?= $this->paginationControl($this->results, 'Sliding', 'includes/paging.php', [
                       'urlprefix'         => $this->document->getFullPath() . '?page=',
                       'appendQueryString' => true
                    ]); ?>
                    <!-- pagination end -->
                </div>
            </div>
            <div class="sidebar">
                <div class="sidebar__panel">
                    <div class="sidebar__panel--our-homes-find-a-home">
                        <div class="sidebar__panel--our-homes-find-a-home-title">
                            <h2>Find a Home</h2>
                        </div>
                        <div class="map" id="map">
                            <div class="arrow"></div>
                            <a href="#">View on google</a>
                        </div>
                        <div class="sidebar__panel--our-homes-find-a-home-details">
                            <div class="sidebar__panel--our-homes-find-a-home-image"></div>
                            <div class="sidebar__panel--content">
                                <h3>Fernedale Care Home</h3>

                                <p>Use our interactive search tool to find an Executive Care home near you. Enter your
                                    postcode, town or city below:</p>
                                <a href="/contact-us" class="sidebar__panel--button mleft">Find out more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/contact-us')); ?>

            </div>
        </div>
    </div>
</div>
