<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;

class RoleController extends Controller
{
    /**
     * Retrieve available user roles.
     *
     * Returns a list of all possible roles defined in the system.
     *
     * @group Roles
     *
     * @authenticated
     *
     * @response 200 {
     *   "roles": [
     *     "Admin",
     *     "Travel agent",
     *     "User"
     *   ]
     * }
     */
    public function getRoles()
    {
        return response()->json([
            'roles' => RoleEnum::cases()
        ]);
    }
}
