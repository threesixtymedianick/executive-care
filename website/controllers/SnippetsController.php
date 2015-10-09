<?php

use Website\Controller\PageController as AbstractPageController;
use Website\Service\RecommendationService;

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

    /**
     * Recent recommendation snippet
     *
     * @return
     */
    public function recommendationAction()
    {
        $recommendationService = new RecommendationService();
        $recommendation = $recommendationService->getRandomRecommendation();

        if (isset($recommendation)) {
            $recommendation['title'] = str_replace(' from carehome.co.uk', '', $recommendation['title']);
            $recommendation['pubDate'] = (new DateTime($recommendation['pubDate']))->format('j F Y');
            $recommendation['description'] = mb_strimwidth($recommendation['description'], 0, 140, "...");
        }

        $this->view->recommendation = $recommendation;
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

    public function vacancySearchAction()
    {

    }

    public function getInTouchAction()
    {

    }

    public function requestBrochureAction()
    {

    }

    public function vacanciesAction()
    {

    }

    public function ourCareExplainedAction()
    {

    }
}
