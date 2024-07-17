<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public function store($request)
    {
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image')->getClientOriginalName();
            $imageName = $request->file('image')->storeAs('categories', $file);
            $requestData['image'] = $imageName;
        }
        return Category::create($requestData);
    }

    public function update($request, $category)
    {

        $requestData = $request->all();
        if ($request->hasFile('image')) {

            if (isset($category->image)) {
                Storage::delete($category->image);
            }
            $file = $request->file('image')->getClientOriginalName();
            $imageName = $request->file('image')->storeAs('categories', $file);
            $requestData['image'] = $imageName;
        }
        $category->update($requestData);
    }

    public function destroy($category)
    {
        if (isset($category->image)) {
            Storage::delete($category->image);
        }
        $category->delete();
    }

    public function upload($request)
    {
        if ($request->hasFile('upload')) {
            $fileName = time() . '-' . $request->file('upload')->getClientOriginalName();
            $request->file('upload')->storeAs('categories', $fileName, 'public');
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/categories/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
