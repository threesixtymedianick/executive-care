<?php

/**
 *
 */
class Zend_View_Helper_MainMenu extends Zend_View_Helper_Abstract
{
    /**
     * Generates the main menu
     *
     * @param  \Document $document
     * @return string
     */
    public function mainMenu($document)
    {
        if (!$document instanceof DocumentPage) {
            $document = Document::getById(1);
        }

        $navStartNode = $document->getProperty("navigationRoot");

        if (!$navStartNode instanceof DocumentPage) {
            $navStartNode = Document::getById(1);
        }

        $navigation = $this->view->pimcoreNavigation($document, $navStartNode);

        $home = Document::getById(1);

        $navigation->addPage(array(
            'order'  => -1, // put it in front of all the others
            'uri'    => '/', //path to homepage
            'label'  => 'Home',
            'title'  => 'Home',
            'active' => $document->id === $home->id //active state (boolean)
        ));

        return $navigation->menu()->renderMenu(null, [
            "maxDepth" => 1,
            "ulClass" => "site-navigation__main-navigation"
        ]);
    }
}
