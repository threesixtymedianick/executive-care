<!DOCTYPE html>
<html>
    <?php require('includes/header.php'); ?>

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
            <?php
            if (!$this->document instanceof DocumentPage) {
                $this->document = Document::getById(1);
            }

            $navStartNode = $this->document->getProperty("navigationRoot");
            if (!$navStartNode instanceof DocumentPage) {
                $navStartNode = Document::getById(1);
            }

            $navigation = $this->pimcoreNavigation($this->document, $navStartNode);

            $home = Document::getById(1);
            $navigation->addPage(array(
                'order' => -1, // put it in front of all the others
                'uri' => '/', //path to homepage
                'label' => 'Home',
                'title' => 'Home',
                'active' => $this->document->id == $home->id //active state (boolean)
            ));

            echo $navigation->menu()->renderMenu(null, [
                "maxDepth" => 1,
                "ulClass" => "site-navigation__main-navigation"
            ]);
            ?>
          </div>
        </div>

        <div class="site-content">
          <div class="container">
            <?= $this->layout()->content ?>
          </div>
        </div>

        <div class="site-footer">
          <div class="container">
            <?php
            $footer = Document_Snippet::getByPath('/snippets/footer');
            echo $this->inc($footer);
            ?>
          </div>
        </div>
    </body>

    <?php require('includes/js.php'); ?>
    <?php require('includes/footer.php'); ?>
</html>
