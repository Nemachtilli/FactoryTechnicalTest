<?php

namespace App\Enums;

enum BusinessType: string {

    use BaseEnum;
    
    case OPERATIONAL = 'OPERATIONAL';
    case SEMESTRAL = 'CLOSED_PERMANENTLY';

}