<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategory;

class ProductCategoryController extends Controller
{
    public function show($id)
    {
        $selectedCategory = ProductCategory::with('children')->find($id);

        if ($selectedCategory->children->count() > 0) {
            return view('client.product-category.sub')->with([
                'selectedCategory' => $selectedCategory
            ]);
        }
        return view('client.product-category.show')->with([
            'selectedCategory' => $selectedCategory
        ]);
    }
}
