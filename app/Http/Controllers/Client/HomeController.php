<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategory;
use App\News;
use App\Customer;

class HomeController extends Controller
{
    public function index(){
        $productCategories = ProductCategory::where('parent_id', '=', null)->get();
        $latestPosts = News::orderBy('created_at', 'desc')->take(8)->get();

        return view('client.home')->with([
            'productCategories' => $productCategories,
            'latestPosts' => $latestPosts
        ]);
    }
}
