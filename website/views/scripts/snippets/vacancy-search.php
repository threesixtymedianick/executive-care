<?php
if ($this->editmode) {
    echo $this->snippetEditModeStyles();
}

$careHomes = $this->careHomeSelect();
$vacancy = $this->vacancySelect();

?>

<div class="careers__left__content__box--search">
    <div class="form-wrapper">
        <h5>Search by postcode:</h5>
        <form action="/vacancy/search" method="POST">
            <input type="text" name="postcode_search" id="postcode_search" placeholder="Enter postcode">
            <button class="search-submit" type="submit" role="button">Search</button>
        </form>
    </div>
    <div class="form-wrapper">
        <h5>Search by home:</h5>
        <form>
        <div class="rmv-arrow-ie9">
            <select name="home_search" id="home_search">
                <option value="">Select</option>
                <?php foreach($careHomes as $option) : ?>
                    <option value="<?= $option[0]; ?>"><?= $option[1]; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </form>
    </div>
    <div class="form-wrapper">
        <h5>Search by vacancy:</h5>
        <form>
            <div class="rmv-arrow-ie9">
            <select name="vacancy_search" id="vacancy_search">
                <option value="">Select</option>
                <?php foreach($vacancy as $option) : ?>
                    <option value="<?= $option[0]; ?>"><?= $option[1]; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </form>
    </div>
</div>
