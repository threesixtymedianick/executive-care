<?php

use Website\Controller\PageController as AbstractPageController;

class SnippetsController extends AbstractPageController
{
    /**
     * [init description]
     * @return void
     */
    public function init()
    {
        parent::init();

        if (true === $this->editmode) {
            $this->disableLayout();
        }
    }

    /**
     * [footerAction description]
     * @return [type] [description]
     */
    public function footerAction()
    {

    }
    /**
     * [addressAction description]
     * @return [type] [description]
     */
    public function addressAction()
    {

    }

    public function upcomingOpenDaysAction()
    {

    }

    public function bookAVisitAction()
    {

    }

    public function recommendationAction()
    {

    }

    public function findAHomeAction()
    {

    }

    public function contactUsAction()
    {

    }

    public function applyOnlineAction()
    {

    }

    public function downloadFormAction()
    {

    }

    public function jobAlertsAction()
    {

    }

    public function newsAndEventsAction()
    {

    }

    public function trainingAction()
    {

    }

    public function volunteerAction()
    {

    }

}
