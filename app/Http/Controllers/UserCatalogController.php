<?php

namespace App\Http\Controllers;

use App\Repositories\CatalogCategoryRepository;
use App\Repositories\CatalogRepository;
use Illuminate\Http\Request;

class UserCatalogController extends Controller
{
    private $catalog;
    private $catalogCategory;

    public function __construct(CatalogRepository $catalog, CatalogCategoryRepository $catalogCategory)
    {
        $this->catalog = $catalog;
        $this->catalogCategory = $catalogCategory;
    }

    public function index(Request $request)
    {
        $catalogs = $this->catalog->getWithPagination();
        if ($request->anyFilled(['category', 'sort'])) {
            $catalogs = $this->catalog->getWithPagination();
        }
        $categories = $this->catalogCategory->getAll();
        return view('user.catalog.index', compact('catalogs', 'categories'));
    }

    public function show($id)
    {
        $data = $this->catalog->getById($id);
        return view('user.catalog.show', compact('data'));
    }
}
