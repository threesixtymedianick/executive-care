<?php

namespace Website\Form;

class BookAVisitForm extends BaseForm
{
    public function init()
    {
        $this->setAttrib('id', 'bookAVisitForm');
        $this->setAttrib('action', '/care-homes/book');

        $formName = "bookAVisit_";

        $careHomes = new \Zend_Form_Element_Select($formName . 'careHomes');
        $careHomes->setLabel('Care Home:');
        $careHomes->setMultiOptions($this->getCareHomeSelect());

        $date = new \Zend_Form_Element_Text($formName . 'date');
        $date->setAttrib('class', 'book-a-visit__left__content__box__left--date');

        $time = new \Zend_Form_Element_Text($formName . 'time');
        $time->setAttrib('class', 'book-a-visit__left__content__box__left--time');

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

        $opt = new \Zend_Form_Element_Checkbox($formName . 'opt_in');

        $submit = new \Zend_Form_Element_Submit($formName . 'submit');
        $submit->setLabel('Submit');

        $this->addElements([$careHomes, $date, $day, $time, $name, $email, $number, $address, $opt, $submit]);

        parent::clearDecorators();

        /* Submit elements don't need a label since we added a label on setElementDecorators()
           on <input> elements (including the submit) */
        $submit->setDecorators(['ViewHelper']);

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
}
