<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subsidiary;
use App\Core\Facades\Flash;

class SubsidiaryController extends Controller
{
    public function index()
    {
        $subsidiaries = Subsidiary::all();
        return view('admin.subsidiary.index')->with([
            'subsidiaries' => $subsidiaries
        ]);
    }

    public function insert(Request $request)
    {
        $subsidiary = Subsidiary::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'homepage' => $request->input('homepage'),
            'is_active' => $request->input('is_active'),
        ]);

        try {
            $subsidiary->save();
            Flash::success('Đã thêm mới công ty thành viên');

            return redirect(route('subsidiary.create'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('subsidiary.create'));
        }
    }
    public function create()
    {
        return view('admin.subsidiary.create');
    }

    public function edit($id)
    {
        $editingSubsidiary = Subsidiary::find($id);

        return view('admin.subsidiary.edit')->with([
            'editingSubsidiary' => $editingSubsidiary
        ]);
    }
    public function update(Request $request)
    {
        try {
            $editedSubsidiary = Subsidiary::find($request->input('id'));
            $editedSubsidiary->name = $request->input('name');
            $editedSubsidiary->description = $request->input('description');
            $editedSubsidiary->homepage = $request->input('homepage');
            $editedSubsidiary->is_active = $request->input('is_active');

            $editedSubsidiary->save();

            Flash::success('Đã cập nhật công ty thành viên');

            return redirect(route('subsidiary.edit', $request->input('id')));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('subsidiary.edit', $request->input('id')));
        }
    }
    public function delete($id)
    {
        Subsidiary::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }

    public function description($id)
    {
        $description = Subsidiary::find($id)->description;

        return response()->json([
            'status' => 200,
            'description' => $description
        ]);
    }
}
