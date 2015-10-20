<?php

use Website\Controller\PageController as AbstractPageController;

class DownloadController extends AbstractPageController
{
    /**
     * @throws Zend_Controller_Action_Exception
     */
    public function downloadAction() {

        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $fileLoc = 'var/assets/' . $this->getRequest()->getParams()['file'];
        $fileName = $this->getRequest()->getParams()['file'];

        if (!is_file($fileLoc)) {
            throw new Zend_Controller_Action_Exception('This file does not exist', 404);
        }

        $this->getResponse()
            ->setHeader('Content-Description','File Transfer', true)
            ->setHeader('Content-Type','application/octet-stream', true)
            ->setHeader('Content-Disposition','attachment; filename=' . $fileName, true)
            ->setHeader('Content-Transfer-Encoding','binary', true)
            ->setHeader('Expires','0', true)
            ->setHeader('Cache-Control','must-revalidate, post-check=0, pre-check=0', true)
            ->setHeader('Pragma','public', true)
            ->setHeader('Content-Length: ' , filesize($fileLoc),true);
        $this->getResponse()->setBody(file_get_contents($fileLoc));
    }
}