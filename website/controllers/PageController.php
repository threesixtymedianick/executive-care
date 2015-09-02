<?php

use Website\Controller\PageController as AbstractPageController;
use Website\Form\ContactUsForm as ContactUsForm;
use Website\Form\BrochureForm as BrochureForm;
use Website\Form\ApplicationForm as ApplicationForm;
use Website\Form\VolunteerForm as VolunteerForm;

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

    public function careersAction()
    {

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
     * [ourHomesAction description]
     * @return [type] [description]
     */
    public function ourHomesAction()
    {

    }

    /**
     * [ourHomesAction description]
     * @return [type] [description]
     */
    public function singleHomeAction()
    {
        $careHomeCategory = Object_CareHomes::getById(17);
        $this->view->careHomeObject = $careHomeCategory;
    }

    /**
     * [contactUsAction description]
     * @return [type] [description]
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

                // Set the values to the view
                //  in a variable called data
                $view->data = $values;

                // Send to a template
                $html = $view->render('brochure-request.php');

                // Add our email address for this form
                $mail->addTo($this->config->brochure_email);

            } else if ($enquiryForm->isValid($request->getPost())) {
                $values = $enquiryForm->getValues();
                $view->data = $values;
                $html = $view->render('enquiry.php');
                $mail->addTo($this->config->enquiry_email);
            }

            $mail->setBodyHtml($html);

            $mail->send();
        }

        $this->view->brochureForm = $brochureForm;

        $this->view->enquiryForm = $enquiryForm;
    }

    /**
     *
     */
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

                // Assign form data to view
                $view->data = $values;
                $html = $view->render('application.php');

                // Send the email
                $mail->addTo($this->config->application_email);

                $mail->setBodyHtml($html);

                $mail->send();
            }
        }

        $this->view->applicationForm = $applicationForm;
    }

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
                $html = $view->render('enquiry.php');
                $mail->addTo($this->config->enquiry_email);
            }

            $mail->setBodyHtml($html);

            $mail->send();
        }

        $this->view->volunteerForm = $volunteerForm;
    }

    public function trainingDevelopmentAction()
    {
        
    }
}
