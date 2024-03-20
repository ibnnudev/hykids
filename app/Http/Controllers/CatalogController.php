<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Repositories\CatalogCategoryRepository;
use App\Repositories\CatalogGalleryRepository;
use App\Repositories\CatalogRepository;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    private $catalog;
    private $catalogGallery;
    private $catalogCategory;

    public function __construct(CatalogRepository $catalog, CatalogGalleryRepository $catalogGallery, CatalogCategoryRepository $catalogCategory)
    {
        $this->catalog = $catalog;
        $this->catalogGallery = $catalogGallery;
        $this->catalogCategory = $catalogCategory;
    }

    public function index()
    {
        $catalogs = $this->catalog->getWithPagination();
        $categories = $this->catalogCategory->getAll();
        return view('admin.catalog.index', compact('catalogs', 'categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'discount_price' => 'nullable',
            'shopee_link' => 'nullable',
            'tokopedia_link' => 'nullable',
            'bukalapak_link' => 'nullable',
            'tiktok_link' => 'nullable',
            'lazada_link' => 'nullable',
            'whatsapp_link' => 'nullable',
            'stock' => 'required',
            'sizes' => 'required',
            'description' => 'nullable',
            'screen_printing_spec' => 'nullable',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'catalog_category_id' => 'required',
        ]);

        try {
            $this->catalog->store($request->except(['_token', '_method']));
            toast('Katalog berhasil ditambahkan', 'success');
            return redirect()->route('catalog.index');
        } catch (\Throwable $th) {
            toast('Katalog gagal ditambahkan', 'error');
            return redirect()->route('catalog.index');
        }
    }

    public function show($id, Request $request)
    {
        if ($request->ajax()) {
            return view('admin.catalog._show', [
                'catalog' => $this->catalog->getById($id),
                'categories' => $this->catalogCategory->getAll(),
            ])->render();
        }
        return json_encode($this->catalog->getById($id));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'discount_price' => 'nullable',
            'shopee_link' => 'nullable',
            'tokopedia_link' => 'nullable',
            'bukalapak_link' => 'nullable',
            'tiktok_link' => 'nullable',
            'lazada_link' => 'nullable',
            'whatsapp_link' => 'nullable',
            'stock' => 'required',
            'sizes' => 'required',
            'description' => 'nullable',
            'screen_printing_spec' => 'nullable',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'catalog_category_id' => 'required',
        ]);

        try {
            $this->catalog->update($id, $request->except(['_token', '_method']));
            toast('Katalog berhasil diubah', 'success');
            return redirect()->route('catalog.index');
        } catch (\Throwable $th) {
            toast('Katalog gagal diubah', 'error');
            return redirect()->route('catalog.index');
        }
    }

    public function destroy($id)
    {
        try {
            $this->catalog->destroy($id);
            toast('Katalog berhasil dihapus', 'success');
            return redirect()->route('catalog.index');
        } catch (\Throwable $th) {
            toast('Katalog gagal dihapus', 'error');
            return redirect()->route('catalog.index');
        }
    }

    public function gallery($id)
    {
        $galleries = $this->catalogGallery->getByCatalogId($id);
        return view('admin.catalog.gallery', compact('galleries', 'id'));
    }

    public function detail($id)
    {
        $catalog = $this->catalog->getById($id);
        $galleries = $this->catalogGallery->getByCatalogId($id);

        return view('admin.catalog.detail', compact('catalog', 'galleries'));
    }
}
