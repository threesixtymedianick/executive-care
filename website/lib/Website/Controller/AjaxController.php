<?php
namespace Website\Controller;

class AjaxController extends AbstractController
{
    public function init()
    {
        parent::init();
        $this->disableLayout();
    }
}
