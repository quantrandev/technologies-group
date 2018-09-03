<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\ProductCategory;
use \App\Core\Facades\Flash;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::with('parent')->get();
        return view('admin.product-category.index')->with([
            'categories' => $categories
        ]);
    }

    public function edit($id)
    {
        $editingCategory = ProductCategory::find($id);
        $parentCategories = ProductCategory::where('id', '!=', $id)->get();

        return view('admin.product-category.edit')->with([
            'editingCategory' => $editingCategory,
            'parentCategories' => $parentCategories
        ]);
    }

    public function update(Request $request)
    {
        try {
            $editedCategory = ProductCategory::find($request->input('id'));
            $editedCategory->name = $request->input('name');
            $editedCategory->parent_id = $request->input('parent_id');
            $editedCategory->is_active = $request->input('is_active');
            $editedCategory->is_on_menu = $request->input('is_on_menu');

            if (!empty($request->hasFile('cover_image'))) {
                //upload file
                $file = $request->file('cover_image');
                $path = 'storage/' . $file->storeAs('cover_image', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
                $editedCategory->cover_image = $path;
            }
            $editedCategory->save();

            Flash::success('Đã cập nhật danh mục');

            return redirect(route('product-category.edit', $request->input('id')));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('product-category.edit', $request->input('id')));
        }
    }

    public function create()
    {
        $parentCategories = ProductCategory::all();

        return view('admin.product-category.create')->with([
            'parentCategories' => $parentCategories
        ]);
    }

    public function insert(Request $request)
    {
        $newCategory = ProductCategory::create([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'is_active' => $request->input('is_active'),
            'is_on_menu' => $request->input('is_on_menu'),
        ]);

        //upload
        if (!empty($request->hasFile('cover_image'))) {
            //upload file
            $file = $request->file('cover_image');
            $path = 'storage/' . $file->storeAs('cover_image', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
            $newCategory->cover_image = $path;
        }
        try {
            $newCategory->save();
            Flash::success('Đã thêm mới danh mục');

            return redirect(route('product-category.create'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('product-category.create'));
        }
    }

    public function delete($id)
    {
        ProductCategory::destroy($id);
        
        return response()->json([
            'status' => 200
        ]);
    }
}
