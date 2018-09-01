<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\Core\Facades\Flash;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index')->with([
            'products' => $products
        ]);
    }

    public function insert(Request $request)
    {
        $newProduct = Product::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'is_active' => $request->input('is_active'),
        ]);

        //upload
        if (!empty($request->hasFile('cover_image'))) {
            //upload file
            $file = $request->file('cover_image');
            $path = 'storage/' . $file->storeAs('cover_image', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
            $newProduct->cover_image = $path;
        }
        try {
            $newProduct->save();
            Flash::success('Đã thêm mới sản phẩm');

            return redirect(route('product.create'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('product.create'));
        }
    }
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.product.create')->with([
            'categories' => $categories
        ]);
    }
    public function edit($id)
    {
        $editingProduct = Product::find($id);
        $categories = ProductCategory::all();

        return view('admin.product.edit')->with([
            'editingProduct' => $editingProduct,
            'categories' => $categories
        ]);
    }
    public function update(Request $request)
    {
        try {
            $editedProduct = Product::find($request->input('id'));
            $editedProduct->name = $request->input('name');
            $editedProduct->description = $request->input('description');
            $editedProduct->category_id = $request->input('category_id');
            $editedProduct->is_active = $request->input('is_active');

            if (!empty($request->hasFile('cover_image'))) {
                //upload file
                $file = $request->file('cover_image');
                $path = 'storage/' . $file->storeAs('cover_image', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
                $editedProduct->cover_image = $path;
            }
            $editedProduct->save();

            Flash::success('Đã cập nhật sản phẩm');

            return redirect(route('product.edit', $request->input('id')));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('product.edit', $request->input('id')));
        }
    }
    public function delete($id)
    {
        Product::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }
}
