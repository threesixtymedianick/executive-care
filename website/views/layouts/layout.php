<!DOCTYPE html>
<html>
    <?php require('includes/head.php'); ?>

    <body>
        <div class="site-header">
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
                  01423 859 859
                </div>
                <div class="site-header__contact-email">
                  info@executivecare.com
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="site-navigation">
          <div class="container">
            <?= $this->mainMenu($this->document) ?>
          </div>
        </div>

        <div class="site-content">
          <div class="container">
            <?= $this->layout()->content ?>
          </div>
        </div>

        <div class="site-footer">
          <div class="container">
            <?= $this->inc(Document_Snippet::getByPath('/snippets/footer')); ?>
          </div>
        </div>
    </body>

    <?php require('includes/js.php'); ?>
    <?php require('includes/footer.php'); ?>
</html>
