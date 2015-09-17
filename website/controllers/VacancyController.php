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

        if (null === $key) {
            throw new \Zend_Controller_Action_Exception('This page does not exist', 404);
        }

        $list = new Object_Vacancy_List();
        $list->setCondition("o_key = '" . $key . "'");
        $vacancyItem = $list->load();

        $this->view->vacancy = $vacancyItem;
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
        $vacancies = [];
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

    /**
     * Filter vacancies
     *
     * @return
     */
    public function filterAction()
    {
        $home = $this->_getParam("home");
        $role = $this->_getParam("role");

        // Neither filter value is set redirect to careers page
        if (null === $home && null === $role) {
            return $this->redirect('/careers');
        }

        // Filtered by care home
        if (null !== $home) {
            $vacancies = $this->filterByHome($home);
        }

        // Filtered by vacancy role
        if (null !== $role) {
            $vacancies = $this->filterByRole($role);
        }

        $this->view->results = $vacancies;

        $this->renderScript('vacancy/search.php');
    }

    /**
     * Filter vacancies by care home
     *
     * @param  int $home
     * @return array
     */
    protected function filterByHome($home)
    {
        $list = new Object_Vacancy_List();
        $list->setCondition("careHomes LIKE " . $list->quote("%$home%"));
        $vacancies = $list->load();

        if (!empty($vacancies)) {
            return $vacancies;
        }

        return [];
    }

    /**
     * Filter vacancies by role
     *
     * @param  string $role
     * @return array
     */
    protected function filterByRole($role)
    {
        $list = new Object_Vacancy_List();
        $list->setCondition("roleTitle = " . $list->quote($role));
        $vacancies = $list->load();

        if (!empty($vacancies)) {
            return $vacancies;
        }

        return [];
    }
}
