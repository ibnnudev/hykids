<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogGallery extends Model
{
    use HasFactory;
    public $table = 'catalog_galleries';
    protected $fillable = ['catalog_id', 'image', 'label'];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
