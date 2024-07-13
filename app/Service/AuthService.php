<?php

namespace App\Service;

use App\DataObjects\Inputs\UserCredentialsInputDTO;
use App\DataObjects\Inputs\UserInputDTO;
use App\Exceptions\InvalidCredentialsException;
use Illuminate\Support\Facades\Auth;

/**
 * service de auth
 */
class AuthService
{
    public function __construct(
        private readonly UserService $userService,
    ) {
    }

    public function login(UserCredentialsInputDTO $credentials): mixed
    {
        $token = Auth::attempt($credentials->toArray());
        if (!$token) {
            throw new InvalidCredentialsException("Invalid credentials", 401);
        }

        $user = Auth::user();
        return self::getTokenResponse($token, $user);
    }

    public function register(UserInputDTO $userInput): mixed
    {
        $user = $this->userService->create($userInput);

        $token = Auth::login($user);
        return self::getTokenResponse($token, $user);
    }

    public static function refresh(): mixed
    {
        return self::getTokenResponse(Auth::refresh(), Auth::user());
    }

    public static function logout(): void
    {
        Auth::logout();
    }

    private static function getTokenResponse($token, $user)
    {
        return [
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ];
    }
}
