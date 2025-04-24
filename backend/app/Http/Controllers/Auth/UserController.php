<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Retrieve the authenticated user's profile.
     *
     * Returns the currently logged-in user's information.
     *
     * @group Authentication
     *
     * @authenticated
     *
     * @response 200 {
     *      "id": "1"
     *      "first_name": "Jody",
     *      "last_name": "Mante",
     *      "email": "jody.mante@example.com",
     *      "email_verified_at": "2025-04-23T19:49:55.000000Z",
     *      "role": "Admin",
     *      "created_at": "2025-04-24T08:39:31.000000Z",
     *      "updated_at": "2025-04-24T08:39:31.000000Z",
     *      "deleted_at": null,
     * }
     */

    public function show(Request $request)
    {
        $user = $request->user();

        return $user;
    }
}
