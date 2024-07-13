<?php

namespace App\Service;

use App\DataObjects\Inputs\UserInputDTO;
use App\Models\User;
use App\Repository\UserRepository;

/**
 * service de usuário
 */
class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {}
    
    public function create(UserInputDTO $userInput): User
    {
        return $this->userRepository->create($userInput);
    }
}
