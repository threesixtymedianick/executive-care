<!DOCTYPE html>
<html>
    <?php require('includes/header.php'); ?>

    <body>
        <?= $this->layout()->content ?>

        <?= $this->snippet("footer"); ?>

        <?php
            $footer = Document\Snippet::getByPath('/snippets/footer');

            echo $this->inc($footer);
        ?>
    </body>

    <?php require('includes/js.php'); ?>
    <?php require('includes/footer.php'); ?>
</html>
