<?php

namespace App\Http\Controllers;

use App\Models\CatalogCategory;
use App\Repositories\CatalogCategoryRepository;
use Illuminate\Http\Request;

class CatalogCategoryController extends Controller
{
    private $catalogCategory;

    public function __construct(CatalogCategoryRepository $catalogCategory)
    {
        $this->catalogCategory = $catalogCategory;
    }

    public function index()
    {
        $catalogCategories = $this->catalogCategory->getWithPagination();
        return view('admin.catalog_category.index', compact('catalogCategories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $this->catalogCategory->store($request->except('_token'));
        toast('Kategori berhasil ditambahkan', 'success');
        return redirect()->route('catalog-category.index');
    }

    public function show($id)
    {
        $data = $this->catalogCategory->getById($id);
        return view('admin.catalog_category._show', compact('data'))->render();
    }

    public function update($id, Request $request)
    {
        $request->validate(['name' => 'required']);
        $this->catalogCategory->update($id, $request->except(['_token', '_method']));
        toast('Kategori berhasil diubah', 'success');
        return redirect()->route('catalog-category.index');
    }

    public function destroy($id)
    {
        $this->catalogCategory->destroy($id);
        toast('Kategori berhasil dihapus', 'success');
        return redirect()->route('catalog-category.index');
    }
}
