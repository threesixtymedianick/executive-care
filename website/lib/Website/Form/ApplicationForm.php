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

        $file = new \Zend_Form_Element_File($formName . 'cvFile');
        $file->setLabel('CV Upload (docx, doc, rtf, pdf):')->setRequired(true)
            ->addValidator('Size', false, ['max' => '5242880'])
            ->addValidator('Extension', false, ['docx', 'doc', 'rtf', 'pdf'])
            ->setRequired(false);

        $submit = new \Zend_Form_Element_Submit($formName . 'submit');
        $submit->setLabel('Submit')
            ->setAttrib('class', 'careers__apply__left__form__submitbutton');

        $this->addElements([$name, $email, $number, $careHomes, $vacancy, $coverLetter, $file, $submit]);

        foreach ($this->getElements() as $key => $value) {
            $value->removeDecorator('HtmlTag');
            $value->removeDecorator('DtDdWrapper');
        }

        $submit->setDecorators(['ViewHelper']);

        $this->setEnctype(\Zend_Form::ENCTYPE_MULTIPART);

        return $this;
    }
}