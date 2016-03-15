<?php
namespace Website\Controller;

class AbstractController extends \Pimcore_Controller_Action_Frontend
{
    /**
     * @var \Zend_Locale
     */
    protected $locale;

    /**
     * @return \Zend_Locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param \Zend_Locale $locale
     */
    public function setLocale(\Zend_Locale $locale)
    {
        $this->locale = $locale;
    }

    public function init()
    {
        parent::init();

        if (\Zend_Registry::isRegistered("Zend_Locale")) {
            $locale = \Zend_Registry::get("Zend_Locale");
        } else {
            $locale = new \Zend_Locale("en");
            \Zend_Registry::set("Zend_Locale", $locale);
        }

        $this->setLocale($locale);
    }
}
