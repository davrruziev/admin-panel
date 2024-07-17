<?php
namespace App\Services;

use App\Models\Page;

class PageService
{
    public function store($request)
    {
        $requestData = $request->all();
        Page::create($requestData);
    }

    public function update($request, $page)
    {
        $requestData = $request->all();
        $page->update($requestData);
    }

    public function destroy($page)
    {
        $page->delete();
    }
}
