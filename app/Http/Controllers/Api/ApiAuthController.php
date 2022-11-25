<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller {

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (($user->tokens()->where('tokenable_id', $user->id)->count()) != 0) {
            $user->tokens()->where('tokenable_id', $user->id)->delete();
        }

        $token = $user->createToken($user->username . "-token")->plainTextToken;

        return ApiResponse::LoginResponse('success', 'Login has been successful', $token, $user, 200);
        return response()->json([
            'status' => 200,
            'message' => "Login successfull",
            'user' => $user,
            'token' => $token
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required|"
        ]);

        $user = User::where('email', $request->email)->first();

        try {
            if (Auth::attempt($credentials)) {
                // $request->session()->regenerate();

                $token = $user->createToken($user->username . "-token")->plainTextToken;

                return response()->json([
                    'status' => 200,
                    'message' => "Login successfull",
                    'user' => $user,
                    'token' => $token
                ], 200);
            } else {
                return response()->json([
                    'status' => 300,
                    'message' => "Login failed"
                ], 300);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }
}