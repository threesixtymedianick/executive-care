<?php

use Website\Controller\PageController as AbstractPageController;
use Website\Form\ContactUsForm as ContactUsForm;
use Website\Form\BrochureForm as BrochureForm;
use Website\Form\ApplicationForm as ApplicationForm;
use Website\Form\VolunteerForm as VolunteerForm;
use Website\Form\BookAVisitForm as BookAVisitForm;

class PageController extends AbstractPageController
{
    /**
     * [homeAction description]
     * @return [type] [description]
     */
    public function homeAction()
    {

    }

    /**
     * [aboutUsAction description]
     * @return [type] [description]
     */
    public function aboutUsAction()
    {

    }

    /**
     * Careers index page
     *
     * @return
     */
    public function careersAction()
    {
        $vacancy = new Object\Vacancy\Listing();
        $vacancy->setOrderKey("roleTitle");
        $vacancy->setOrder("asc");


        $paginator = Zend_Paginator::factory($vacancy);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $paginator->setItemCountPerPage(12);
        $this->view->paginator  = $paginator;
    }

    /**
     * [ourCareAction description]
     * @return [type] [description]
     */
    public function ourCareAction()
    {

    }

    /**
     * [ourCareAction description]
     * @return [type] [description]
     */
    public function ourCareTestimonialsAction()
    {

    }

    /**
     * [ourCareAction description]
     * @return [type] [description]
     */
    public function ourCareHomeInitiativesAction()
    {

    }

    /**
     * Contact Us page
     *
     * @return
     */
    public function contactUsAction()
    {
        $brochureForm = new BrochureForm();

        $enquiryForm = new ContactUsForm();

        $request = $this->getRequest();

        if ($request->isPost()) {
            // Create a new Zend View object
            $view = new \Zend_View();

            // Setup the location of our email templates
            $view->setScriptPath('website/views/scripts/email');

            // Create a new PimCore Mail object
            $mail = new \Pimcore\Mail();

            if ($brochureForm->isValid($request->getPost())) {
                // Get the values from the form
                $values = $brochureForm->getValues();

                $shouldDownloadBrochure = $values['delivery_method_options'] === "1";

                $values['care_home_options'] = $this->getMultiOptionByName($values, $brochureForm, 'care_home_options');

                // Set the values to the view
                //  in a variable called data
                $view->data = $values;

                // Send to a template
                $html = $view->render('brochure-request.php');

                // Add our email address for this form
                $mail->addTo($this->config->brochure_email);

                if (!$shouldDownloadBrochure) {
                    $this->getResponse()->setRedirect('/thank-you');
                } else {
                    $careHomeId = $values['care_home_options'];
                    $this->downloadBrochure($careHomeId);
                }

            } else if ($enquiryForm->isValid($request->getPost())) {
                $values = $enquiryForm->getValues();
                $view->data = $values;
                $html = $view->render('enquiry.php');
                $mail->addTo($this->config->enquiry_email);
                $this->getResponse()->setRedirect('/thank-you');
            }

            $mail->setBodyHtml($html);

            $mail->send();
        }

        $this->view->brochureForm = $brochureForm;

        $this->view->enquiryForm = $enquiryForm;
    }

    public function careersApplyOnlineAction()
    {
        $applicationForm = new ApplicationForm();

        $request = $this->getRequest();

        if ($request->isPost()) {
            // Create a new Zend View object
            $view = new \Zend_View();

            // Setup the location of our email templates
            $view->setScriptPath('website/views/scripts/email');

            // Create a new PimCore Mail object
            $mail = new \Pimcore\Mail();

            if ($applicationForm->isValid($request->getPost())) {
                // Get posted form values
                $values = $applicationForm->getValues();

                $values['application_careHomes'] = $this->getMultiOptionByName($values, $applicationForm, 'application_careHomes');
                $values['application_vacancyRoles'] = $this->getMultiOptionByName($values, $applicationForm, 'application_vacancyRoles');

                // Assign form data to view
                $view->data = $values;
                $html = $view->render('application.php');

                // Send the email
                $mail->addTo($this->config->application_email);

                $mail->setBodyHtml($html);

                $mail->send();

                $this->getResponse()->setRedirect('/thank-you');
            }
        }

        $this->view->applicationForm = $applicationForm;
    }

