<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('unit.index');
        } else {
            return redirect()->route('login');
        }
    }
}
