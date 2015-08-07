<?php

use Website\Controller\AbstractBlogController as AbstractBlogController;

class BlogController extends AbstractBlogController
{
    const EVENT_ID  = 5;
    const NEWS_ID   = 6;
    const DAYS_ID   = 8;
    /**
     * @var Blog
     */
    protected $_blog;

    /**
     * @var Commenting
     */
    protected $_commenting;

    public function init()
    {
        parent::init();

        $this->_blog = new Blog();

        if (class_exists('Commenting')) {
            $this->_commenting = new Commenting();
        }

        $this->enableLayout();
        $this->view->language = (string) $this->getLocale();
        $this->language = (string) $this->getLocale();
    }

    public function newsEventsAction()
    {
        $this->enableLayout();

        $eventsCategory = Object_BlogCategory::getById(self::EVENT_ID);
        $newsCategory = Object_BlogCategory::getById(self::NEWS_ID);

        $this->view->events = $this->_blog->getListByCategory(
            $eventsCategory,
            $this->_getParam('page', 1),
            $this->_getParam('perpage', 10)
        );

        $this->view->news = $this->_blog->getListByCategory(
            $newsCategory,
            $this->_getParam('page', 1),
            $this->_getParam('perpage', 10)
        );

        $this->render('news-events');
    }

    public function openDaysAction()
    {
        $this->enableLayout();

        $daysCategory = Object_BlogCategory::getById(self::DAYS_ID);

        $this->view->days = $this->_blog->getListByCategory(
            $daysCategory,
            $this->_getParam('page', 1),
            $this->_getParam('perpage', 10)
        );

        $this->render('open-days');
    }
}
