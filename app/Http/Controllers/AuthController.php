<?php

namespace App\Http\Controllers;

use App\DataObjects\UserCredentialsDataObject;
use App\DataObjects\UserDataObject;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Service\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(public AuthService $authService)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(LoginRequest $request)
    {
        $requestCredentials = new UserCredentialsDataObject(
            email: $request->input('email'),
            password: $request->input('password'),
        );
        
        $response = $this->authService->login($requestCredentials);
        return response()->json($response);
    }


    public function register(RegisterRequest $request): JsonResponse
    {
        $requestCredentials = UserDataObject::buildFromInput(
            name: $request->input('name'),
            email: $request->input('email'),
            password: $request->input('password'),
        );

        $response = $this->authService->register($requestCredentials);
        return response()->json(status: 201, data: $response);
    }

    public function logout()
    {
        $this->authService->logout();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function refresh()
    {
        $response = $this->authService->refresh();
        return response()->json($response, 201);
    }
}