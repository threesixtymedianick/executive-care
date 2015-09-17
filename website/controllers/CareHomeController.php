<?php
use Website\Controller\PageController as AbstractPageController;
use Website\Repository\CareHomeElasticSearchRepository;

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
        $careHomes->setOrderKey("title");

        $this->view->careHomes = $careHomes->load();
    }

    /**
     * Displays a single care home
     *
     * @return
     */
    public function detailAction()
    {
        $key = $this->_getParam("key");

        if (null !== $key) {
            $list = new Object_CareHomes_List();
            $list->setCondition("o_key = '" . $key . "'");
            $homeItem = $list->load();
            $this->view->careHome = $homeItem[0];
        } else {
            throw new \Zend_Controller_Action_Exception('This page does not exist', 404);
        }
    }

    /**
     * Search for care homes
     *
     * @return
     */
    public function searchAction()
    {
        $query = $this->getRequest()->getPost('query');

        if (null !== $query) {
            $careHomesRepo = new CareHomeElasticSearchRepository();
            $results = $careHomesRepo->search($query);
        }

        // Initalise empty arrays, template will check for them being empty and
        // display no results found if necessary
        $careHomes = [];
        $distances = [];

        if (!empty($results)) {
            foreach ($results as $home) {
                $careHomes[] = Object_CareHomes::getById($home->getId());
                $distances[] = $home->getParam('sort');
            }
        }

        $this->view->results = $careHomes;
        $this->view->distances = $distances;
    }
}
