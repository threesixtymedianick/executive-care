<?php

class Zend_View_Helper_CareHomeSelect extends Zend_View_Helper_Abstract
{
    public function careHomeSelect()
    {
        $careHomes = new Object_CareHomes_List();
        $careHomes->setOrderKey("title");

        foreach ($careHomes as $home) {
            $homeAssociativeArray[] = [
                $home->getId(),
                sprintf('%s', $home->getTitle())
            ];
        }
        return $homeAssociativeArray;
    }
}