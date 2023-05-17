<?php

declare(strict_types=1);

namespace App\DataObjects;

use JustSteveKing\DataObjects\Contracts\DataObjectContract;

final class UserCredentialsDataObject implements DataObjectContract
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}