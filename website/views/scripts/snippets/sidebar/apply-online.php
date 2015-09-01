<?php
    echo $this->snippetEditModeStyles();
    $title = $this->input("applyOnlineTitle");
?>

<div class="sidebar__buttons applyonline">
    <a href="/careers/apply" alt="Apply online now"><?= $title; ?></a>
</div>