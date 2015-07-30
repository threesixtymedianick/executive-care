<?php

namespace Website\Form;

class BrochureForm extends BaseForm
{
    public function init()
    {
        $this->setAttrib('id', 'brochureform');
        $this->setAttrib('action', '/contact-us');

        $selectOne = "Select One:";

        $careHomeOptions = array(
            -1 => $selectOne,
            0 => "Abbeyvale Care Centre, Hartlepool",
            1 => "Ashwood Court, Sunderland"
            );

        $deliveryMethodOptions = array(
                -1 => $selectOne,
                0 => "Send to my address",
                1 => "Download"
            );

        $careHome = new \Zend_Form_Element_Select('care_home');
        $careHome->setMultiOptions($careHomeOptions)
        ->setRequired(true)
        ->setLabel('Care home:');

        $deliveryMethod = new \Zend_Form_Element_Select('delivery_method');
        $deliveryMethod->setMultiOptions($deliveryMethodOptions)
        ->setRequired(true)
        ->setLabel('Send brochure by:');

        $name = new \Zend_Form_Element_Text('name');
        $name->setLabel('Your name:');

        $email = new \Zend_Form_Element_Text('email');
        $email->setLabel('Your email:');

        $number = new \Zend_Form_Element_Text('number');
        $number->setLabel('Your number:');

        $address = new \Zend_Form_Element_Text('address');
        $address->setLabel('Your address:');

        $message = new \Zend_Form_Element_Textarea('message');
        $message->setLabel('Your message:');

        $opt = new \Zend_Form_Element_Checkbox('opt_in');

        $submit = new \Zend_Form_Element_Submit('submit');
        $submit->setLabel('Submit');

        $this->addElements(array($careHome, $deliveryMethod, $name, $email, $number, $address, $message, $opt, $submit));

        parent::clearDecorators();

        /* Submit elements don't need a label since we added a label on setElementDecorators()
           on <input> elements (including the submit) */
        $submit->setDecorators(array('ViewHelper'));

        return $this;
    }
}
