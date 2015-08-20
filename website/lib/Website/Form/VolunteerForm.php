<?php

namespace Website\Form;

class VolunteerForm extends BaseForm
{
    public function init()
    {
        $formName = "volunteer_";
        
        $this->setAttrib('id', 'volunteer_form');
        $this->setAttrib('action', '/careers');

        $name = new \Zend_Form_Element_Text($formName . 'name');
        $name->setLabel('Your name:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $email = new \Zend_Form_Element_Text($formName . 'email');
        $email->setLabel('Your email:')
            ->addValidator('NotEmpty', true)
            ->addValidator('EmailAddress')
            ->addFilter('StringToLower')
            ->setRequired(true)
            ->setAttrib('class', 'form-control');

        $number = new \Zend_Form_Element_Text($formName . 'number');
        $number->setLabel('Your number:')
            ->addValidator('NotEmpty', true)
            ->addValidator('Digits')
            ->setRequired(true);

        $address = new \Zend_Form_Element_Text($formName . 'address');
        $address->setLabel('Your address:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $message = new \Zend_Form_Element_Textarea($formName . 'message');
        $message->setLabel('Your message:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $opt = new \Zend_Form_Element_Checkbox($formName . 'opt_in');
        $opt->setLabel('I would like to hear about the latest news and upcoming events');

        $submit = new \Zend_Form_Element_Submit($formName . 'submit');
        $submit->setLabel('Submit');

        $this->addElements(array($name, $email, $number, $address, $message, $opt, $submit));

        parent::clearDecorators();

        /* Submit elements don't need a label since we added a label on setElementDecorators()
           on <input> elements (including the submit) */
        $submit->setDecorators(array('ViewHelper'));

        return $this;
    }
}