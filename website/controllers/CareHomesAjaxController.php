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
                'id'       => $home->getId(),
                'title'    => $home->getTitle(),
                'lat'      => $home->getLat(),
                'lon'      => $home->getLon(),
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

        $selectedHome = (array) $careHome[0];

        if (!isset($selectedHome)) {
            return $this->getHelper('json')
                 ->sendJson(['error']);
        }

        if ($selectedHome['ListingImage'] !== "" && $selectedHome['ListingImage']) {
            $selectedHome['ListingImage'] = $careHome[0]->getListingImage()->getThumbnail('care-homes-index-images')->getPath();
        }

        return $this->getHelper('json')
             ->sendJson($selectedHome);
    }
}
