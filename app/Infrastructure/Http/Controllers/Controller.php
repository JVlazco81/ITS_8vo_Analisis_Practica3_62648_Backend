<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\Auth\UseCases\RegisterUser;
use App\Application\Auth\UseCases\LoginUser;
use App\Application\Auth\UseCases\LogoutUser;
use Illuminate\Http\Request;

class Controller
{
    public function register(Request $request, RegisterUser $registerUser)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $fullName = trim($request->first_name . ' ' . $request->last_name);

        $user = $registerUser->execute(
            $request->name,
            $request->email,
            $request->password
        );

        return response()->json([
            'message' => 'User registered successfully',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ]
        ], 201);
    }

    public function login(Request $request, LoginUser $loginUser)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            $token = $loginUser->execute($request->email, $request->password);

            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401);
        }
    }

    public function logout(LogoutUser $logoutUser)
    {
        try {
            $logoutUser->execute();

            return response()->json(['message' => 'Logged out successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Logout failed.'], 500);
        }
    }
}
