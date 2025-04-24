<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * Authenticates a user using email and password. If successful, returns a new access token.
     *
     * @group Authentication
     *
     * @bodyParam email string required The user's email address. Example: user@example.com
     * @bodyParam password string required The user's password. Example: secret123
     *
     * @response 200 {
     *   "success": true,
     *   "message": "Login successful.",
     *   "token": "1|vQ2mHWrXyUXYlvyoUreJ8vZFZ6aPzYv0w0..."
     * }
     *
     * @response 401 {
     *   "success": false,
     *   "message": "The provided credentials do not match our records."
     * }
     */

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'success' => true,
                'message' => 'Login successful.',
                'token' => Auth::user()->createToken('authToken')->plainTextToken,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'The provided credentials do not match our records.',
        ], 401);
    }

    /**
     * Log the authenticated user out.
     *
     * Revokes all access tokens for the authenticated user.
     *
     * @group Authentication
     *
     * @authenticated
     *
     * @response 200 {
     *   "success": true,
     *   "message": "Logout successful."
     * }
     */

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json([
            'success' => true,
            'message' => 'Logout successful.',
        ]);
    }
}
