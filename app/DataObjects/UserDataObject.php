<?php

declare(strict_types=1);

namespace App\DataObjects;

use JsonSerializable;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use Ramsey\Uuid\UuidInterface;

final class UserDataObject implements DataObjectContract, JsonSerializable
{
    use HasSerialize;
    public function __construct(
        public readonly ?UuidInterface $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public static function buildFromInput (
        string $name,
        string $email,
        string $password,
    ){
        return new UserDataObject(
            id:  null,
            name: $name,
            email: $email,
            password: $password,
        );
    }

    /**
     * Serialize the DTO
     * @return array
     */
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