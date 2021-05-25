<?php

namespace App\Http\Controllers;

use App\Models\KantorInduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $units = DB::table('kantor_induk')
                ->join('unit_level2', 'kantor_induk.id', '=', 'unit_level2.kantor_induk_id')
                ->join('unit_level3', 'unit_level2.id', '=', 'unit_level3.unit_level2_id')
                ->select('kantor_induk.*', 'unit_level2.*', 'unit_level3.*')
                ->get();
            return view('unit.index', ['units' => $units]);
        } else {
            return redirect()->route('login');
        }
    }
}
