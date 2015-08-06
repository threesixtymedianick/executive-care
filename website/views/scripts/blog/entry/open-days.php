<?php $this->layout()->setLayout('layout') ?>

<div class="container">
    <div class="container__inner">
        <div class="blog">
            <div class="blog__left">
                <h1>
                    <?= $this->input('page-header') ?>
                </h1>

                <?php foreach ($this->paginator as $entry): ?>
                    <?php /* @var $entry Blog_Entry */ ?>

                    <h2>
                        <a href="<?= $this->url(array(
                            'key' => $entry->getUrlPath()
                        ), 'blog-show', false, false) ?>"
                            ><?= $entry->getTitle() ?></a>
                    </h2>
                    <small><?= $entry->getDate()->toString('FFFFF'); ?></small>

                    <div class="blog__content">
                        <p>
                            <?= (trim($entry->getSummary()))
                                ? $entry->getSummary()
                                : Website_Tool_Text::cutStringRespectingWhitespace(trim(strip_tags($entry->getContent())), 200) ?>
                        </p>
                    </div>

                <?php endforeach; ?>

                <div class="blog__pagination"><?= $this->paginator ?></div>
            </div>
        </div>
    </div>
</div>