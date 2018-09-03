<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subsidiary;

class SubsidiaryController extends Controller
{
    public function index()
    {
        $subsidiaries = Subsidiary::where('is_active', '=', true)->get();

        return view('client.subsidiary.index')->with([
            'subsidiaries' => $subsidiaries
        ]);
    }
}
