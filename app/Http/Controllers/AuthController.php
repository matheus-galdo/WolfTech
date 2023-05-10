<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Service\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $response = AuthService::login($credentials);
            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 401);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $credentials = $request->only(['name', 'email', 'password']);
            $response = AuthService::register($credentials);
            return response()->json($response, 201);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 401);
        }
    }

    public function logout()
    {
        try {
            AuthService::logout();
            return response()->json(['message' => 'Successfully logged out'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["message" => $th->getMessage()], 401);
        }
    }

    public function refresh()
    {
        try {
            $response = AuthService::refresh();
            return response()->json($response, 201);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 400);
        }
    }
}
