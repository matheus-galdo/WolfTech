<?php

namespace App\Repository;

use App\DataObjects\Inputs\UserInputDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserRepository
{
    /**
     * Create a new User
     */
    public function create(UserInputDTO $userInput): User
    {
        return User::create([
            "id" => Uuid::uuid4(),
            "name" => $userInput->name,
            "email" => $userInput->email,
            "password" => Hash::make($userInput->password)
        ]);
    }
}
