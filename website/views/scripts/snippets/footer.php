<div class="site-footer__block">
  <div>© 2015 Executive Care Group</div>
  <div>
    <?= $this->inc(Document_Snippet::getByPath('/snippets/address')); ?>
  </div>
</div>
<div class="site-footer__block">
  <div>
      Telephone: <?= $this->config->telephone; ?>
  </div>

  <div>
      Fax: <?= $this->config->fax; ?>
  </div>

  <div>
      Email: <a href="mailto:<?= $this->config->infoemail; ?>"><?= $this->config->infoemail; ?></a>
  </div>
</div>
<div class="site-footer__block">
  <div>
    <a href="<?= $this->url(array("document" => Document::getById(1)), "default", true); ?>">Home</a>
  </div>
    <div>
      <a href="<?= $this->url(array("document" => Document::getById(13)), "default", true); ?>">Care Home Jobs</a>
    </div>
    <div>
      <a href="<?= $this->url(array("document" => Document::getById(7)), "default", true); ?>">Care Homes</a>
    </div>
</div>
