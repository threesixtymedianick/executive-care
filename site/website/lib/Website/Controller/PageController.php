<?php
namespace Website\Controller;

class PageController extends AbstractController
{
    public function init()
    {
        parent::init();

        $this->enableLayout();
        $this->view->language = (string) $this->getLocale();
        $this->language = (string) $this->getLocale();
    }
}
