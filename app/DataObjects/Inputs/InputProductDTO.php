<?php

declare(strict_types=1);

namespace App\DataObjects\Inputs;

use App\DataObjects\HasSerialize;
use Illuminate\Http\Request;
use JsonSerializable;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;

final class InputProductDTO implements DataObjectContract, JsonSerializable, InputContract
{
    use HasSerialize;
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly float $price,
        public readonly string $imageUrl,
    ) {
    }
    
    public static function buildFromRequest(Request $request)
    {
        return new InputProductDTO(
            name: $request->input('name'),
            description: $request->input('description'),
            price: $request->input('price'),
            imageUrl: $request->input('imageUrl'),
        );
    }
    
    /**
     * Serialize the DTO
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'imageUrl' => $this->imageUrl,
        ];
    }
}
