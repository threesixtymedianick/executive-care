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
}
