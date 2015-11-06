<?php

class Zend_View_Helper_VacancySelect extends Zend_View_Helper_Abstract
{
    /**
     * @return array
     */
    public function vacancySelect()
    {
        $vacancies = new Object_VacancyRole_List();

        if (!$vacancies instanceof Pimcore\Model\Object\VacancyRole\Listing) {
            return [];
        }

        $vacancies->setOrderKey("name");

        foreach ($vacancies as $vacancy) {
            $vacancyAssociativeArray[] = [
                $vacancy->getId(),
                $vacancy->getName()
            ];
        }
        return $vacancyAssociativeArray;
    }
}
