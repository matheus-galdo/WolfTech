<?php

namespace App\Http\Controllers;

use App\DataObjects\Inputs\InputProductDTO;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Service\ProductService;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ProductController extends Controller
{
    public function __construct(
        public readonly ProductService $productService
    ) {
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        //TODO: add RBAC crud to manage products
        $input = InputProductDTO::buildFromRequest($request);
        $product = $this->productService->create($input);
        return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
