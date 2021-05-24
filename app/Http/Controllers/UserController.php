<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $users = User::all();
            return view('user.index', ['users' => $users]);
        } else {
            return redirect()->route('login');
        }
    }
}
