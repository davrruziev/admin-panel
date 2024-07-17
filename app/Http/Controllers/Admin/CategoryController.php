<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UploadRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function __construct
    (
        protected CategoryService             $categoryService,
        protected CategoryRepositoryInterface $categoryRepository
    )
    {

    }

    public function index()
    {
        $categories = $this->categoryRepository->getPaginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->store($request);
        return redirect()->route('admin.categories.index')->with('success', 'category created successfully!');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $this->categoryService->update($request, $category);
        return redirect()->route('admin.categories.index')->with('success', 'category updated successfully!');
    }

    public function destroy(Category $category)
    {

        $this->categoryService->destroy($category);
        return redirect()->route('admin.categories.index')->with('success', 'categories deleted successfully!');
    }

    public function upload(UploadRequest $request)
    {
        $this->categoryService->upload($request);
    }
}
