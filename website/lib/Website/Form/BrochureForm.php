<?php

namespace Website\Form;

class BrochureForm extends BaseForm
{
    public function init()
    {
        $this->setAttrib('id', 'brochureform');
        $this->setAttrib('action', '/contact-us');

        $selectOne = "Select one:";

        $careHomeOptions = array(
            "" => $selectOne,
            0 => "Abbeyvale Care Centre, Hartlepool",
            1 => "Ashwood Court, Sunderland"
        );

        $deliveryMethodOptions = array(
            "" => $selectOne,
            0 => "Send to my address",
            1 => "Download"
        );

        $careHome = new \Zend_Form_Element_Select('care_home_options');
        $careHome->setMultiOptions($careHomeOptions)
            ->setLabel('Care home:');

        $deliveryMethod = new \Zend_Form_Element_Select('delivery_method_options');
        $deliveryMethod->setMultiOptions($deliveryMethodOptions)
            ->setLabel('Send brochure by:');

        $name = new \Zend_Form_Element_Text('brochure_name');
        $name->setLabel('Your name:');

        $email = new \Zend_Form_Element_Text('brochure_email');
        $email->setLabel('Your email:');

        $number = new \Zend_Form_Element_Text('brochure_number');
        $number->setLabel('Your number:');

        $address = new \Zend_Form_Element_Text('brochure_address');
        $address->setLabel('Your address:');

        $message = new \Zend_Form_Element_Textarea('brochure_message');
        $message->setLabel('Your message:');

        $opt = new \Zend_Form_Element_Checkbox('brochure_opt_in');

        $submit = new \Zend_Form_Element_Submit('brochure_submit');
        $submit->setLabel('Submit');

        $this->addElements(array($careHome, $deliveryMethod, $name, $email, $number, $address, $message, $opt, $submit));

        parent::clearDecorators();

        /* Submit elements don't need a label since we added a label on setElementDecorators()
           on <input> elements (including the submit) */
        $submit->setDecorators(array('ViewHelper'));

        return $this;
    }
}
