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
}
