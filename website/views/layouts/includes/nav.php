<?php
$navStartNode = $this->document->getProperty("navigationRoot");
if(!$navStartNode instanceof Document\Page) {
    if(Site::isSiteRequest()) {
        $site = Site::getCurrentSite();
        $navStartNode = $site->getRootDocument();
    } else {
        $navStartNode = Document::getById(1);
    }
}
?>
<li class="home">
    <a href="<?= $this->url(array("document" => Document::getById(1)), "default", true); ?>">
      <img src="/website/static/images/buttons/icons/home-icon.png">
    </a>
</li>

<div class="show-menu">
  <img class="mob-menu" src="/website/static/images/buttons/icons/burger-icon.png">
</div>
<ul class="site-navigation__main-navigation">
  
  <?php $mainNavigation = $this->pimcoreNavigation()->getNavigation($this->document, $navStartNode); ?>
  <?php foreach ($mainNavigation as $page) { ?>
      <?php if (!$page->isVisible() || !$this->navigation()->accept($page)) { continue; } ?>
      <?php $hasChildren = $page->hasPages(); ?>
          <li>
              <a href="<?php echo $page->getHref() ?>">
                  <?php echo $this->translate($page->getLabel()) ?>
              </a>
              <?php if ($hasChildren) { ?>
                <ul class="inner_links">
                    <?php foreach ($page->getPages() as $child) { ?>
                        <?php if(!$child->isVisible() || !$this->navigation()->accept($child)) { continue; } ?>
                        <li>
                            <a href="<?php echo $child->getHref() ?>">
                                <?php echo $this->translate($child->getLabel()) ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
              <?php } ?>
          </li>
      <?php } ?>
</ul>
