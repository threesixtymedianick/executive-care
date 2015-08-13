<?php $asset = Asset::getById(25); ?>
<div class="container">
    <div class="container__inner">
        <div class="careers">
            <div class="careers__left">
                Left turn, Clyde.
            </div>
            <div class="careers__right">
                <div class="careers__right__applyonline">
                    <a href="/careers/apply" alt="Apply online now">Apply Online</a>
                </div>

                <div class="careers__right__download">
                    <a href="<?= $asset->getFullPath() ?>" alt="Download application form">Download form</a>
                </div>
            </div>
        </div>
    </div>
</div>
