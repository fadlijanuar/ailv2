<?php

namespace App\Http\Controllers;

use App\Models\KantorInduk;
use App\Models\UnitLevel2;
use App\Models\UnitLevel3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $units = DB::table('kantor_induk')
                ->join('unit_level2', 'kantor_induk.id', '=', 'unit_level2.kantor_induk_id')
                ->join('unit_level3', 'unit_level2.id', '=', 'unit_level3.unit_level2_id')
                ->select('kantor_induk.*', 'unit_level2.*', 'unit_level3.*')
                ->where('deleted_at', '=', null)
                ->orderBy('unit_level3.id', 'desc')
                ->get();
            return view('unit.index', ['units' => $units]);
        } else {
            return redirect()->route('login');
        }
    }

    public function showFromAddUnit()
    {
        if (Auth::check()) {
            return view('unit.add');
        } else {
            return redirect()->route('login');
        }
    }


    public function add(Request $request)
    {
        if (Auth::check()) {
            $rules = [
                'unit_level2' => 'required',
                'unit_level3' => 'required',
                'kantor_induk' => 'required',
                'wilayah_kerja' => 'required',
            ];

            $messages = [
                'unit_level2.required' => 'Nama Unit Level 2 Wajib Diisi',
                'unit_level3.required' => 'Nama Unit Level 3 Wajib Diisi',
                'kantor_induk.required' => 'Nama Kantor induk Wajib Diisi',
                'wilayah_kerja.required' => 'Pilih wilayah kerja!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            // Jika validator ada yang salah
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
            $id_kantor_induk = DB::table('kantor_induk')->insertGetId([
                'nama_kantor_induk' => $request->kantor_induk,
                'wilayah_kerja' => $request->wilayah_kerja
            ]);
            $id_unit_level2 = DB::table('unit_level2')->insertGetId([
                'kantor_induk_id' => $id_kantor_induk,
                'nama_unit_level2' => $request->unit_level2
            ]);
            $simpan_unit_level3 = DB::table('unit_level3')->insert([
                'unit_level2_id' => $id_unit_level2,
                'nama_unit_level3' => $request->unit_level3
            ]);

            if ($simpan_unit_level3) {
                Session::flash('success', 'Data berhasil ditambah!');
                return redirect()->route('unit');
            } else {
                Session::flash('errors', ['' => 'Data gagal ditambah!']);
                return redirect()->route('unit');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function showFromAddUnitKantorInduk()
    {
        if (Auth::check()) {
            return view('unit.addKantorInduk');
        } else {
            return redirect()->route('login');
        }
    }

    public function addKantorInduk(Request $request)
    {
        if (Auth::check()) {


            $rules = [
                'wilayah_kerja' => 'required',
                'kantor_induk' => 'required'
            ];

            $messages = [
                'wilayah_kerja.required' => 'Wilayah kerja wajib diisi',
                'kantor_induk.required' => 'Kantor induk wajib diisi'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $kantor_induk = new KantorInduk;
            $kantor_induk->nama_kantor_induk = $request->kantor_induk;
            $kantor_induk->wilayah_kerja = $request->wilayah_kerja;
            $simpan = $kantor_induk->save();

            if ($simpan) {
                Session::flash('success', 'Data kantor induk berhasil ditambahkan');
                return redirect()->route('unit');
            } else {
                Session::flash('error', 'Data kantor induk gagal ditambahkan');
                return redirect()->route('unit');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function showFromAddUnitLevel2(Request $request)
    {
        if (Auth::check()) {
            $kantor_induk = KantorInduk::all();
            return view('unit.addUnitLevel2', ['kantor_induk' => $kantor_induk]);
        } else {
            return redirect()->route('login');
        }
    }

    public function addUnitLevel2(Request $request)
    {
        if (Auth::check()) {


            $rules = [
                'kantor_induk' => 'required',
                'unit_level2' => 'required'
            ];

            $messages = [
                'kantor_induk.required' => 'Kantor induk wajib diisi',
                'unit_level2.required' => 'Nama unit level 2 wajib diisi',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $unit_level2 = new UnitLevel2();
            $unit_level2->nama_unit_level2 = $request->unit_level2;
            $unit_level2->kantor_induk_id = $request->kantor_induk;
            $simpan = $unit_level2->save();

            if ($simpan) {
                Session::flash('success', 'Data unit level 2 berhasil ditambahkan');
                return redirect()->route('unit');
            } else {
                Session::flash('error', 'Data unit level 2 gagal ditambahkan');
                return redirect()->route('unit');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function showFromAddUnitLevel3()
    {
        if (Auth::check()) {
            $unit_level2 = UnitLevel2::all();
            return view('unit.addUnitLevel3', ['unit_level2' => $unit_level2]);
        } else {
            return redirect()->route('login');
        }
    }

    public function addUnitLevel3(Request $request)
    {
        if (Auth::check()) {

            $rules = [
                'unit_level3' => 'required',
                'unit_level2' => 'required'
            ];

            $messages = [
                'unit_level3.required' => 'Nama unit level 3 wajib diisi',
                'unit_level2.required' => 'Nama unit level 2 wajib diisi',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $unit_level3 = new UnitLevel3();
            $unit_level3->nama_unit_level3 = $request->unit_level3;
            $unit_level3->unit_level2_id = $request->unit_level2;
            $simpan = $unit_level3->save();

            if ($simpan) {
                Session::flash('success', 'Data unit level 3 berhasil ditambahkan');
                return redirect()->route('unit');
            } else {
                Session::flash('error', 'Data unit level 3 gagal ditambahkan');
                return redirect()->route('unit');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function delete($id)
    {
        if (Auth::check()) {
            $unit_level3 = UnitLevel3::find($id)->delete();
            if ($unit_level3) {
                Session::flash('warning', 'Data unit berhasil dihapus!');
                return redirect()->route('unit');
            } else {
                Session::flash('error', 'Data gagal dihapus!');
                return redirect()->route('unit');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function showFormEdit($id)
    {
        if (Auth::check()) {
            // TODO Get Unit By ID
        } else {
            return redirect()->route('unit');
        }
    }
}
