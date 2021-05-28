<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('customer.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function showAddForm()
    {
        if (Auth::check()) {
            return view('customer.add');
        } else {
            return redirect()->route('login');
        }
    }

    public function add(Request $request)
    {
        # code...
    }
}
