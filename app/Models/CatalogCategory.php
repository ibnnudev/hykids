<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function catalogs()
    {
        return $this->hasMany(Catalog::class, 'catalog_category_id', 'id');
    }
}
