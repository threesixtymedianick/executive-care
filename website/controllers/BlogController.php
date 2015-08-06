<?php

use Website\Controller\AbstractBlogController as AbstractBlogController;

class BlogController extends AbstractBlogController
{
    public function init()
    {
        parent::init();

        $this->enableLayout();
        $this->view->language = (string) $this->getLocale();
        $this->language = (string) $this->getLocale();
    }

    public function newsEventsAction()
    {
        $this->enableLayout();

        $cat = $this->_getParam('cat');
        $category = Object_BlogCategory::getByPath('/blog/categories/' . $cat);
        if (!$category) {
            throw new Blog_Exception("Category $cat doesn't exist");
        }

        try {
            $this->view->paginator = $this->_blog->getListByCategory(
                $category,
                $this->_getParam('page', 1),
                $this->_getParam('perpage', 10)
            );
        } catch (Exception $e) {
            throw new Zend_Controller_Action_Exception($e->getMessage(), 404);
        }

        $this->view->category = $category;

        $this->render('news-events');
    }

    public function openDaysAction()
    {

    }
}
