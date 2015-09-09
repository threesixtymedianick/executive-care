<?php
use Website\Controller\AjaxController;

class CareHomesAjaxController extends AjaxController
{
    /**
     * Gets all care homes
     *
     * @return json
     */
    public function getCareHomesAction()
    {
        $careHomes = new Object\CareHomes\Listing();
        $careHomes->load();

        $this->getHelper('json')
             ->sendJson($careHomes->objects);
    }
}
