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
}
