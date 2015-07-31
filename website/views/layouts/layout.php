<!DOCTYPE html>
<html>
    <?php require('includes/head.php'); ?>

    <body>
        <header class="site-header">
          <div class="container">
            <div class="site-header__logo">
              <img src="website/static/images/executive-care-logo.png" alt="Executive Care" />
            </div>
            <div class="site-header__contact">
              <div class="site-header__contact-header">
                Contact Us
              </div>
              <div class="site-header__contact-details">
                <div class="site-header__contact-telephone">
                  <i class="site-header__contact-telephone-icon"></i>
                  <div class="site-header__contact-text"><?= $this->config->telephone; ?></div>
                </div>
                <div class="site-header__contact-email">
                  <i class="site-header__contact-email-icon"></i>
                  <div class="site-header__contact-text"><?= $this->config->infoemail; ?></div>
                </div>
              </div>
            </div>
          </div>
        </header>

        <nav class="site-navigation">
          <div class="container">
            <?php require('includes/nav.php'); ?>
          </div>
        </nav>

        <div class="site-content">
        <?= $this->layout()->content ?>
        </div>

        <footer class="site-footer">
          <div class="container">
            <?= $this->inc(Document_Snippet::getByPath('/snippets/footer')); ?>
          </div>
        </footer>
    </body>

    <?php require('includes/js.php'); ?>
    <?php require('includes/footer.php'); ?>
</html>
