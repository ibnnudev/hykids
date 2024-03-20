<?php

namespace App\Repositories;

use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;

class CatalogRepository
{
    private $catalog;
    const DEFAULT_IMAGE_PATH = 'public/catalogs';

    public function __construct(Catalog $catalog)
    {
        $this->catalog = $catalog;
    }

    public function getAll()
    {
        return $this->catalog
            ->with('catalogCategory')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getWithPagination()
    {
        $catalogs = $this->catalog->with('catalogCategory')
            ->when(request()->filled('category'), function ($query) {
                $query->where('catalog_category_id', request('category'));
            })
            ->when(request('sort') == 'latest', function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->when(request('sort') == 'cheapest', function ($query) {
                $query->orderBy('price', 'asc');
            })
            ->when(request('sort') == 'expensive', function ($query) {
                $query->orderBy('price', 'desc');
            })
            ->paginate(10);
        return $catalogs;
    }

    public function getById($id)
    {
        return $this->catalog->with('catalogCategory', 'catalogG')->findOrFail($id);
    }

    public function store($data)
    {
        $data['price']          = $this->removeRupiahFormat($data['price']);
        $data['discount_price'] = $data['discount_price'] ? $this->removeRupiahFormat($data['discount_price']) : null;

        $filenameMainImage = uniqid() . '.' . $data['main_image']->extension();
        $data['main_image']->storeAs(self::DEFAULT_IMAGE_PATH, $filenameMainImage);
        $data['main_image'] = $filenameMainImage;

        try {
            $this->catalog->create($data);
        } catch (\Throwable $th) {
            Storage::delete(self::DEFAULT_IMAGE_PATH . '/' . $filenameMainImage);
            throw $th;
        }
    }

    public function update($id, $data)
    {
        $catalog = $this->getById($id);
        $data['price']          = $this->removeRupiahFormat($data['price']);
        $data['discount_price'] = $data['discount_price'] ? $this->removeRupiahFormat($data['discount_price']) : null;

        if (isset($data['main_image'])) {
            $filenameMainImage = uniqid() . '.' . $data['main_image']->extension();
            $data['main_image']->storeAs(self::DEFAULT_IMAGE_PATH, $filenameMainImage);
            $data['main_image'] = $filenameMainImage;
            Storage::delete(self::DEFAULT_IMAGE_PATH . '/' . $catalog->main_image);
        }

        try {
            $catalog->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        $catalog = $this->getById($id);
        $images = [
            'main_image',
            'featured_image_1',
            'featured_image_2',
            'featured_image_3',
            'featured_image_4',
            'featured_image_5',
            'featured_image_6',
            'featured_image_7',
            'featured_image_8',
            'featured_image_9',
            'featured_image_10',
            'featured_image_11',
            'featured_image_12'
        ];

        foreach ($images as $image) {
            if (isset($catalog->$image)) {
                Storage::delete(self::DEFAULT_IMAGE_PATH . '/' . $catalog->$image);
            }
        }

        $catalog->delete();
    }

    public function removeRupiahFormat($price)
    {
        return preg_replace('/\D/', '', $price);
    }
}
