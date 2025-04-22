<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'Admin';
    case TRAVEL_AGENT = 'Travel agent';
    case USER = 'User';
}
