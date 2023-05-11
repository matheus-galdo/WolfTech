<?php

declare(strict_types=1);

namespace App\DataObjects;

use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use Ramsey\Uuid\UuidInterface;

final class UserDataObject implements DataObjectContract
{
    public function __construct(
        public readonly ?UuidInterface $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
