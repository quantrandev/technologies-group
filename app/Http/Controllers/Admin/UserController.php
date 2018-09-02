<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Core\Facades\Flash;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //if user is not admin
        if (!Auth::user()->isAdmin()) {
            Auth::logout();
            return redirect(route('login'));
        }

        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('admin.user.index')->with([
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        //if user is not admin
        if (!Auth::user()->isAdmin()) {
            Auth::logout();
            return redirect(route('login'));
        }

        $editingUser = User::find($id);

        return view('admin.user.edit')->with([
            'editingUser' => $editingUser
        ]);
    }

    public function update(Request $request)
    {
        //if user is not admin
        if (!Auth::user()->isAdmin()) {
            Auth::logout();
            return redirect(route('login'));
        }

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

            return redirect(route('user.edit', $request->input('id')));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('user.edit', $request->input('id')));
        }
    }

    public function create()
    {
        //if user is not admin
        if (!Auth::user()->isAdmin()) {
            Auth::logout();
            return redirect(route('login'));
        }

        return view('admin.user.create');
    }

    public function insert(Request $request)
    {
        //if user is not admin
        if (!Auth::user()->isAdmin()) {
            Auth::logout();
            return redirect(route('login'));
        }

        $newUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        //upload
        if (!empty($request->hasFile('avatar'))) {
            //upload file
            $file = $request->file('avatar');
            $path = 'storage/' . $file->storeAs('avatar', $file->getClientOriginalName() . '.' . $file->extension(), 'public');
            $newUser->avatar = $path;
        }
        try {
            $newUser->save();
            Flash::success('Đã thêm mới người dùng');

            return redirect(route('user.create'));
        } catch (Exception $e) {
            Flash::error('Có lỗi xảy ra, vui lòng thử lại sau.');
            return redirect(route('user.create'));
        }
    }

    public function delete($id)
    {
        //if user is not admin
        if (!Auth::user()->isAdmin()) {
            Auth::logout();
            return redirect(route('login'));
        }

        User::destroy($id);
        
        return response()->json([
            'status' => 200
        ]);
    }

    public function check(Request $request)
    {
        //if user is not admin
        if (!Auth::user()->isAdmin()) {
            Auth::logout();
            return redirect(route('login'));
        }

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
