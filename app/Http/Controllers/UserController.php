<?php

namespace App\Http\Controllers;

use App\Models\UnitLevel3;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Environment\Console;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $users = User::all();
            $unit_level3 = UnitLevel3::all();
            return view('user.index', ['users' => $users, 'unit_level3' => $unit_level3]);
        } else {
            return redirect()->route('login');
        }
    }

    public function add(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:35',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'nip' => 'required|unique:users,nip',
            'unit_level3' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 35 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
            'nip.required' => 'NIP wajib diisi',
            'nip.unique' => 'NIP sudah terdaftar',
            'unit_level3.required' => 'Unit wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->nip = $request->nip;
        $user->unit_id = $request->unit_level3;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambah!');
            return redirect()->route('user');
        } else {
            Session::flash('errors', ['' => 'Data gagal ditambah!']);
            return redirect()->route('user');
        }
    }

    public function edit(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:35',
            'email' => 'required|email',
            'nip' => 'required',
            'password' => 'required|confirmed',
            'unit_level3' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 35 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'nip.required' => 'NIP wajib diisi',
            'unit_level3.required' => 'Unit wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::find($request->id);
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->nip = $request->nip;
        $user->unit_id = $request->unit_level3;
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = Hash::make($request->password);
        $simpan = $user->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah!');
            return redirect()->route('user');
        } else {
            Session::flash('errors', ['' => 'Data gagal diubah!']);
            return redirect()->route('user');
        }
    }

    public function delete($id)
    {
        $delete = User::find($id)->delete();
        if ($delete) {
            Session::flash('warning', 'Menghapus data berhasil!');
            return redirect()->route('user');
        } else {
            Session::flash('errors', ['' => 'Menghapus data gagal!']);
            return redirect()->route('user');
        }
    }
}
