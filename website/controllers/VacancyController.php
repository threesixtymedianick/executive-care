<?php
use Website\Controller\PageController as AbstractPageController;
use Website\Repository\VacancyElasticSearchRepository;

class VacancyController extends AbstractPageController
{
    /**
     * Displays the Care Home index page
     *
     * @return
     */
    public function indexAction()
    {
        $vacancy = new Object\Vacancy\Listing();

        $this->view->vacancy = $vacancy->load();
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
            $list = new Object_Vacancy_List();
            $list->setCondition("o_key = '" . $key . "'");
            $vacancyItem = $list->load();
            $this->view->vacancy = $vacancyItem;
        } else {
            throw new \Zend_Controller_Action_Exception('This page does not exist', 404);
        }
    }

    /**
     * Search for vacancies
     *
     * @return
     */
    public function searchAction()
    {
        $query = $this->getRequest()->getPost('postcode_search');

        if (null !== $query) {
            $vacancyRepo = new VacancyElasticSearchRepository();
            $results = $vacancyRepo->search($query);
        }

        // Initalise empty arrays, template will check for them being empty and
        // display no results found if necessary
        $careHomes = [];
        $distances = [];

        if (!empty($results)) {
            foreach ($results as $vacancy) {
                $vacancies[] = Object_Vacancy::getById($vacancy->getId());
                $distances[] = $vacancy->getParam('sort');
            }
        }

        $this->view->results = $vacancies;
        $this->view->distances = $distances;

        $this->renderScript('vacancy/search.php');
    }
}
