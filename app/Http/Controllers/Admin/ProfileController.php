<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Core\Facades\Flash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $editingUser = User::find(Auth::user()->id);

        return view('admin.profile')->with([
            'editingUser' => $editingUser
        ]);
    }

    public function update(Request $request)
    {
        try {
            $editedUser = User::find($request->input('id'));
            $editedUser->name = $request->input('name');
            if (!empty($request->input('email'))) {
                $editedUser->email = $request->input('email');
            }
            if (!empty($request->input('password'))) {
                $editedUser->password = Hash::make($request->input('password'));
            }

            if (!empty($request->hasFile('avatar'))) {
                //upload file
                $file = $request->file('avatar');
                $path = 'storage/' . $file->storeAs('avatar', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
                $editedUser->avatar = $path;
            }
            $editedUser->save();

            Flash::success('Đã cập nhật người dùng');

            return redirect(route('profile'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('profile'));
        }
    }

    public function check(Request $request)
    {
        $email = true;
        $password = true;

        //validate email
        $user = User::where('email', '=', $request->input('email'))->get();
        if ($user->count() != 0) {
            $email = false;
        }
        //validate password confirm
        if ($request->input('password') != $request->input('confirm-password')) {
            $password = false;
        }

        return response()->json([
            'email' => $email,
            'password' => $password
        ]);
    }
}
