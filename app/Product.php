<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;

class Product extends Model
{
    protected $table  = "product";
    public $timestamps = false;
    protected $fillable = ['name','description', 'cover_image', 'category_id', 'is_active'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
