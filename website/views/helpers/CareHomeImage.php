<?php

class Zend_View_Helper_CareHomeImage extends Zend_View_Helper_Abstract
{
    public function careHomeImage(\Object_CareHomes $careHome)
    {
        $select = $careHome->getHomeImage();

        if (!$select) {
            return null;
        }

        return $select->getThumbnail('header_images');
    }
}