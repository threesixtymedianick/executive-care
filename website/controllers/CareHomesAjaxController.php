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
    public function getCareHomeAction()
    {
        $key = $this->_getParam("id");

        $list = new Object\CareHomes\Listing();
        $list->setCondition("oo_id = '" . $key . "'");
        $careHome = $list->load();

        if (!isset($careHome[0])) {
            return $this->getHelper('json')
                 ->sendJson(['error']);
        }

        return $this->getHelper('json')
             ->sendJson((array) $careHome[0]);
    }
}
