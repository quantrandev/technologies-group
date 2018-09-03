<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $selectedProduct = Product::where([
            ['id', '=', $id],
            ['is_active', '=', true]
        ])->with(['category'=>function($query){
            $query->where('is_active', '=', true);
        }])->get()[0];

        return view('client.product.show')->with([
            'selectedProduct' => $selectedProduct
        ]);
    }
}
