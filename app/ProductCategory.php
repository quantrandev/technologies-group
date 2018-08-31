<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table="product_category";
    public $timestamps = false;
    protected $fillable = ['name', 'cover_image', 'parent_id', 'is_active'];

    public function parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }
}
