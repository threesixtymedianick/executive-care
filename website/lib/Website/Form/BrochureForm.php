<?php

namespace Website\Form;

class BrochureForm extends \Zend_Form
{
    public function init()
    {
        parent::init();

        $this->setAttrib('id', 'brochureform');
        $this->setAttrib('action', '/contact-us');

        $options = array(
            0 => "Thisone",
            1 => "another"
            );

        $careHome = new \Zend_Form_Element_Select('care_home');
        $careHome->setMultiOptions($options)
        ->setLabel('Care home:')
        ->setAttrib('class', 'form-control')
        ->setRequired(true);

        $name = new \Zend_Form_Element_Text('name');
        $name->setLabel('Your name:')
        ->setAttrib('class', 'form-control');

        $email = new \Zend_Form_Element_Text('email');
        $email->setLabel('Your email:')
        ->setAttrib('class', 'form-control');

        $number = new \Zend_Form_Element_Text('number');
        $number->setLabel('Your number:')
        ->setAttrib('class', 'form-control');

        $address = new \Zend_Form_Element_Text('address');
        $address->setLabel('Your address:')
        ->setAttrib('class', 'form-control');

        $submit = new \Zend_Form_Element_Submit('submit');
        $submit->setLabel('Submit')
        ->setAttrib('class', 'btn btn-success');

        $this->addElement($careHome);
        $this->addElement($name);
        $this->addElement($email);
        $this->addElement($number);
        $this->addElement($address);
        $this->addElement($submit);

        return $this;
    }
}
