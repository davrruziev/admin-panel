<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(3);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $requestData=$request->all();

        if($request->hasFile('image')){
            $file=$request->file('image');
            $imageName=$file->getClientOriginalName();
            $file->move('site/images/categories',$imageName);
            $requestData['image']=$imageName;
        }
        Category::create($requestData);
        return redirect()->route('admin.categories.index')->with('success','category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $requestData=$request->all();
        if ($request->hasFile('image')) {
            $image          = $request->file('image');
            $newImageName   = $image->getClientOriginalName();
            $location       = public_path('site/images/categories');
            $OldImage       = public_path('site/images/categories/'.$category->image);
            $image->move($location, $newImageName);
            unlink($OldImage);
            $requestData['image'] = $newImageName;
        }
        $category->update($requestData);
        return redirect()->route('admin.categories.index')->with('success','category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        if (isset($category->image)) {
            $OldImage = public_path('site/images/categories/' . $category->image);
            if (File::exists($OldImage)) {
                File::delete($OldImage);
            }
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success','categories deleted successfully!');
    }
}
