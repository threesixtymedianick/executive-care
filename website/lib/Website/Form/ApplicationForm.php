<?php

namespace Website\Form;

class ApplicationForm extends BaseForm
{
    public function init()
    {
        $this->setAttrib('id', 'application_form');
        $this->setAttrib('action', '/careers/apply');

        $formName = "application_";

        $careHomeOptions = $this->getCareHomeSelect();

        $careHomes = new \Zend_Form_Element_Select($formName . 'careHomes');
        $careHomes->setLabel('Care Home:');
        $careHomes->setMultiOptions($careHomeOptions);

        $vacancyRoles = $this->getVacancyRoleSelect();

        $vacancy = new \Zend_Form_Element_Select($formName . 'vacancyRoles');
        $vacancy->setLabel('Position applying for:');
        $vacancy->setMultiOptions($vacancyRoles);

        $name = new \Zend_Form_Element_Text($formName . 'name');
        $name->setLabel('Your name:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $email = new \Zend_Form_Element_Text($formName . 'email');
        $email->setLabel('Your email:')
            ->addValidator('NotEmpty', true)
            ->addValidator('EmailAddress')
            ->addFilter('StringToLower')
            ->setRequired(true);

        $number = new \Zend_Form_Element_Text($formName . 'number');
        $number->setLabel('Your number:')
            ->addValidator('NotEmpty', true)
            ->addValidator('Digits')
            ->setRequired(true);

        $coverLetter = new \Zend_Form_Element_Textarea($formName . 'coverLetter');
        $coverLetter->setLabel('Cover letter:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

//        $cvFile = new \Zend_Form_Element_File($formName . 'cvFile');
//        $cvFile->setLabel('C.V upload')
//            ->setDestination(APPLICATION_PATH . '/var/tmp')
//            ->setRequired(true)
//            ->addValidator('NotEmpty');

        $submit = new \Zend_Form_Element_Submit($formName . 'submit');
        $submit->setLabel('Submit')
            ->setAttrib('class', 'careers__apply__left__form__submitbutton');

        $this->addElements([$name, $email, $number, $careHomes, $vacancy, $coverLetter, $submit]);

        parent::clearDecorators();

        $submit->setDecorators(array('ViewHelper'));

        return $this;
    }
}