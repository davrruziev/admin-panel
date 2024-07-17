<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function getPaginate($page)
    {
        return Category::paginate($page);
    }

    public function getById($id)
    {
        return Category::findOrFail($id);
    }
}
