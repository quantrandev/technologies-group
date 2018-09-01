<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    protected $table  = "subsidiary";
    public $timestamps = false;
    protected $fillable = ['name',
    'description',
    'homepage',
    'is_active'];
}
