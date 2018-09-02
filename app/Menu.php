<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table="menu";
    public $timestamps = false;
    protected $fillable = ['title', 'href', 'cover_image', 'parent_id', 'is_active'];

    public function parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }
}
