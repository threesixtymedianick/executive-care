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
        $paginator->setItemCountPerPage(6);
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

        if (null !== $careHome[0]->getCareHomeID()) {
            // Get recommendations for care home
            $recommendationService = new RecommendationService();
            $recommendations = $recommendationService->getRecommendationsForCareHome($careHome[0]->getCareHomeID());

            if (false !== $recommendations && !empty($recommendations)) {
                $this->view->recommendations = $recommendations;
            }
        }

        // Get nearby care homes
        $careHomesRepo = new CareHomeElasticSearchRepository();
        $nearbyHomes = $careHomesRepo->nearby((float) $careHome[0]->getLat(), (float) $careHome[0]->getLon());

        if (false !== $nearbyHomes && !empty($careHomesRepo)) {
            $nearbyHomes = $this->transformResults($nearbyHomes);

            // Remove the first item from the results as it will be the care home we are currently viewing
            array_shift($nearbyHomes);

            $this->view->nearbyHomes = $nearbyHomes;
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
        $query = $this->_getParam('query');

        if (null !== $query) {
            $careHomesRepo = new CareHomeElasticSearchRepository();
            $results = $careHomesRepo->search($query);
        }

        // Transform results into array of care home objects
        $careHomes = $this->transformResults($results);

        // Setup pagination
        $paginator = Zend_Paginator::factory($careHomes);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $paginator->setItemCountPerPage(6);

        $this->view->results = $paginator;
    }

    /**
     * Transform results from array of Elastica\Result into array of
     * care home objects
     *
     * @param  array  $results
     * @return array
     */
    protected function transformResults($results)
    {
        // Initalise empty array, template will check for them being empty and
        // display no results found if necessary
        $careHomes = [];

        $counter = 0;

        if (!empty($results)) {
            foreach ($results as $home) {
                $careHome = Object_CareHomes::getById($home->getId());

                if (null !== $careHome) {
                    // Get care homes
                    $careHomes[] = $careHome;

                    // Append distance to care home
                    $careHomes[$counter]->distance = $home->getParam('sort')[0];

                    $counter++;
                }
            }
        }

        return $careHomes;
    }
}
