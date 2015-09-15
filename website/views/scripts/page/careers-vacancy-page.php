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
                        Activities co-ordinator
                    </div>
                    <div class="careers__left__content__box">
                        <div class="careers__left__content__box--row">
                            <div class="details-title">
                                Home:
                            </div>
                            <div class="details">
                                Crystal Court Care Home
                            </div>
                        </div>
                        <div class="careers__left__content__box--row">
                            <div class="details-title">
                                Hours:
                            </div>
                            <div class="details">
                                25 p/w
                            </div>
                        </div>
                        <div class="careers__left__content__box--row">
                            <div class="details-title">
                                Reporting to:
                            </div>
                            <div class="details">
                                Home Manager
                            </div>
                        </div>
                        <div class="careers__left__content__box--row">
                            <div class="details-title">
                                Purpose:
                            </div>
                            <div class="details">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque tempora repellendus delectus, ab ea laborum maiores distinctio quod accusamus hic.
                            </div>
                        </div>
                        <h2>Skills, knowledge and qualifications</h2>
                        <h3>Required:</h3>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas sint, dolor! Natus omnis dicta incidunt quam magnam quae quisquam deserunt.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        </ul>
                        <h3>Desired:</h3>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        </ul>
                        <div class="careers__left__content__box--responsibilities">
                            <h2>Main responsibilities</h2>
                            <h4>Activities:</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <h4>Communication:</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <h4>Human Resources:</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <h4>Marketing:</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ut deserunt pariatur aliquam ex non, assumenda mollitia placeat porro esse a consequatur laborum sequi.</p>
                        </div>
                    </div>
                    <div class="careers__left__content--button">
                        <a href="/careers/apply" alt="Apply online now">Apply Online</a>
                    </div>
                    <div class="careers__left__content--button">
                        <a href="<?= $applicationFormPDF->getFullPath() ?>" alt="Download application form">Download Application</a>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <?= $this->inc(Document_Snippet::getByPath('/snippets/volunteer')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/training')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/apply-online')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/download-form')); ?>

                <?= $this->inc(Document_Snippet::getByPath('/snippets/job-alerts')); ?>
            </div>
        </div>
    </div>
</div>