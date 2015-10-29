<?php

use Website\Controller\PageController as AbstractPageController;

class DownloadController extends AbstractPageController
{
    /**
     * @throws Zend_Controller_Action_Exception
     */
    public function downloadAction()
    {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $assetId = $this->getRequest()->getParams()['file'];

        $asset = Asset::getById($assetId);

        if($asset instanceof Asset) {

            $fileName = $asset->getfilename();

            $fileLoc = "var/assets/" . $asset->getPath();

            if (!is_file($fileLoc . $fileName)) {
                throw new Zend_Controller_Action_Exception('This file does not exist', 404);
            }

            $this->getFile($fileName, $fileLoc);

            return true;
        }

        return false;
    }

    public function downloadCvAction()
    {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $fileName = $this->getRequest()->getParams()['file'];

        $fileLoc = 'var/cv_uploads/';

        if (!is_file($fileLoc . $fileName)) {
            throw new Zend_Controller_Action_Exception('This file does not exist', 404);
        }

        $this->getFile($fileName, $fileLoc);
    }

    /**
     * @param $fileName
     * @param $fileLoc
     */
    private function getFile($fileName, $fileLoc)
    {
        $this->getResponse()
            ->setHeader('Content-Description', 'File Transfer', true)
            ->setHeader('Content-Type', 'application/octet-stream', true)
            ->setHeader('Content-Disposition', 'attachment; filename=' . $fileName, true)
            ->setHeader('Content-Transfer-Encoding', 'binary', true)
            ->setHeader('Expires', '0', true)
            ->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true)
            ->setHeader('Pragma', 'public', true)
            ->setHeader('Content-Length: ', filesize($fileLoc . $fileName), true);

        $this->getResponse()->setBody(file_get_contents($fileLoc . $fileName));
    }
}