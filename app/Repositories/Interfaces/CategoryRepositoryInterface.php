<?php
namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAll();

    public function getPaginate($page);

    public function getById($id);
}
