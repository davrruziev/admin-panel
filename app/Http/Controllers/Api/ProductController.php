<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends BaseController
{
    public function __construct(protected ProductRepository $productRepository)
    {
    }

    public function index()
    {
        try {
            return $this->sendSuccess(ProductResource::collection($this->productRepository->getAll()), "Products All");
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getCode());
        }
    }

    public function store(StoreProductRequest $request)
    {
        //
    }

    public function show($id)
    {
        try {
            return $this->sendSuccess(new ProductResource($this->productRepository->find($id)), "Product Found");
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
