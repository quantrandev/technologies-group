<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use App\Core\Facades\Flash;

class SystemInfoController extends Controller
{
    public function index()
    {
        $address = About::where('name', '=', 'Trụ sở chính')->get()[0];
        $logo = About::where('name', '=', 'logo')->get()[0];
        return view('admin.system-info.index')->with([
            'address' => $address,
            'logo' => $logo
        ]);
    }

    public function updateLogo(Request $request)
    {
        $logo = About::find($request->input('id'));
        
        if ($request->hasFile('logo')) {
            //upload file
            $file = $request->file('logo');
            $path = 'storage/' . $file->storeAs('logo', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
            $logo->content = $path;
        }

        $logo->save();
        Flash::success('Đã cập nhật danh mục');

        return redirect(route('system-info'));

    }
}
