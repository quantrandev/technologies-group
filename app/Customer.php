<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name', 'logo', 'homepage', 'is_active'];
    public $timestamps = false;
}
