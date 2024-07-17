<?php
namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function getAll();

    public function getPaginate($page);

    public function find($id);
}
