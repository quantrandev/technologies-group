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
        $address = About::where('name', '=', 'address')->get()[0];
        $logo = About::where('name', '=', 'logo')->get()[0];
        $briefInfo = About::where('name', '=', 'briefinfo')->get()[0];
        $introduction = About::where('name', '=', 'introduction')->get()[0];
        return view('admin.system-info.index')->with([
            'address' => $address,
            'logo' => $logo,
            'briefInfo' => $briefInfo,
            'introduction' => $introduction,
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
        Flash::success('Đã cập nhật logo');

        return redirect(route('system-info'));
    }

    public function updateAddress(Request $request)
    {
        $address = About::find($request->input('id'));
        
        $address->content = $request->input('address');

        $address->save();
        Flash::success('Đã cập nhật địa chỉ website');

        return redirect(route('system-info'));
    }

    public function briefInfo(Request $request)
    {
        $briefInfo = About::find($request->input('id'));
        
        $briefInfo->content = $request->input('briefInfo');

        $briefInfo->save();
        Flash::success('Đã cập nhật giới thiệu ngắn');

        return redirect(route('system-info'));
    }

    public function introduction(Request $request)
    {
        $introduction = About::find($request->input('id'));
        
        $introduction->content = $request->input('introduction');

        $introduction->save();
        Flash::success('Đã cập nhật giới thiệu chi tiết');

        return redirect(route('system-info'));
    }
}
