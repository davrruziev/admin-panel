<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $imageName=$file->getClientOriginalName();
            $file->move('site/images/products',$imageName);
            $requestData['image']=$imageName;
        }

         Product::create($requestData);
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $image          = $request->file('image');
            $newImageName   = $image->getClientOriginalName();
            $location       = public_path('site/images/products');
            $OldImage       = public_path('site/images/products/'.$product->image);
            $image->move($location, $newImageName);
            unlink($OldImage);
            $requestData['image'] = $newImageName;
        }
        $product->update($requestData);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (isset($product->image)) {
            $OldImage = public_path('site/images/products/' . $product->image);
            if (File::exists($OldImage)) {
                File::delete($OldImage);
            }
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
