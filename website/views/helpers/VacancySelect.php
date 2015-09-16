<?php

class Zend_View_Helper_VacancySelect extends Zend_View_Helper_Abstract
{
    public function vacancySelect()
    {
        $vacancy = new Object_Vacancy_List();
        $vacancy->setOrderKey("roleTitle");

        foreach ($vacancy as $home) {
            $vacancyAssociativeArray[] = [
                $home->getId(),
                sprintf('%s %s', $home->getRoleTitle() . ",", $home->getCareHomes()[0]->getTitle())
            ];
        }
        return $vacancyAssociativeArray;
    }
}