<?php

namespace Website\Form;

class BaseForm extends \Zend_Form
{
    public function clearDecorators()
    {
        //!IMPORTANT: Add decorators after addElements()
        $this->addDecorator('FormElements'); //This add the form elements first
        $this->addDecorator('Form'); //This removes <dt> and adds the form around the <ul>

        //Time to remove the <dt> and add the <li>
        $this->setElementDecorators(array(
            array('ViewHelper'), // This is important otherwise you won't see your <input> elements
            array('Label'),  // We want the label
            array('Errors') , // We want the errors too
        ));

        return $this;
    }

    /**
     * Get a list of care homes and create an array with id => title
     *
     * @return array
     */
    protected function getCareHomeSelect()
    {
        $careHomes = new \Object\CareHomes\Listing();
        $careHomes->setOrderKey("title");
        $list = $careHomes->load();

        $careHomes = [];

        foreach ($list as $careHome) {
            $careHomes[$careHome->getId()] = $careHome->getTitle();
        }

        return $careHomes;
    }

    /**
     * Get a list of available vacancy roles
     * @return array
     */
    public function getVacancyRoleSelect()
    {
        $roles = new \Object\VacancyRole\Listing();
        $roles->setOrderKey("name");
        $list = $roles->load();

        $roles = [];

        foreach ($list as $vacancyRole) {
            $roles[$vacancyRole->getId()] = $vacancyRole->getName();
        }

        return $roles;
    }
}
