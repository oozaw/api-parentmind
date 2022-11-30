<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return ApiResponse::loginResponse(true, 'Login has been successful', $token, $user, 200);
    }

    public function register(Request $request) {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "username" => ['required', 'min:5', 'max:20', 'unique:users'],
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:6|max:255"
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return ApiResponse::response(true, "Register has been successful", 200);
    }
}