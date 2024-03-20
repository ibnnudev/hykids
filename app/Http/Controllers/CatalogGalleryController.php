<?php

namespace App\Http\Controllers;

use App\Repositories\CatalogGalleryRepository;
use Illuminate\Http\Request;

class CatalogGalleryController extends Controller
{
    private $catalogGallery;

    public function __construct(CatalogGalleryRepository $catalogGallery)
    {
        $this->catalogGallery = $catalogGallery;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'catalog_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'label' => 'required|string|max:255'
        ]);

        try {
            $this->catalogGallery->store($request->catalog_id, $request->except(['_token']));
            toast('Gambar katalog berhasil ditambahkan', 'success');
            return redirect()->route('catalog.gallery', $request->catalog_id);
        } catch (\Throwable $th) {
            toast('Gambar katalog gagal ditambahkan', 'error');
            return redirect()->route('catalog.gallery', $request->catalog_id);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $this->catalogGallery->destroy($id);
        toast('Gambar katalog berhasil dihapus', 'success');
        return redirect()->back();
    }
}
