<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Models\Page;
use App\Repositories\Interfaces\PageRepositoryInterface;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct
    (
        protected PageService             $pageService,
        protected PageRepositoryInterface $pageRepository
    )
    {
    }

    public function index()
    {
        $pages = $this->pageRepository->getPaginate(5);
        return view('admin.pages.index', compact('pages'));

    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(StorePageRequest $request)
    {
        $this->pageService->store($request);
        return redirect()->route('admin.pages.index')->with('success', 'Page added!');
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(StorePageRequest $request, Page $page)
    {
        $this->pageService->update($request, $page);
        return redirect()->route('admin.pages.index')->with('success', 'Page updated!');

    }

    public function destroy(Page $page)
    {
        $this->pageService->destroy($page);
        return redirect()->route('admin.pages.index')->with('success', 'Page deleted!');
    }
}
