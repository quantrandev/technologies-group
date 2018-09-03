<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Core\Facades\Flash;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index')->with([
            'news' => $news
        ]);
    }

    public function insert(Request $request)
    {
        $news = News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'created_at' => date('y/m/d')
        ]);

        //upload
        if (!empty($request->hasFile('cover_image'))) {
            //upload file
            $file = $request->file('cover_image');
            $path = 'storage/' . $file->storeAs('cover_image', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
            $news->cover_image = $path;
        }
        try {
            $news->save();
            Flash::success('Đã thêm mới tin hoạt động');

            return redirect(route('news.create'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('news.create'));
        }
    }
    public function create()
    {
        return view('admin.news.create');
    }

    public function edit($id)
    {
        $editingNews = News::find($id);

        return view('admin.news.edit')->with([
            'editingNews' => $editingNews
        ]);
    }
    public function update(Request $request)
    {
        try {
            $editedNews = News::find($request->input('id'));
            $editedNews->title = $request->input('title');
            $editedNews->content = $request->input('content');

            //upload
            if (!empty($request->hasFile('cover_image'))) {
                //upload file
                $file = $request->file('cover_image');
                $path = 'storage/' . $file->storeAs('cover_image', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
                $editedNews->cover_image = $path;
            }
            $editedNews->save();

            Flash::success('Đã cập nhật tin hoạt động');

            return redirect(route('news.edit', $request->input('id')));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('news.edit', $request->input('id')));
        }
    }
    public function delete($id)
    {
        News::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }

    public function content($id)
    {
        $content = News::find($id)->content;

        return response()->json([
            'status' => 200,
            'content' => $content
        ]);
    }
}
