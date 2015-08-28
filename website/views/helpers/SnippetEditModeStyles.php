<?php

class Zend_View_Helper_SnippetEditModeStyles extends Zend_View_Helper_Abstract
{
    public function snippetEditModeStyles()
    {
        $stylesHtml = '';

        if ($this->view->editmode) {
            $stylesHtml .= '<link
                href="/website/static/css/style.css" media="screen" rel="stylesheet" type="text/css" >';
        }

        return $stylesHtml;
    }
}