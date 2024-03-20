<?php

namespace App\Repositories;

use App\Models\Catalog;
use App\Models\CatalogCategory;

class CatalogCategoryRepository
{
    private $catalogCatagory;
    private $catalog;

    public function __construct(CatalogCategory $catalogCatagory, Catalog $catalog)
    {
        $this->catalogCatagory = $catalogCatagory;
        $this->catalog = $catalog;
    }

    public function getAll()
    {
        return $this->catalogCatagory->all();
    }

    public function getWithPagination()
    {
        return $this->catalogCatagory->orderBy('id', 'desc')->paginate(10);
    }

    public function getById($id)
    {
        return $this->catalogCatagory->find($id);
    }

    public function store($data)
    {
        return $this->catalogCatagory->create($data);
    }

    public function update($id, $data)
    {
        return $this->catalogCatagory->find($id)->update($data);
    }

    public function  destroy($id)
    {
        $catalogCatagory = $this->catalogCatagory->find($id);
        $this->catalog->where('catalog_category_id', $id)->update(['catalog_category_id' => null]);
        return $catalogCatagory->delete();
    }
}
