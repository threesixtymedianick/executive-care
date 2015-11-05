<?php

use Website\Controller\PageController as AbstractPageController;

class DownloadController extends AbstractPageController
{
    /**
     * Downloads an asset by it's given ID
     * @return bool  The success of getting the asset
     * @throws Zend_Controller_Action_Exception
     */
    public function downloadAction()
    {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        // Gets the asset ID from the paramters
        $assetId = $this->getRequest()->getParams()['file'];

        // Creates a new asset from the ID
        $asset = Asset::getById($assetId);

        if ($asset instanceof Asset && $asset) {

            // Gets the filename of the asset
            $fileName = $asset->getfilename();

            // File location of the asset
            // Assets live in "var/assets/ but they may be in a folder within this
            // So we get the asset path too
            $fileLoc = "var/assets/" . $asset->getPath();

            // The full filename and path of the asset
            $fullPath = $fileLoc . $fileName;

            // Throw an exception if the file doesn't exist
            if (!is_file($fullPath)) {
                throw new Zend_Controller_Action_Exception('This file does not exist', 404);
            }

            // Starts the download of the file
            $this->getFile($fileName, $fullPath);

            return true; // Everything went well
        }

        return false; // Something went wrong
    }

    /**
     * Downloads a CV based on the provided name
     *
     * CV Location is hard coded and doesn't change
     * @throws Zend_Controller_Action_Exception
     */
    public function downloadCvAction()
    {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        // Gets the CV filename from the parameters
        $fileName = $this->getRequest()->getParams()['file'];

        // CV's are hard coded into this directory
        $fileLoc = 'var/cv_uploads/';

        // Full path and filename of the file
        $fullPath = $fileLoc . $fileName;

        // Throw an exception if the file doesn't exist
        if (!is_file($fullPath)) {
            throw new Zend_Controller_Action_Exception('This file does not exist', 404);
        }

        // Get the file
        $this->getFile($fileName, $fullPath);
    }

    /**
     * Initiates a file download
     * @param $fileName  The filename of the chosen download, also the suggested filename passed to the browser to save
     * @param $fullPath  The full path and filename of the file to download
     */
    private function getFile($fileName, $fullPath)
    {
        $this->getResponse()
            ->setHeader('Content-Description', 'File Transfer', true)
            ->setHeader('Content-Type', 'application/octet-stream', true)
            ->setHeader('Content-Disposition', 'attachment; filename=' . $fileName, true)
            ->setHeader('Content-Transfer-Encoding', 'binary', true)
            ->setHeader('Expires', '0', true)
            ->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true)
            ->setHeader('Pragma', 'public', true)
            ->setHeader('Content-Length: ', filesize($fullPath), true);

        $this->getResponse()->setBody(file_get_contents($fullPath));
    }
}