<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(loginRequest $request)
    {
        $user = User::where("email", $request->email)->first();
        if (!$user) {
            return response()->json(
                [
                    "status" => "error",
                    "message" => ""
                ],
            );
        }
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json([
            "data" => ['token' => $token, 'user' => $user],
            "status" => "success"
        ], 200);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user->password != $request->password) {
            return response()->json(
                [
                    "status" => "error",
                    "message" => ""
                ],
            );
        }
        $user->delete();
        return response()->json([
            "status" => "success"
        ], 200);
    }
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            "email" => $request->email,
            "password" => md5($request->password),
            "name" => $request->name
        ]);

        return response()->json([
            "status" => "success"
        ], 200);
    }
}
