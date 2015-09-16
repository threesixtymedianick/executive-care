<?php $item = $this->item; ?>
<div class="careers__left__content__box--row">
    <a href="/vacancy/detail/<?= $item->getKey() ?>">
        <div class="careers__left__content__box--result">
            <p>
                <?= $item->getRoleTitle(); ?><br/>
                <?php if (isset($item->getCareHomes()[0])) : ?>
                    <?= $item->getCareHomes()[0]->getTitle(); ?> <br/>
                <?php endif; ?>
                <?= $item->getContractHours(); ?>
                hours, <?= $item->getContractShift(); ?>
                - <?= $item->getContractType(); ?><br/>
                Closing date: <?= date("j F Y", strtotime($item->getClosingDate())); ?>
            </p>
        </div>
    </a>
</div>