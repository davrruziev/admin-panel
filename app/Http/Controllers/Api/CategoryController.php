<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(StoreCategoryRequest $request)
    {
        $requestData = $request->all();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $imageName=$file->getClientOriginalName();
            $file->move('site/images/categories',$imageName);
            $requestData['image']=$imageName;
        }
       $category = Category::create($requestData);

        return $this->success('Category created', $category);

    }

    public function show($id)
    {
        return new CategoryResource(Category::findOrFail($id));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $requestData = $request->all();


        if ($request->hasFile('image')) {
            $image          = $request->file('image');
            $newImageName   = $image->getClientOriginalName();
            $location       = public_path('site/images/categories');
            $OldImage       = public_path('site/images/categories/'.$category->image);

            $image->move($location, $newImageName);

            if (is_file($OldImage)) {
                unlink($OldImage);
            }

            $requestData['image'] = $newImageName;
        }

        $category->update($requestData);

        return $this->success('Category update', $category);
    }

    public function destroy($id)
    {
        if (isset($category->image)) {
            $OldImage = public_path('site/images/categories/' . $category->image);
            if (File::exists($OldImage)) {
                File::delete($OldImage);
            }
        }
        $category = Category::destroy($id);
        return $this->success('Category deleted', $category);
    }
}
