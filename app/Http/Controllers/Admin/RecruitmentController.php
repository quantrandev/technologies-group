<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recruitment;
use App\Core\Facades\Flash;

class RecruitmentController extends Controller
{
    public function index()
    {
        $recruitments = Recruitment::all();
        return view('admin.recruitment.index')->with([
            'recruitments' => $recruitments
        ]);
    }

    public function insert(Request $request)
    {
        $recruitment = Recruitment::create([
            'title' => $request->input('title'),
            'job_title'=> $request->input('job_title'),
            'job_description'=> $request->input('job_description'),
            'job_requirements'=> $request->input('job_requirements'),
            'welfare'=> $request->input('welfare'),
            'job_work_place'=> $request->input('job_work_place'),
            'quantity'=> $request->input('quantity'),
            'additional_information'=> $request->input('additional_information'),
            'expiration'=> date('y/m/d', time() + 60 * 60 * 24 * $request->input('expiration')),
            'created_at' => date('y/m/d')
        ]);

        try {
            $recruitment->save();
            Flash::success('Đã thêm mới tin tuyển dụng');

            return redirect(route('recruitment.create'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('recruitment.create'));
        }
    }
    public function create()
    {
        return view('admin.recruitment.create');
    }

    public function edit($id)
    {
        $editingRecruitment = Recruitment::find($id);

        return view('admin.recruitment.edit')->with([
            'editingRecruitment' => $editingRecruitment
        ]);
    }
    public function update(Request $request)
    {
        try {
            $editedRecruitment = Recruitment::find($request->input('id'));
            $editedRecruitment->title = $request->input('title');
            $editedRecruitment->job_title = $request->input('job_title');
            $editedRecruitment->job_description = $request->input('job_description');
            $editedRecruitment->job_requirements = $request->input('job_requirements');
            $editedRecruitment->job_work_place = $request->input('job_work_place');
            $editedRecruitment->additional_information = $request->input('additional_information');
            $editedRecruitment->expiration = $request->input('expiration');
            $editedRecruitment->welfare = $request->input('welfare');
            $editedRecruitment->quantity = $request->input('quantity');

            $editedRecruitment->save();

            Flash::success('Đã cập nhật tin hoạt động');

            return redirect(route('recruitment.edit', $request->input('id')));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('recruitment.edit', $request->input('id')));
        }
    }
    public function delete($id)
    {
        Recruitment::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }

    public function detail($id)
    {
        $recruitment = Recruitment::find($id);

        return response()->json([
            'status' => 200,
            'recruitment' => $recruitment
        ]);
    }
}
