<?php
use Website\Controller\PageController as AbstractPageController;
use Website\Repository\CareHomeElasticSearchRepository;
use Website\Service\RecommendationService;

class CareHomeController extends AbstractPageController
{
    /**
     * Displays the Care Home index page
     *
     * @return
     */
    public function indexAction()
    {
        // Load care homes
        $careHomes = new Object\CareHomes\Listing();
        $careHomes->setOrderKey("title");
        $list = $careHomes->load();

        // Setup pagination
        $paginator = Zend_Paginator::factory($list);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $paginator->setItemCountPerPage(10);
        $this->view->careHomes = $paginator;
    }

    /**
     * Displays a single care home
     *
     * @return
     */
    public function detailAction()
    {
        $key = $this->_getParam("key");

        if (null === $key) {
            throw new \Zend_Controller_Action_Exception('This page does not exist', 404);
        }

        $list = new Object_CareHomes_List();
        $list->setCondition("o_key = '" . $key . "'");
        $careHome = $list->load();

        $recommendationService = new RecommendationService();
        $recommendations = $recommendationService->getRecommendationsForCareHome($careHome[0]->getCareHomeID());

        if (false !== $recommendations && !empty($recommendations)) {
            $this->view->recommendations = $recommendations;
        }

        $this->view->careHome = $careHome[0];
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
