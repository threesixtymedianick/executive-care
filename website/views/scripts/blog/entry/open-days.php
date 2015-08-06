<?php $this->layout()->setLayout('layout') ?>
<?php DEFINE("OPEN_DAYS_ID", 8); ?>
<div class="container">
    <div class="container__inner">
        <div class="blog">
            <div class="blog__left">
                <div class="blog__content">
                    <h1>
                        <?= $this->input('page-header') ?>
                    </h1>
                    <?php foreach ($this->paginator as $entry): ?>
                        <?php /* @var $entry Blog_Entry */ ?>
                        <?php if ($entry->getCategories()[0]->getId() === OPEN_DAYS_ID): ?>
                            <div class="blog__item">
                                <h2>
                                    <a href="<?= $this->url(array(
                                        'key' => $entry->getUrlPath()
                                    ), 'blog-show', false, false) ?>"
                                        ><?= $entry->getTitle() ?></a>
                                </h2>
                                <small><?= $entry->getDate()->toString('FFFFF'); ?></small>
                                <p>
                                    <?= (trim($entry->getSummary()))
                                        ? $entry->getSummary()
                                        : Website_Tool_Text::cutStringRespectingWhitespace(trim(strip_tags($entry->getContent())), 200) ?>

                                    <?php if ($entry->getBlogImage() !== null): ?>
                                        <img class="blog__image" src="<?= $entry->getBlogImage()->getFullPath(); ?>"/>
                                    <?php endif; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="blog__pagination"><?= $this->paginator ?></div>
                </div>
            </div>
        </div>
    </div>
</div>