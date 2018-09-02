<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use App\Core\Facades\Flash;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index')->with([
            'abouts' => $abouts
        ]);
    }

    public function insert(Request $request)
    {
        $about = About::create([
            'name' => $request->input('name'),
            'content' => $request->input('content')
        ]);

        try {
            $about->save();
            Flash::success('Đã thêm mới thông tin khác');

            return redirect(route('about.create'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('about.create'));
        }
    }
    public function create()
    {
        return view('admin.about.create');
    }

    public function edit($id)
    {
        $editingAbout = About::find($id);

        return view('admin.about.edit')->with([
            'editingAbout' => $editingAbout
        ]);
    }
    public function update(Request $request)
    {
        try {
            $editedAbout = About::find($request->input('id'));
            $editedAbout->content = $request->input('content');

            $editedAbout->save();

            Flash::success('Đã cập nhật thông tin khác');

            return redirect(route('about.edit', $request->input('id')));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('about.edit', $request->input('id')));
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
        $description = About::find($id)->content;

        return response()->json([
            'status' => 200,
            'description' => $description
        ]);
    }
}
