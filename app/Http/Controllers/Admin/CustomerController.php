<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Core\Facades\Flash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index')->with([
            'customers' => $customers
        ]);
    }

    public function insert(Request $request)
    {
        $newCustomer = Customer::create([
            'name' => $request->input('name'),
            'homepage' => $request->input('homepage'),
            'is_active' => $request->input('is_active'),
        ]);

        //upload
        if (!empty($request->hasFile('logo'))) {
            //upload file
            $file = $request->file('logo');
            $path = 'storage/' . $file->storeAs('logo', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
            $newCustomer->logo = $path;
        }
        try {
            $newCustomer->save();
            Flash::success('Đã thêm mới đối tác');

            return redirect(route('customer.create'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('customer.create'));
        }
    }
    public function create()
    {
        return view('admin.customer.create');
    }

    public function edit($id)
    {
        $editingCustomer = Customer::find($id);

        return view('admin.customer.edit')->with([
            'editingCustomer' => $editingCustomer
        ]);
    }
    public function update(Request $request)
    {
        try {
            $editedCustomer = Customer::find($request->input('id'));
            $editedCustomer->name = $request->input('name');
            $editedCustomer->homepage = $request->input('homepage');
            $editedCustomer->is_active = $request->input('is_active');

            if (!empty($request->hasFile('logo'))) {
                //upload file
                $file = $request->file('logo');
                $path = 'storage/' . $file->storeAs('logo', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
                $editedCustomer->logo = $path;
            }
            $editedCustomer->save();

            Flash::success('Đã cập nhật đối tác');

            return redirect(route('customer.edit', $request->input('id')));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('customer.edit', $request->input('id')));
        }
    }
    public function delete($id)
    {
        Customer::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }

}
