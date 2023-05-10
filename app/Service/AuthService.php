<?php

namespace App\Service;

use App\Models\User;
use Exception;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * service de auth
 */
class AuthService
{
    public static function login($credentials)
    {
        $token = Auth::attempt($credentials);
        if (!$token) {
            throw new Exception("Invalid credentials", 1);
        }

        $user = Auth::user();
        return self::getTokenResponse($token, $user);
    }

    public static function register($credentials)
    {
        //todo: repository de user -> createUser
        $user = User::create([
            'id' => Uuid::uuid4(),
            'name' => $credentials->name,
            'email' => $credentials->email,
            'password' => Hash::make($credentials->password),
        ]);

        $token = Auth::login($user);
        return self::getTokenResponse($token, $user);
    }

    public static function refresh()
    {
        return self::getTokenResponse(Auth::refresh(), Auth::user());
    }

    public static function logout()
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
