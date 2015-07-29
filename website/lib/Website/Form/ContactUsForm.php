<?php

namespace Website\Form;

class ContactUsForm extends BaseForm
{
    public function init()
    {
        $this->setAttrib('id', 'enquiryform');
        $this->setAttrib('action', '/contact-us');

        $name = new \Zend_Form_Element_Text('name');
        $name->setLabel('Your name:')
        ->addValidator('NotEmpty', true)
        ->setRequired(true);

        $email = new \Zend_Form_Element_Text('email');
        $email->setLabel('Your email:')
        ->addValidator('NotEmpty', true)
        ->addValidator('EmailAddress')
        ->addFilter('StringToLower')
        ->setRequired(true)
        ->setAttrib('class', 'form-control');

        $number = new \Zend_Form_Element_Text('number');
        $number->setLabel('Your number:')
        ->addValidator('NotEmpty', true)
        ->setRequired(true);

        $address = new \Zend_Form_Element_Text('address');
        $address->setLabel('Your address:')
        ->addValidator('NotEmpty', true)
        ->setRequired(true);

        $message = new \Zend_Form_Element_Textarea('message');
        $message->setLabel('Your message:')
        ->addValidator('NotEmpty', true)
        ->setRequired(true);

        $opt = new \Zend_Form_Element_Checkbox('opt_in');

        $submit = new \Zend_Form_Element_Submit('submit');
        $submit->setLabel('Submit');

        $this->addElements(array($name, $email, $number, $address, $message, $opt, $submit));

        parent::clearDecorators();

        /* Submit elements don't need a label since we added a label on setElementDecorators()
           on <input> elements (including the submit) */
        $submit->setDecorators(array('ViewHelper'));

        return $this;
    }
}
