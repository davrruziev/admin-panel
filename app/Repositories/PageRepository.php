<?php
namespace App\Repositories;

use App\Models\Page;
use App\Repositories\Interfaces\PageRepositoryInterface;

class PageRepository implements PageRepositoryInterface
{
    public function getPaginate($page)
    {
        return Page::paginate($page);
    }
}
