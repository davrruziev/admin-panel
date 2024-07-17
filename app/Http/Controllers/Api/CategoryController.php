<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use function Termwind\renderUsing;

class CategoryController extends BaseController
{
    public function __construct
    (
        protected CategoryService             $categoryService,
        protected CategoryRepositoryInterface $categoryRepository
    )
    {
    }

    public function index(): JsonResponse
    {
        try {
            return $this->sendSuccess(CategoryResource::collection($this->categoryRepository->getAll()), 'All Categories');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getCode());
        }
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            return $this->sendSuccess($this->categoryService->store($request), "Category created successfully", );
        }catch (\Exception $exception){
            return $this->sendError($exception->getMessage(), $exception->getCode());
        }
    }

    public function show($id)
    {
        try {
            return $this->sendSuccess(new CategoryResource($this->categoryRepository->getById($id)), "Category Find");
        }catch (\Exception $exception){
            return $this->sendError($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            return $this->sendSuccess($this->categoryService->update($request, $category), "Category updated successfully");
        }catch (\Exception $exception){
            return $this->sendError($exception->getMessage(), $exception->getCode());
        }
    }

    public function destroy(Category $category)
    {
        try {
            return $this->sendSuccess($this->categoryService->destroy($category), "Category deleted successfully");
        }catch (\Exception $exception){
            return $this->sendError($exception->getMessage(), $exception->getCode());
        }
    }
}
