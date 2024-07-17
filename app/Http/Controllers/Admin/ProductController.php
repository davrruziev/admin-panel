<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UploadRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct
    (
        protected ProductService              $productService,
        protected ProductRepositoryInterface  $productRepository,
        protected CategoryRepositoryInterface $categoryRepository
    )
    {
    }

    public function index()
    {
        $products = $this->productRepository->getPaginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->store($request);
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');

    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productService->update($request, $product);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $this->productService->destroy($product);
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function upload(UploadRequest $request)
    {
        $this->productService->upload($request);
    }
}
