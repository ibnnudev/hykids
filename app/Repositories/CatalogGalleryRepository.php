<?php

namespace App\Repositories;

use App\Models\CatalogGallery;
use Illuminate\Support\Facades\Storage;

class CatalogGalleryRepository
{
    private $catalogGallery;

    public function __construct(CatalogGallery $catalogGallery)
    {
        $this->catalogGallery = $catalogGallery;
    }

    public function getWithPagination()
    {
        return $this->catalogGallery->orderBy('created_at', 'desc')->paginate(10);
    }

    public function getById($id)
    {
        return $this->catalogGallery->find($id);
    }

    public function getByCatalogId($catalogId)
    {
        return $this->catalogGallery->where('catalog_id', $catalogId)->paginate(10);
    }

    public function store($id, $data)
    {
        $filaname = uniqid() . '.' . $data['image']->extension();
        $data['image']->storeAs('public/catalogs/' . $id, $filaname);
        $data['image'] = $filaname;
        try {
            $this->catalogGallery->create($data);
        } catch (\Throwable $th) {
            throw $th;
            Storage::delete('public/catalogs/' . $filaname);
        }
    }

    public function update($id, $data)
    {
        $catalogGallery = $this->getById($id);
        Storage::delete('public/catalogs/' . $catalogGallery->catalog_id . '/' . $catalogGallery->image);
        $filaname = uniqid() . '.' . $data->extension();
        $data->storeAs('public/catalogs/' . $catalogGallery->catalog_id, $filaname);
        $data['image'] = $filaname;
        try {
            $catalogGallery->update($data);
        } catch (\Throwable $th) {
            throw $th;
            Storage::delete('public/catalogs/' . $filaname);
        }
    }

    public function destroy($id)
    {
        $catalogGallery = $this->getById($id);
        Storage::delete('public/catalogs/' . $catalogGallery->catalog_id . '/' . $catalogGallery->image);
        $catalogGallery->delete();
    }
}
