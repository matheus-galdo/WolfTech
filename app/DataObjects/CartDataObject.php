<?php

declare(strict_types=1);

namespace App\DataObjects;

use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use Ramsey\Uuid\UuidInterface;

final class CartDataObject implements DataObjectContract
{
    public function __construct(
        public readonly ?int $id,
        public readonly UuidInterface $userId,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->userId,
        ];
    }
}
