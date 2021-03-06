<?php
namespace Mvc;

use Mvc\Lib\Lang;

class Core
{
    const APP_ID_DRIVING_SCHOOL = 602;
    const APP_ID_TRANSPORT      = 603;
    const APP_ID_Mvc_PLUS    = 605;
    const APP_ID_UNIVERSITIES   = 606;
    const APP_ID_TAXI           = 607;
    const APP_ID_DENTAL_CLINIC  = 608;

    public static function getServices() {
        $services = [
            [
                'title' => Lang::get('MvcPlus', 'Mvc Plus'),
                'id'    => self::APP_ID_Mvc_PLUS,
            ],
            [
                'title' => Lang::get('Transport', 'Transport'),
                'id'    => self::APP_ID_TRANSPORT,
            ],
            [
                'title' => Lang::get('DrivingSchool', 'Driving School'),
                'id'    => self::APP_ID_DRIVING_SCHOOL,
            ],
            [
                'title' => Lang::get('Universities', 'Universities'),
                'id'    => self::APP_ID_UNIVERSITIES,
            ],
            [
                'title' => Lang::get('Taxi', 'Taxi'),
                'id'    => self::APP_ID_TAXI,
            ],
            [
                'title' => Lang::get('DentalClinic', 'Dental Clinic'),
                'id'    => self::APP_ID_DENTAL_CLINIC,
            ],
        ];
        return $services;
    }
}
