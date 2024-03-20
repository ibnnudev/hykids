<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    public $table = 'catalogs';
    protected $fillable = [
        'name',
        'rating',
        'price',
        'discount_price',
        'sizes',
        'description',
        'screen_printing_spec',
        'stock',
        'main_image',
        'shopee_link',
        'tokopedia_link',
        'bukalapak_link',
        'tiktok_link',
        'lazada_link',
        'whatsapp_link',
        'catalog_category_id',
    ];

    protected $casts = [
        'sizes' => 'array',
    ];

    public function catalogCategory()
    {
        return $this->belongsTo(CatalogCategory::class, 'catalog_category_id', 'id');
    }

    public function catalogG()
    {
        return $this->hasMany(CatalogGallery::class, 'catalog_id', 'id');
    }
}
