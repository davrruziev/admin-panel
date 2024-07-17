<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::all();
    }

    public function getPaginate($page)
    {
        return Product::paginate($page);
    }

    public function find($id)
    {
        return Product::find($id);
    }
}
