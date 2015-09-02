<?php 
    $applicationFormPDF = Asset::getById(25);
    $headerImage          = $this->href("careers_header");
?>

<?php if ($this->editmode): ?>
    <p>Place main header image here</p>
    <?= $headerImage ?>
<?php endif; ?>


<div class="careers__header" style="background-image: url('<?= $headerImage->getFullPath(); ?>');">-</div>
<div class="container">
    <div class="container__inner">
        <div class="careers">
            <div class="careers__left">
                <div class="careers__left__content">
                    <div class="careers__left__content__title">
                        Jobs in our care homes
                    </div>
                    <div class="careers__left__content__box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, repellendus blanditiis saepe laboriosam reprehenderit pariatur, quod voluptates voluptas perferendis, corrupti fugit suscipit odit maxime quasi. Consequatur culpa nobis laboriosam minus.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, repellendus blanditiis saepe laboriosam reprehenderit pariatur, quod voluptates voluptas perferendis, corrupti fugit suscipit odit maxime quasi. Consequatur culpa nobis laboriosam minus.</p>
                        <div class="careers__left__content__box--row">
                            <div class="form-wrapper">
                                <h5>Search by postcode:</h5>
                                <form>
                                    <input type="text" name="postcode_search" id="postcode_search" placeholder="Enter postcode">
                                    <button class="search-submit" type="submit" role="button">Search</button>
                                </form>
                            </div>
                            <div class="form-wrapper">
                                <h5>Search by home:</h5>
                                <form>
                                    <select name="home_search" id="home_search">
                                        <option value="">Select</option>
                                        <option value="0">Abbeyvale Care Centre, Hartlepool</option>
                                        <option value="1">Ashwood Court, Sunderland</option>
                                    </select>
                                </form>
                            </div>
                            <div class="form-wrapper">
                                <h5>Search by vacancy:</h5>
                                <form>
                                    <select name="vacancy_search" id="vacancy_search">
                                        <option value="">Select</option>
                                        <option value="0">Abbeyvale Care Centre, Hartlepool</option>
                                        <option value="1">Ashwood Court, Sunderland</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="careers__left__content__title results">
                        Results:
                    </div>
                    <div class="careers__left__content__box">
                        <div class="careers__left__content__box--row">
                            <div class="careers__left__content__box--result">
                                <p>
                                    Cook<br />
                                    Craigend Gardens<br />
                                    30 hours, days - Permanent<br />
                                    Closing date: 00/00/00
                                </p>
                            </div>
                            <div class="careers__left__content__box--result">
                                <p>
                                    Cook<br />
                                    Craigend Gardens<br />
                                    30 hours, days - Permanent<br />
                                    Closing date: 00/00/00
                                </p>
                            </div>
                        </div>
                        <div class="careers__left__content__box--row">
                            <div class="careers__left__content__box--result">
                                <p>
                                    Cook<br />
                                    Craigend Gardens<br />
                                    30 hours, days - Permanent<br />
                                    Closing date: 00/00/00
                                </p>
                            </div>
                            <div class="careers__left__content__box--result">
                                <p>
                                    Cook<br />
                                    Craigend Gardens<br />
                                    30 hours, days - Permanent<br />
                                    Closing date: 00/00/00
                                </p>
                            </div>
                        </div>
                        <div class="careers__left__content__box--row-pagination">
                            <ul>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5...</a></li>
                                <li><a href="#">16</a></li>
                                <li><a href="#">></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <div class="sidebar__panel">
                    <div class="sidebar__panel--volunteer">
                        <div class="sidebar__panel--volunteer-image"></div>
                        <div class="sidebar__panel--content">
                            <h3>Volunteer<br />programme</h3>
                            <p>Lorem ipsum dolor sit amet, aperiam gubergren vim ei, ex usu imperdiet moderatius. Solet tation</p>
                            <a href="/contact-us" class="sidebar__panel--button">Read More</a>
                        </div>
                    </div>
                </div> 
                <div class="sidebar__panel">
                    <div class="sidebar__panel--training">
                        <div class="sidebar__panel--training-image"></div>
                        <div class="sidebar__panel--content">
                            <h3>Staff<br />training</h3>
                            <p>Lorem ipsum dolor sit amet, aperiam gubergren vim ei, ex usu imperdiet moderatius. Solet tation</p>
                            <a href="/contact-us" class="sidebar__panel--button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="sidebar__buttons applyonline">
                    <a href="/careers/apply" alt="Apply online now">Apply Online</a>
                </div>
                <div class="sidebar__buttons download">
                    <a href="<?= $applicationFormPDF->getFullPath() ?>" alt="Download application form">Download form</a>
                </div>
                <div class="sidebar__job-alerts">
                    <h5>Sign up for job alerts</h5>
                    <form>
                        <input type="text" name="email" id="email" placeholder="Your email">
                        <input type="text" name="name" id="name" placeholder="Your name">
                        <select name="vacancy_search" id="vacancy_search">
                            <option value="">Location</option>
                            <option value="0">Lorem ipsum dolor sit amet</option>
                        </select>
                        <button class="signup-btn" type="submit" role="button">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>