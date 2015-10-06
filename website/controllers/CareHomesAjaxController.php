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

        foreach ($careHomes->objects as $home) {
            $data[] = [
                'title'    => $home->Title,
                'lat'      => $home->Lat,
                'lon'      => $home->Lon,
            ];
        }

        $this->getHelper('json')
             ->sendJson($data);
    }

    /**
     * Get details for an individual care home
     *
     * @return json|bool
     */
    public function getCareHomeDetails()
    {
        $key = $this->_getParam("id");

        $list = new Object_CareHomes_List();
        $list->setCondition("o_key = '" . $key . "'");
        $careHome = $list->load();

        if (!isset($careHome[0])) {
            return false;
        }
    }
}
