<?php

declare(strict_types=1);

namespace App\DataObjects;

use JsonSerializable;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;

final class UserCredentialsDataObject implements DataObjectContract, JsonSerializable
{
    use HasSerialize;
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {
    }
    
    /**
     * Serialize the DTO
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}