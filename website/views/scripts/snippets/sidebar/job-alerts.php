<?php
    echo $this->snippetEditModeStyles();
    $title = $this->input("title");
    $content = $this->textarea("content");
    $linkTarget = $this->textarea("linkTarget");
    $linkTitle = $this->textarea("linkTitle");
?>

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