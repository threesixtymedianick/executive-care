<?php
use Website\Controller\PageController as AbstractPageController;

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
        $vacancyItem = Object_Vacancy::getById(52);

        $this->view->vacancyObject = $vacancyItem;
    }
}
