<?php

namespace App\Core\Facades;

use App\About;
use App\ProductCategory;
use App\Customer;

class SystemInfo
{
    public static function logo()
    {
        return About::where('name', '=', 'logo')->get()[0]->content;
    }

    public static function menus()
    {
        return ProductCategory::where([
            ['parent_id', '=', null],
            ['is_active', '=', true],
            ['is_on_menu', '=', true]
        ])->with(['children' => function ($query) {
            $query->where([
                ['is_active', '=', true],
                ['is_on_menu', '=', true]
            ]);
        }])->get();
    }

    public static function customers(){
        return Customer::all();
    }
}
