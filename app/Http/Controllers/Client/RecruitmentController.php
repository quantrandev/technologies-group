<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recruitment;

class RecruitmentController extends Controller
{
    public function index()
    {
        $recruitments = Recruitment::orderBy('created_at', 'desc')->simplePaginate(4);

        return view('client.recruitment.index')->with([
            'recruitments' => $recruitments
        ]);
    }
    public function show($id)
    {
        $selectedRecruitment = Recruitment::find($id);

        return view('client.recruitment.show')->with([
            'selectedRecruitment' => $selectedRecruitment
        ]);
    }
}
