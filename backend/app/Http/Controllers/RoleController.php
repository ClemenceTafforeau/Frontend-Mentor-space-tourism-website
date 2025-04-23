<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;

class RoleController extends Controller
{
    public function getRoles()
    {
        return response()->json([
            'roles' => RoleEnum::cases()
        ]);
    }
}
