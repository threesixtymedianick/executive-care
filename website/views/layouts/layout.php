<!DOCTYPE html>
<html>
   <?php
      require('includes/head.php');
      $homePage = Document::getById(1);
   ?>
   <body>
      <header class="site-header">
         <div class="container">
            <div class="site-header__logo">
               <a href="<?= $homePage; ?>"><img src="/website/static/images/executive-care-logo.png" alt="Executive Care" /></a>
            </div>
            <div class="site-header__contact">
               <div class="site-header__contact-header">
                  <a href="#" id="smaller">A-</a> | <a href="#" id="larger">A+</a>
               </div>
               <div class="site-header__contact-details">
                  <div class="site-header__telephone">
                     <i class="site-header__contact-telephone-icon"></i>
                     <div class="site-header__telephone-number">
                        <?= $this->config->telephone; ?><br />
                        <span>Mon-Fri 8.30am-5pm</span>
                     </div>
                  </div>
                  <div class="site-header__email">
                     <i class="site-header__contact-email-icon"></i>
                     <?= $this->config->infoemail; ?>
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
      </footer>
   </body>

   <?php require('includes/js.php'); ?>
   <?php require('includes/footer.php'); ?>
</html>
