<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Core\Facades\Flash;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('parent')->get();
        return view('admin.menu.index')->with([
            'menus' => $menus
        ]);
    }

    public function edit($id)
    {
        $editingMenu = Menu::find($id);
        $parentMenus = Menu::where('id', '!=', $id)->get();

        return view('admin.menu.edit')->with([
            'editingMenu' => $editingMenu,
            'parentMenus' => $parentMenus
        ]);
    }

    public function update(Request $request)
    {
        try {
            $editedMenu = Menu::find($request->input('id'));
            $editedMenu->title = $request->input('title');
            $editedMenu->href = $request->input('href');
            $editedMenu->parent_id = $request->input('parent_id');
            $editedMenu->is_active = $request->input('is_active');

            if (!empty($request->hasFile('cover_image'))) {
                //upload file
                $file = $request->file('cover_image');
                $path = 'storage/' . $file->storeAs('cover_image', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
                $editedMenu->cover_image = $path;
            }
            $editedMenu->save();

            Flash::success('Đã cập nhật menu');

            return redirect(route('menu.edit', $request->input('id')));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('menu.edit', $request->input('id')));
        }
    }

    public function create()
    {
        $parentMenus = Menu::all();

        return view('admin.menu.create')->with([
            'parentMenus' => $parentMenus
        ]);
    }

    public function insert(Request $request)
    {
        $newMenuItem = Menu::create([
            'title' => $request->input('title'),
            'href' => $request->input('href'),
            'parent_id' => $request->input('parent_id'),
            'is_active' => $request->input('is_active'),
        ]);

        //upload
        if (!empty($request->hasFile('cover_image'))) {
            //upload file
            $file = $request->file('cover_image');
            $path = 'storage/' . $file->storeAs('cover_image', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
            $newMenuItem->cover_image = $path;
        }
        try {
            $newMenuItem->save();
            Flash::success('Đã thêm mới menu');

            return redirect(route('menu.create'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('menu.create'));
        }
    }

    public function delete($id)
    {
        Menu::destroy($id);
        
        return response()->json([
            'status' => 200
        ]);
    }
}
