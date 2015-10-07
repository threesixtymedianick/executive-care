<?php

namespace Website\Form;

class ApplicationForm extends BaseForm
{
    public function init()
    {
        $this->setAttrib('id', 'application_form');
        $this->setAttrib('action', '/careers/apply');

        $select = "Select";

        $careHomeOptions = [
            "" => $select,
            0 => "Abbeyvale Care Centre, Hartlepool",
            1 => "Ashwood Court, Sunderland"
        ];

        $positions = [
            "" => $select,
            0 => "Boss",
            1 => "Not the boss"
        ];

        $shifts = [
            "" => $select,
            0 => "All the hours",
            1 => "Barely any hours"
        ];

        $vacancy = [
            "" => $select,
            0 => "Me mate Dave told us about it",
            1 => "I just showed up"
        ];

        $formName = "application_";

        $this->setupPersonalDetailsOneForm($formName);

        $this->setupThePositionForm($formName, $careHomeOptions, $positions, $shifts, $vacancy);

        $this->setupEducationAndTrainingForm($formName);

        $this->setupPersonalDetailsTwoForm($formName);

        $this->setupReferencesForm($formName);

        $this->setupMedicalForm($formName);

        $this->setupCompleteForm($formName);

        $submit = new \Zend_Form_Element_Submit($formName . 'submit');
        $submit->setLabel('Submit')
        ->setAttrib('class', 'careers__apply__left__form__submitbutton');

        $this->addElements([$submit]);

        parent::clearDecorators();

        $submit->setDecorators(array('ViewHelper'));

        return $this;
    }

    /**
     * @param $formName
     * @param $careHomeOptions
     * @param $positions
     * @param $shifts
     * @param $vacancy
     * @return array
     * @throws \Zend_Form_Exception
     */
    private function setupThePositionForm($formName, $careHomeOptions, $positions, $shifts, $vacancy)
    {
        $homeName1 = new \Zend_Form_Element_Select($formName . 'home_name_1');
        $homeName1->setMultiOptions($careHomeOptions)
            ->setRequired(true)
            ->setLabel('Home name 1:')
            ->removeDecorator('Errors');

        $homeName2 = new \Zend_Form_Element_Select($formName . 'home_name_2');
        $homeName2->setMultiOptions($careHomeOptions)
            ->setLabel('Home name 2:');

        $homeName3 = new \Zend_Form_Element_Select($formName . 'home_name_3');
        $homeName3->setMultiOptions($careHomeOptions)
            ->setLabel('Home name 3:');

        $position1 = new \Zend_Form_Element_Select($formName . 'position_1');
        $position1->setMultiOptions($positions)
            ->setRequired(true)
            ->setLabel('Position 1:')
            ->removeDecorator('Errors');

        $position2 = new \Zend_Form_Element_Select($formName . 'position_2');
        $position2->setMultiOptions($positions)
            ->setLabel('Position 2:');

        $position3 = new \Zend_Form_Element_Select($formName . 'position_3');
        $position3->setMultiOptions($positions)
            ->setLabel('Position 3:');

        $preferredShift = new \Zend_Form_Element_Select($formName . 'preferred_shift');
        $preferredShift->setMultiOptions($shifts)
            ->setRequired(true)
            ->setLabel('Preferred Shift:')
            ->removeDecorator('Errors');

        $preferredHours = new \Zend_Form_Element_Select($formName . 'preferred_hours');
        $preferredHours->setMultiOptions($shifts)
            ->setRequired(true)
            ->setLabel('Hours:')
            ->removeDecorator('Errors');

        $bankPosition = new \Zend_Form_Element_Checkbox($formName . 'bank_positions');
        $bankPosition->setLabel('If applying for a bank position please tick');

        $howDidYouHear = new \Zend_Form_Element_Select($formName . 'how_did_you_hear');
        $howDidYouHear->setMultiOptions($vacancy)
            ->setRequired(true)
            ->setLabel('How did you hear about the vacancy?:')
            ->removeDecorator('Errors');

        $howDidYouHearOther = new \Zend_Form_Element_Text($formName . 'how_did_you_hear_other');
        $howDidYouHearOther->setLabel('If other please specify:');

        $friendReferral = new \Zend_Form_Element_Text($formName . 'friend_referral');
        $friendReferral->setLabel('If referred by a friend please provide their full name');

        $this->addElements([
            $homeName1, $homeName2, $homeName3,
            $position1, $position2, $position3,
            $preferredShift, $preferredHours, $bankPosition,
            $howDidYouHear, $howDidYouHearOther, $friendReferral
        ]);
    }

