<?php

namespace App\Http\Controllers;

use App\DataObjects\Inputs\UserCredentialsInputDTO;
use App\DataObjects\Inputs\UserInputDTO;
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
        $requestCredentials = UserCredentialsInputDTO::buildFromRequest($request);
        
        $response = $this->authService->login($requestCredentials);
        return response()->json($response);
    }


    public function register(RegisterRequest $request): JsonResponse
    {
        $userInput = UserInputDTO::buildFromRequest($request);
        $response = $this->authService->register($userInput);

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
