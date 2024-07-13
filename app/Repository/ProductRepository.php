<?php

namespace App\Repository;

use App\DataObjects\EntitiesDTO\ProductDataObject;
use App\DataObjects\Inputs\InputProductDTO;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class ProductRepository
{
    /**
     * Create a new User
     */
    public function create(InputProductDTO $input): ProductDataObject
    {
        $product = Product::create([
            "id" => Uuid::uuid4(),
            "name" => $input->name,
            "description" => $input->description,
            "imageUrl" => $input->imageUrl,
            "price" => $input->price,
        ]);

        return ProductDataObject::fromModel($product);
    }
}
