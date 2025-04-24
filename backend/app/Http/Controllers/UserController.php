<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Retrieve all users.
     *
     * Returns the full list of users without pagination.
     *
     * @group Users
     *
     * @authenticated
     *
     * @response 200 [
     *   {
     *      "id": "1"
     *      "first_name": "Jody",
     *      "last_name": "Mante",
     *      "email": "jody.mante@example.com",
     *      "email_verified_at": "2025-04-23T19:49:55.000000Z",
     *      "role": "Admin",
     *      "created_at": "2025-04-24T08:39:31.000000Z",
     *      "updated_at": "2025-04-24T08:39:31.000000Z",
     *      "deleted_at": null,
     *   },
     *   ...
     * ]
     */

    public function list(): Collection
    {
        $users = User::all();

        return $users;
    }

    /**
     * Retrieve a paginated list of users
     *
     * @group Users
     *
     * @authenticated
     *
     * @queryParam page int Page number for pagination. Example: 1
     * @queryParam per_page int Number of items per page. Example: 10
     *
     * @response 200 {
     *   "current page": 1
     *   "data": [
     *      {
     *          "id": "1"
     *          "first_name": "Jody",
     *          "last_name": "Mante",
     *          "email": "jody.mante@example.com",
     *          "email_verified_at": "2025-04-23T19:49:55.000000Z",
     *          "role": "Admin",
     *          "created_at": "2025-04-24T08:39:31.000000Z",
     *          "updated_at": "2025-04-24T08:39:31.000000Z",
     *          "deleted_at": null,
     *      },
     *   ],
     *   "first_page_url": "",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": ,
     *   "links": [
     *      {
     *          "label": "&laquo; Previous",
     *          "active": false,
     *          "url": null
     *      },
     *      ...
     *   ],
     *   "next_page_url": null,
     *   "path": "",
     *   "per_page": 10,
     *   "prev_page_url": null,
     *   "to": 5,
     *   "total": 5
     * }
     */

    public function index(): LengthAwarePaginator
    {
        $users = User::paginate();

        return $users;
    }

    /**
     * Retrieve details of a specific user.
     *
     * @group Users
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the user. Example: 1
     *
     * @response 200 {
     *     "id": "1"
     *     "first_name": "Jody",
     *     "last_name": "Mante",
     *     "email": "jody.mante@example.com",
     *     "email_verified_at": "2025-04-23T19:49:55.000000Z",
     *     "role": "Admin",
     *     "created_at": "2025-04-24T08:39:31.000000Z",
     *     "updated_at": "2025-04-24T08:39:31.000000Z",
     *     "deleted_at": null,
     * },
     */

    public function show($id): JsonResponse
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Create a new user.
     *
     * Requires valid user data in the request body.
     * The user must be authenticated via Sanctum.
     *
     * @group Users
     *
     * @authenticated
     *
     * @bodyParam first_name string required The first name of the user. Example: John
     * @bodyParam last_name string required The last name of the user. Example: Doe
     * @bodyParam email string required The email address of the user. Example: john.doe@example.com
     * @bodyParam role string required The role of the user. Example: Admin
     * @bodyParam password string required The password of the user. Example: password123
     * @bodyParam password_confirmation string required The password of the user (has to match the first password field). Example: password123
     *
     * @response 201 {
     *   "message": "User created successfully",
     *   "user": {
     *       "first_name": "John",
     *       "last_name": "Doe",
     *       "email": "john.doe@example.com",
     *       "role": "Admin",
     *       "updated_at": "2025-04-24T08:39:31.000000Z",
     *       "created_at": "2025-04-24T08:39:31.000000Z",
     *       "id": "5"
     *   }
     * }
     */

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'email|required|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }

    /**
     * Update an existing user.
     *
     * @group Users
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the user. Example: 1
     * @bodyParam first_name string required The first name of the user. Example: John
     * @bodyParam last_name string required The last name of the user. Example: Doe
     * @bodyParam email string required The email address of the user. Example: john.doe@example.com
     * @bodyParam role string required The role of the user. Example: Admin
     * @bodyParam password string required The password of the user. Example: password123
     * @bodyParam password_confirmation string required The password of the user (has to match the first password field). Example: password123
     *
     * @response 201 {
     *      "message": "User updated successfully",
     *      "user": {
     *          "first_name": "John",
     *          "last_name": "Doe",
     *          "email": "john.doe@example.com",
     *          "role": "Admin",
     *          "updated_at": "2025-04-24T08:39:31.000000Z",
     *          "created_at": "2025-04-24T08:39:31.000000Z",
     *          "id": "5"
     *      }
     * }
     * }
     */

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => ['email', 'required', Rule::unique('users')->ignore($id)],
            'password' => 'nullable|string|confirmed|min:8',
            'password_confirmation' => 'nullable|string|same:password',
            'role' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }

    /**
     * Delete a user.
     *
     * @group Users
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the user. Example: 1
     *
     * @response 200 {
     *     "message": "User deleted successfully"
     * }
     */

    public function destroy(int $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}
