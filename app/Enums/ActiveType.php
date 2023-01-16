<?php

namespace App\Enums;

enum ActiveType: string {

    use BaseEnum;
    
    case TRUE = '1';
    case FALSE = '0';

}