<?php

namespace Website\Form;

class BrochureForm extends BaseForm
{
    public function init()
    {
        $this->setAttrib('id', 'brochureform');
        $this->setAttrib('action', '/contact-us');

        $selectOne = "Select one:";

        $careHomeOptions = [
            "" => $selectOne,
            0 => "Abbeyvale Care Centre, Hartlepool",
            1 => "Ashwood Court, Sunderland"
        ];

        $deliveryMethodOptions = [
            "" => $selectOne,
            0 => "Send to my address",
            1 => "Download"
        ];

        $careHome = new \Zend_Form_Element_Select('care_home_options');
        $careHome->setMultiOptions($careHomeOptions)
            ->setRequired(true)
            ->setLabel('Care home:')
            ->removeDecorator('Errors');

        $deliveryMethod = new \Zend_Form_Element_Select('delivery_method_options');
        $deliveryMethod->setMultiOptions($deliveryMethodOptions)
            ->setRequired(true)
            ->setLabel('Send brochure by:')
            ->removeDecorator('Errors');

        $name = new \Zend_Form_Element_Text('brochure_name');
        $name->setLabel('Your name:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $email = new \Zend_Form_Element_Text('brochure_email');
        $email->setLabel('Your email:')
            ->addValidator('NotEmpty', true)
            ->addValidator('EmailAddress')
            ->addFilter('StringToLower')
            ->setRequired(true);

        $number = new \Zend_Form_Element_Text('brochure_number');
        $number->setLabel('Your number:')
            ->addValidator('NotEmpty', true)
            ->addValidator('Digits')
            ->setRequired(true);

        $address = new \Zend_Form_Element_Text('brochure_address');
        $address->setLabel('Your address:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $message = new \Zend_Form_Element_Textarea('brochure_message');
        $message->setLabel('Your message:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $opt = new \Zend_Form_Element_Checkbox('brochure_opt_in');

        $submit = new \Zend_Form_Element_Submit('brochure_submit');
        $submit->setLabel('Submit');

        $this->addElements([$careHome, $deliveryMethod, $name, $email, $number, $address, $message, $opt, $submit]);

        parent::clearDecorators();

        /* Submit elements don't need a label since we added a label on setElementDecorators()
           on <input> elements (including the submit) */
        $submit->setDecorators(['ViewHelper']);

        return $this;
    }
}