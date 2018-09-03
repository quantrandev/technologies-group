<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $listOfNews = News::orderBy('created_at', 'desc')->simplePaginate(4);
        return view('client.news.index')->with([
            'listOfNews' => $listOfNews
        ]);
    }

    public function show($id)
    {
        $selectedNews = News::find($id);
        return view('client.news.show')->with([
            'selectedNews' => $selectedNews
        ]);
    }
}
