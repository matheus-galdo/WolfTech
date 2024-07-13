<?php

namespace App\Service;

use App\DataObjects\EntitiesDTO\ProductDataObject;
use App\DataObjects\Inputs\InputProductDTO;
use App\Repository\ProductRepository;

class ProductService
{
    public function __construct(
        public ProductRepository $productRepository,
    ) {
    }

    public function create(InputProductDTO $input): ProductDataObject
    {
        return $this->productRepository->create($input);
    }
}