    /**
     * @param $formName
     * @return array
     * @throws \Zend_Form_Exception
     */
    private function setupPersonalDetailsOneForm($formName)
    {
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

        $address = new \Zend_Form_Element_Text($formName . 'address');
        $address->setLabel('Your address:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $workPermits = new \Zend_Form_Element_Textarea($formName . 'work_permits');
        $workPermits->setLabel('Give details of Work Permits, Visas, Leave to Remain etc that allow you to work legally in the UK (include expiry dates)):');

        $applyReason = new \Zend_Form_Element_Textarea($formName . 'apply_reason');
        $applyReason->setLabel('Why are you applying for this job?:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $specialExperience = new \Zend_Form_Element_Textarea($formName . 'special_experience');
        $specialExperience->setLabel('What skills and/or special experience do you have that makes you suitable for this role?:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $strengths = new \Zend_Form_Element_Textarea($formName . 'strengths');
        $strengths->setLabel('What  are your strengths?:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $this->addElements([
            $name, $email, $number, $address, $message,
            $workPermits, $applyReason, $specialExperience, $strengths
        ]);
    }

    /**
     * @param $formName
     * @return array
     * @throws \Zend_Form_Exception
     */
    private function setupEducationAndTrainingForm($formName)
    {
        $qualificationOne = new \Zend_Form_Element_Checkbox($formName . 'qualification_one');
        $qualificationOne->setLabel('NVQ L2 in Care');

        $qualificationTwo = new \Zend_Form_Element_Checkbox($formName . 'qualification_two');
        $qualificationTwo->setLabel('NVQ L3 in Care');

        $qualificationThree = new \Zend_Form_Element_Checkbox($formName . 'qualification_three');
        $qualificationThree->setLabel('NVQ L4 in Care');

        $qualificationFour = new \Zend_Form_Element_Checkbox($formName . 'qualification_four');
        $qualificationFour->setLabel('RMA or LMCS');

        $qualificationFive = new \Zend_Form_Element_Checkbox($formName . 'qualification_five');
        $qualificationFive->setLabel('NVQ in Cleaning & Supporting Services');

        $qualificationSix = new \Zend_Form_Element_Checkbox($formName . 'qualification_six');
        $qualificationSix->setLabel('Food Hygiene Certificate');

        $relevantQualifications = new \Zend_Form_Element_Textarea($formName . 'relevant_qualifications');
        $relevantQualifications->setLabel('Please list any other qualifications that are relevant to the job you are applying for:');

        $professionalBodies = new \Zend_Form_Element_Textarea($formName . 'professional_bodies');
        $professionalBodies->setLabel('Please give us details of any professional bodies that you are a member of:');

        $nurseDetails = new \Zend_Form_Element_Textarea($formName . 'nurse_details');
        $nurseDetails->setLabel('If you are a nurse please also let us have your pin and expiry date:');

        $this->addElements([
            $qualificationOne, $qualificationTwo, $qualificationThree, $qualificationFour,
            $qualificationFive, $qualificationSix, $relevantQualifications, $professionalBodies,
            $nurseDetails
        ]);
    }

    /**
     * @param $formName
     * @return array
     * @throws \Zend_Form_Exception
     */
    private function setupPersonalDetailsTwoForm($formName)
    {
        $recentCompanyName = new \Zend_Form_Element_Text($formName . 'recent_company_name');
        $recentCompanyName->setLabel('Company:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $recentCompanyPosition = new \Zend_Form_Element_Text($formName . 'recent_company_position');
        $recentCompanyPosition->setLabel('Position:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $recentCompanyAddress = new \Zend_Form_Element_Text($formName . 'recent_company_address');
        $recentCompanyAddress->setLabel('Address:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $recentCompanyNumber = new \Zend_Form_Element_Text($formName . 'recent_company_number');
        $recentCompanyNumber->setLabel('Phone No:')
            ->addValidator('NotEmpty', true)
            ->addValidator('Digits')
            ->setRequired(true);

        $recentCompanyEmail = new \Zend_Form_Element_Text($formName . 'recent_company_email');
        $recentCompanyEmail->setLabel('Email:')
            ->addValidator('NotEmpty', true)
            ->addValidator('EmailAddress')
            ->addFilter('StringToLower')
            ->setRequired(true);

        $fromDate = new \Zend_Form_Element_Text($formName . 'recent_company_from_date');
        $fromDate->setLabel('From (MM/YYYY):')
            ->addValidator('NotEmpty', true)
            ->setAttrib('class', 'date_picker')
            ->setRequired(true);

        $toDate = new \Zend_Form_Element_Text($formName . 'recent_company_to_date');
        $toDate->setLabel('To (MM/YYYY):')
            ->addValidator('NotEmpty', true)
            ->setAttrib('class', 'date_picker')
            ->setRequired(true);

        $reasonForLeaving = new \Zend_Form_Element_Textarea($formName . 'reason_for_leaving');
        $reasonForLeaving->setLabel('Reason for leaving:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $recentCompanyNameTwo = new \Zend_Form_Element_Text($formName . 'recent_company_name_two');
        $recentCompanyNameTwo->setLabel('Company:');

        $recentCompanyPositionTwo = new \Zend_Form_Element_Text($formName . 'recent_company_position_two');
        $recentCompanyPositionTwo->setLabel('Position:');

        $recentCompanyAddressTwo = new \Zend_Form_Element_Text($formName . 'recent_company_address_two');
        $recentCompanyAddressTwo->setLabel('Address:');

        $recentCompanyNumberTwo = new \Zend_Form_Element_Text($formName . 'recent_company_number_two');
        $recentCompanyNumberTwo->setLabel('Phone No:')
            ->addValidator('Digits');

        $recentCompanyEmailTwo = new \Zend_Form_Element_Text($formName . 'recent_company_email_two');
        $recentCompanyEmailTwo->setLabel('Email:')
            ->addValidator('EmailAddress')
            ->addFilter('StringToLower');

        $fromDateTwo = new \Zend_Form_Element_Text($formName . 'recent_company_from_date_two');
        $fromDateTwo->setLabel('From (MM/YYYY):')
            ->setAttrib('class', 'date_picker');

        $toDateTwo = new \Zend_Form_Element_Text($formName . 'recent_company_to_date_two');
        $toDateTwo->setLabel('To (MM/YYYY):')
            ->setAttrib('class', 'date_picker');

        $reasonForLeavingTwo = new \Zend_Form_Element_Textarea($formName . 'reason_for_leaving_two');
        $reasonForLeavingTwo->setLabel('Reason for leaving:');

        $this->addElements([
            $recentCompanyName, $recentCompanyNameTwo, $recentCompanyPosition, $recentCompanyPositionTwo,
            $recentCompanyAddress, $recentCompanyAddressTwo, $recentCompanyEmail, $recentCompanyEmailTwo,
            $fromDate, $fromDateTwo, $toDate, $toDateTwo, $reasonForLeaving, $reasonForLeavingTwo
        ]);
    }

    /**
     * @param $formName
     * @return array
     * @throws \Zend_Form_Exception
     */
    private function setupReferencesForm($formName)
    {
        $referencesCompanyOne = new \Zend_Form_Element_Text($formName . 'references_company_one');
        $referencesCompanyOne->setLabel('Company:');

        $referencesContactOne = new \Zend_Form_Element_Text($formName . 'references_contact_one');
        $referencesContactOne->setLabel('Contact Name:');

        $referencesPositionOne = new \Zend_Form_Element_Text($formName . 'references_position_one');
        $referencesPositionOne->setLabel('Position:');

        $referencesAddressOne = new \Zend_Form_Element_Text($formName . 'references_address_one');
        $referencesAddressOne->setLabel('Address:');

        $referencesTelephoneOne = new \Zend_Form_Element_Text($formName . 'references_telephone_one');
        $referencesTelephoneOne->setLabel('Telephone:');

        $referencesCompanyEmailOne = new \Zend_Form_Element_Text($formName . 'references_email_one');
        $referencesCompanyEmailOne->setLabel('Email:')
            ->addValidator('EmailAddress')
            ->addFilter('StringToLower');

        $referencesCompanyTwo = new \Zend_Form_Element_Text($formName . 'references_company_two');
        $referencesCompanyTwo->setLabel('Company:');

        $referencesContactTwo = new \Zend_Form_Element_Text($formName . 'references_contact_two');
        $referencesContactTwo->setLabel('Contact Name:');

        $referencesPositionTwo = new \Zend_Form_Element_Text($formName . 'references_position_two');
        $referencesPositionTwo->setLabel('Position:');

        $referencesAddressTwo = new \Zend_Form_Element_Text($formName . 'references_address_two');
        $referencesAddressTwo->setLabel('Address:');

        $referencesTelephoneTwo = new \Zend_Form_Element_Text($formName . 'references_telephone_two');
        $referencesTelephoneTwo->setLabel('Telephone:');

        $referencesCompanyEmailTwo = new \Zend_Form_Element_Text($formName . 'references_email_two');
        $referencesCompanyEmailTwo->setLabel('Email:')
            ->addValidator('EmailAddress')
            ->addFilter('StringToLower');

        $referencesCompanyThree = new \Zend_Form_Element_Text($formName . 'references_company_three');
        $referencesCompanyThree->setLabel('Company:');

        $referencesContactThree = new \Zend_Form_Element_Text($formName . 'references_contact_three');
        $referencesContactThree->setLabel('Contact Name:');

        $referencesPositionThree = new \Zend_Form_Element_Text($formName . 'references_position_three');
        $referencesPositionThree->setLabel('Position:');

        $referencesAddressThree = new \Zend_Form_Element_Text($formName . 'references_address_three');
        $referencesAddressThree->setLabel('Address:');

        $referencesTelephoneThree = new \Zend_Form_Element_Text($formName . 'references_telephone_three');
        $referencesTelephoneThree->setLabel('Telephone:');

        $referencesCompanyEmailThree = new \Zend_Form_Element_Text($formName . 'references_email_three');
        $referencesCompanyEmailThree->setLabel('Email:')
            ->addValidator('EmailAddress')
            ->addFilter('StringToLower');

        $this->addElements([
            $referencesCompanyOne, $referencesCompanyTwo, $referencesCompanyThree,
            $referencesAddressOne, $referencesAddressTwo, $referencesAddressThree,
            $referencesPositionOne, $referencesPositionTwo, $referencesPositionThree,
            $referencesContactOne, $referencesCompanyTwo, $referencesCompanyThree,
            $referencesTelephoneOne, $referencesTelephoneTwo, $referencesTelephoneThree,
            $referencesCompanyEmailOne, $referencesCompanyEmailTwo, $referencesCompanyEmailThree, 
            $referencesContactTwo, $referencesContactThree
        ]);
    }

    /**
     * @param $formName
     * @return array
     * @throws \Zend_Form_Exception
     */
    private function setupMedicalForm($formName)
    {
        $medicalProblemOne = new \Zend_Form_Element_Checkbox($formName . 'medical_problem_one');
        $medicalProblemOne->setLabel('Heart trouble');

        $medicalProblemTwo = new \Zend_Form_Element_Checkbox($formName . 'medical_problem_two');
        $medicalProblemTwo->setLabel('Heart trouble');

        $medicalProblemThree = new \Zend_Form_Element_Checkbox($formName . 'medical_problem_three');
        $medicalProblemThree->setLabel('Heart trouble');

        $medicalProblemFour = new \Zend_Form_Element_Checkbox($formName . 'medical_problem_four');
        $medicalProblemFour->setLabel('Lung trouble');

        $medicalProblemFive = new \Zend_Form_Element_Checkbox($formName . 'medical_problem_five');
        $medicalProblemFive->setLabel('Lung trouble');

        $medicalProblemSix = new \Zend_Form_Element_Checkbox($formName . 'medical_problem_six');
        $medicalProblemSix->setLabel('Lung trouble');

        $medicalProblemSeven = new \Zend_Form_Element_Checkbox($formName . 'medical_problem_seven');
        $medicalProblemSeven->setLabel('Stomach trouble');

        $medicalProblemEight = new \Zend_Form_Element_Checkbox($formName . 'medical_problem_eight');
        $medicalProblemEight->setLabel('Stomach trouble');

        $medicalProblemNine = new \Zend_Form_Element_Checkbox($formName . 'medical_problem_nine');
        $medicalProblemNine->setLabel('Stomach trouble');

        $medicalImpairmentOne = new \Zend_Form_Element_Checkbox($formName . 'medical_impairment_one');
        $medicalImpairmentOne->setLabel('Do you have any impairment that has a substantial long term adverse effect on your ability to carry out day-to-day activities?');

        $medicalImpairmentTwo = new \Zend_Form_Element_Checkbox($formName . 'medical_impairment_two');
        $medicalImpairmentTwo->setLabel('Do you have any impairment that has a substantial long term adverse effect on your ability to carry out day-to-day activities?');

        $medicalImpairmentThree = new \Zend_Form_Element_Checkbox($formName . 'medical_impairment_three');
        $medicalImpairmentThree->setLabel('Do you have any impairment that has a substantial long term adverse effect on your ability to carry out day-to-day activities?');

        $medicalImpairmentReasons = new \Zend_Form_Element_Textarea($formName . 'medical_impairment_reasons');
        $medicalImpairmentReasons->setLabel('If you answered yes to any of the above questions please provide further details:');

        $this->addElements([
            $medicalProblemOne, $medicalProblemTwo, $medicalProblemThree, $medicalProblemFour,
            $medicalProblemFive, $medicalProblemSix, $medicalProblemSeven, $medicalProblemEight,
            $medicalProblemNine, $medicalImpairmentOne, $medicalImpairmentTwo, $medicalImpairmentThree,
            $medicalImpairmentReasons
        ]);
    }

    /**
     * @param $formName
     * @return array
     * @throws \Zend_Form_Exception
     */
    private function setupCompleteForm($formName)
    {
        $agree = new \Zend_Form_Element_Checkbox($formName . 'agree_statement');
        $agree->setLabel('If you agree to the above statements please tick this box and type name below:')
            ->setRequired(true);

        $signature = new \Zend_Form_Element_Text($formName . 'signature');
        $signature->setLabel('Confirm name:')
            ->addValidator('NotEmpty', true)
            ->setRequired(true);

        $keepOnFile = new \Zend_Form_Element_Checkbox($formName . 'keep_on_file');
        $keepOnFile->setLabel('If you do not want us to keep your details on file for six months for future job opportunities please tick');

        $this->addElements([
            $agree, $signature, $keepOnFile
        ]);
    }
}