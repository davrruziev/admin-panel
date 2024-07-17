<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function store($request)
    {
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image')->getClientOriginalName();
            $imageName = $request->file('image')->storeAs('products', $file);
            $requestData['image'] = $imageName;
        }
        Product::create($requestData);
    }

    public function update($request, $product)
    {
        $requestData = $request->all();

        if ($request->hasFile('image')) {

            if (isset($product->image)) {
                Storage::delete($product->image);
            }
            $file = $request->file('image')->getClientOriginalName();
            $imageName = $request->file('image')->storeAs('products', $file);
            $requestData['image'] = $imageName;
        }
        $product->update($requestData);
    }

    public function destroy($product)
    {
        if (isset($product->image)) {
            Storage::delete($product->image);
        }
        $product->delete();
    }

    public function upload($request)
    {
        if ($request->hasFile('upload')) {
            $fileName = time() . '-' . $request->file('upload')->getClientOriginalName();
            $request->file('upload')->storeAs('products', $fileName, 'public');
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/products/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