    /**
     * [volunteerAction description]
     * @return [type] [description]
     */
    public function volunteerAction()
    {
        $volunteerForm = new VolunteerForm();

        $request = $this->getRequest();

        if ($request->isPost()) {
            // Create a new Zend View object
            $view = new \Zend_View();

            // Setup the location of our email templates
            $view->setScriptPath('website/views/scripts/email');

            // Create a new PimCore Mail object
            $mail = new \Pimcore\Mail();

            if ($volunteerForm->isValid($request->getPost())) {
                $values = $volunteerForm->getValues();
                $view->data = $values;
                $html = $view->render('volunteer.php');
                $mail->addTo($this->config->enquiry_email);
            }

            $mail->setBodyHtml($html);

            $mail->send();

            $this->getResponse()->setRedirect('/thank-you');
        }

        $this->view->volunteerForm = $volunteerForm;
    }

    /**
     * [trainingDevelopmentAction description]
     * @return [type] [description]
     */
    public function trainingDevelopmentAction()
    {

    }

    /**
     * [whyWorkForExecccareAction description]
     * @return [type] [description]
     */
    public function whyWorkForExecccareAction()
    {

    }

    /**
     * [bookAVisitAction description]
     * @return [type] [description]
     */
    public function bookAVisitAction()
    {
        $bookAVisitForm = new BookAVisitForm();

        $request = $this->getRequest();

        if ($request->isPost()) {
            // Create a new Zend View object
            $view = new \Zend_View();

            // Setup the location of our email templates
            $view->setScriptPath('website/views/scripts/email');

            // Create a new PimCore Mail object
            $mail = new \Pimcore\Mail();

            if ($bookAVisitForm->isValid($request->getPost())) {
                $values = $bookAVisitForm->getValues();
                $values['bookAVisitForm_careHomes'] = $this->getMultiOptionByName($values, $bookAVisitForm, 'bookAVisitForm_careHomes');
                $view->data = $values;
                $html = $view->render('book.php');
                $mail->addTo($this->config->enquiry_email);
            }

            $mail->setBodyHtml($html);

            $mail->send();

            $this->getResponse()->setRedirect('/thank-you');
        }

        $this->view->bookAVisitForm = $bookAVisitForm;
    }

    public function thankYouAction()
    {

    }

    /**
     * Gets the name value from a multioption field rather than the Id
     *
     * Used to display in form email templates
     *
     * @param $values  The form values to check
     * @param $form  The particular form to get the values from
     * @param $formElement  The form element which is a multi options
     * @return mixed  The returned values
     */
    private function getMultiOptionByName ($values, $form, $formElement)
    {
        $id = $values[$formElement];

        $element = $form->getElement($formElement);
        if (!$element instanceof \Zend_Form_Element_Select || null === $element) {
            return false;
        }

        $options = $element->getMultiOptions();

        return $values[$formElement] = $options[$id];
    }

    /**
     * Fires off a download of the brochure for the supplied care home
     * @param $careHomeId  The care home ID to query and download the brochure
     * @throws Zend_Controller_Action_Exception
     */
    private function downloadBrochure($careHomeId)
    {
        $careHome = Object_CareHomes::getById($careHomeId);

        $brochure = $careHome->getBrochure();

        if ($brochure !== null || !$brochure) {
            $careHomeLink = $brochure->getFullPath();
            $this->getResponse()->setRedirect('/download' . $careHomeLink);
        } else {
            throw new Zend_Controller_Action_Exception('This file does not exist', 404);
        }
    }
}
