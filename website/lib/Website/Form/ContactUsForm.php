<?php

namespace Website\Form;

class ContactUsForm extends BaseForm
{
    public function init()
    {
        $this->setAttrib('id', 'enquiryform');
        $this->setAttrib('action', '/contact-us');

        $name = new \Zend_Form_Element_Text('enquiry_name');
        $name->setLabel('Your name:');

        $email = new \Zend_Form_Element_Text('enquiry_email');
        $email->setLabel('Your email:')
            ->addFilter('StringToLower')
            ->setAttrib('class', 'form-control');

        $number = new \Zend_Form_Element_Text('enquiry_number');
        $number->setLabel('Your number:');

        $address = new \Zend_Form_Element_Text('enquiry_address');
        $address->setLabel('Your address:');

        $message = new \Zend_Form_Element_Textarea('enquiry_message');
        $message->setLabel('Your message:');

        $opt = new \Zend_Form_Element_Checkbox('enquiry_opt_in');

        $submit = new \Zend_Form_Element_Submit('enquiry_submit');
        $submit->setLabel('Submit');

        $this->addElements(array($name, $email, $number, $address, $message, $opt, $submit));

        parent::clearDecorators();

        /* Submit elements don't need a label since we added a label on setElementDecorators()
           on <input> elements (including the submit) */
        $submit->setDecorators(array('ViewHelper'));

        return $this;
    }
}
