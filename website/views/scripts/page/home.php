<div class="home">
  <div class="home__left">
    <div class="home__panel home__welcome">
      <h1><?= $this->input("headline"); ?></h1>
      <h2>Find out about us</h2>
    </div>
    <div class="home__panels">
      <div class="home__panel home__panel--split home__our-care-explained">
        <h3 class="home__panel-header"><?= $this->textarea("our-care-explained"); ?></h3>
        <p><?= $this->textarea("our-care-explained-description"); ?></p>
        <a class="home__button home__button--white" href="#">Read more</a>
      </div>
      <div class="home__panel home__panel--blue home__recommendations">
        <div class="home__recommendations-header">
          <div class="home__recommendations-header-left">
            <img src="website/static/images/home/carehome-co-uk.png" alt="carehome.co.uk" />
          </div>
          <div class="home__recommendations-header-right">
            Latest recommendations for homes in our group
          </div>
        </div>
        <div class="home__recommendations-body">
          <h4 class="home__recommendations-home-name">
            <?= $this->input("recommendation-header"); ?>
          </h4>
          <div class="home__recommendations-meta">
            <?= $this->input("recommendation-meta"); ?>
          </div>
          <div class="home__recommendations-content">
            <?= $this->wysiwyg("recommendation-content"); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="home__right">
    <div class="home__panel home__panel--split home__panel--green home__find-a-home">
      <h3 class="home__panel-header"><?= $this->textarea("find-a-home"); ?></h3>
      <p><?= $this->textarea("find-a-home-description"); ?></p>

      <form action="" class="home__find-a-home-form">
        <input class="home__input" type="text" name="find-a-home" placeholder="Search">
        <input type="submit" class="home__search">
      </form>
    </div>
    <div class="home__panel home__panel--split home__news">
      <h3 class="home__panel-header"><?= $this->textarea("news-and-events"); ?></h3>
      <p><?= $this->textarea("news-and-events-description"); ?></p>
      <a class="home__button home__button--white" href="#">Read more</a>
    </div>
    <div class="home__panel home__panel--split home__panel--purple home__work-for-us">
      <h3 class="home__panel-header"><?= $this->textarea("work-for-us"); ?></h3>
      <p><?= $this->textarea("work-for-us-description"); ?></p>
      <a class="home__button home__button--white" href="#">Read more</a>
    </div>
  </div>
</div>
