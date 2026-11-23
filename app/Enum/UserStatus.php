<?php

namespace App\Enum;

enum UserStatus: string
{
    case ACTIVATED   = 'activated';
    case DEACTIVATED  = 'deactivated';
}
