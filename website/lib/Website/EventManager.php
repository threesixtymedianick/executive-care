<?php
namespace Website;

use Website\EventHandler\CareHomeEventHandler;
use Zend_EventManager_EventManager;
use Zend_EventManager_Exception_InvalidArgumentException;

class EventManager
{
    /**
     * @var Zend_EventManager_EventManager
     */
    protected $eventManager;

    /**
     *
     * @var CareHomeEventHandler|null
     */
    protected $careHomeEventHandler;

    /**
     *
     * @param Zend_EventManager_EventManager $eventManager
     * @param CareHomeEventHandler|null $CareHomeEventHandler
     */
    public function __construct(
        Zend_EventManager_EventManager $eventManager,
        CareHomeEventHandler $careHomeEventHandler = null
    ) {
        $this->eventManager = $eventManager;
        $this->careHomeEventHandler = $careHomeEventHandler;
    }

    /**
     * @throws Zend_EventManager_Exception_InvalidArgumentException
     */
    public function registerEvents()
    {
        if ($this->careHomeEventHandler instanceof CareHomeEventHandler) {
            // move archived documents to a folder
            $this->eventManager->attach(
                'object.postUpdate',
                [$this->careHomeEventHandler, 'onPostUpdate']
            );
        }
    }
}
