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
        $this->view->paginator = $paginator;
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

                $shouldDownloadBrochure = $values['delivery_method_options'] === "1" ? true : false;

                $careHomeId = $values['care_home_options'];

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
                    $careHome = Object_CareHomes::getById($careHomeId);

                    $brochure = $careHome->getBrochure();

                    if ($brochure !== null || $brochure) {
                        $brochureId = $brochure->getId();
                        $this->getResponse()->setRedirect('/thank-you?id=' . $brochureId);
                    } else {
                        $this->getResponse()->setRedirect('/thank-you');
                    }
                }

            } else if ($enquiryForm->isValid($request->getPost())) {
                $values = $enquiryForm->getValues();
                $view->data = $values;
                $html = $view->render('enquiry.php');
                $mail->addTo($this->config->enquiry_email);
                $this->getResponse()->setRedirect('/thank-you?');
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

                // Receive the file upload. This needs to be done before getValues() is called
                // Otherwise the filenames are messed up and the upload will return as null if attempted to
                // Be retrieved using the form element name
                // This also returns the filename of the upload to use later
                $cvFilename = $this->receiveFileUpload($request);

                // Get posted form values
                $values = $applicationForm->getValues();

                // Set the care homes select box to use human readable names for the options box.
                // Makes them more readable in the emails
                $values['application_careHomes'] = $this->getMultiOptionByName($values, $applicationForm,
                    'application_careHomes');

                // Same for the vacancies
                $values['application_vacancyRoles'] = $this->getMultiOptionByName($values, $applicationForm,
                    'application_vacancyRoles');

                // Since we called getValues() the filename of the uploaded file is no longer in the variable for this
                // So we reset it to the filename now
                $values['application_cvFile'] = $cvFilename;

                // Assign form data to view
                $view->data = $values;

                // Email template to render
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
                $values['bookAVisitForm_careHomes'] = $this->getMultiOptionByName($values, $bookAVisitForm, 'bookAVisit_careHomes');
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
        // Downloads a brochure if a parameter is given
        $brochure = $this->getRequest()->getParams()['id'];
        if ($brochure !== null || $brochure) {
            echo "<script type = 'text/javascript'>window.open('/download/" . $brochure . "/','_blank');</script>";
        }
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
    private function getMultiOptionByName($values, $form, $formElement)
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
     * Receives the file upload from the request passed via the forms
     * @param $request  The HTTP request
     * @return string  The filename of the uploaded file
     * @throws Zend_File_Transfer_Exception
     */
    private function receiveFileUpload($request)
    {

        // Hard coded CV folder
        $cvFolder = 'var/cv_uploads/';

        // Create this folder if it does not exist
        if (!file_exists('' . $cvFolder . '')) {
            mkdir($cvFolder, 0777, true);
        }

        // Get the name from the application form in order to build a new name for the uploaded CV
        $application_name = $request->getParams()['application_name'];

        // Strip any white space
        $fileName = str_replace(' ', '', $application_name);

        // Get a new file transfer object
        $upload = new Zend_File_Transfer_Adapter_Http();

        // Get the extension of the uploaded file. We need this because we will be renaming the file ourselves and
        // Therefore need to use the original extension
        $extensionSplit = explode('.', $upload->getFilename());
        $extensionSplitLength = sizeof($extensionSplit);
        $extension = "." . $extensionSplit[$extensionSplitLength - 1];

        // Suffix of the file. Add an underscore, the datestamp and _cv_upload
        $fileSuffix = '_' . date('MdYHis') . '_cv_upload';

        // Rename the file
        $upload->addFilter('Rename', $cvFolder . $fileName . $fileSuffix . $extension);

        // Create the file. This retrieves it from the tmp folder and renames it
        $upload->receive();

        // Return the filename
        return $fileName . $fileSuffix . $extension;
    }
}
