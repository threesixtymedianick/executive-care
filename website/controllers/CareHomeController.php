<?php
use Website\Controller\PageController as AbstractPageController;

class CareHomeController extends AbstractPageController
{
    /**
     * Displays the Care Home index page
     *
     * @return
     */
    public function indexAction()
    {
        $careHomes = new Object\CareHomes\Listing();

        $this->view->careHomes = $careHomes->load();
    }

    /**
     * Displays a single care home
     *
     * @return
     */
    public function detailAction()
    {
        $careHomeCategory = Object_CareHomes::getById(17);

        $this->view->careHomeObject = $careHomeCategory;
    }
}
