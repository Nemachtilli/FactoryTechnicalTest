<?php

namespace App\Enums;

enum PlanType: string {

    use BaseEnum;
    
    case MENSUAL = 'Mensual';
    case SEMESTRAL = 'semestral';
    case ANUAL = 'Anual';

}