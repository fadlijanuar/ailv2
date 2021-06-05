<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $customers = Customer::orderByDesc('id')->get();
            return view('customer.index', ['customers' => $customers]);
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
        $rules = [
            'nama' => 'required',
            'nama_pnj' => 'required',
            'id_pel' => 'required|unique:customers,id_pel',
            'tarif' => 'required',
            'daya' => 'required',
            'jenis_mk' => 'required',
            'tgl_mutasi' => 'required',
            'jenis_layanan' => 'required',
            'status_dil' => 'required',
        ];

        $messages = [
            'required' => 'Semua input wajib diisi!',
            'id_pel.unique' => 'ID pelanggan sudah digunakan'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $customer = new Customer;
        $customer->nama = $request->nama;
        $customer->id_pel = $request->id_pel;
        $customer->nama_pnj = $request->nama_pnj;
        $customer->tarif = $request->tarif;
        $customer->daya = $request->daya;
        $customer->jenis_mk = $request->jenis_mk;
        $customer->tgl_mutasi = $request->tgl_mutasi;
        $customer->jenis_layanan = $request->jenis_layanan;
        $customer->status_dil = $request->status_dil;
        $save = $customer->save();

        if ($save) {
            Session::flash('success', 'Data pelanggan berhasil ditambahkan');
            return redirect()->route('customer');
        } else {
            Session::flash('error', 'Data pelanggan gagal ditambahkan');
            return redirect()->route('admin/customer/add');
        }
    }

    public function showEditForm($id)
    {
        if (Auth::check()) {
            $customer = Customer::find($id);
            return view('customer.edit', ['customer' => $customer]);
        } else {
            return redirect()->route('login');
        }
    }

    public function edit(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'nama_pnj' => 'required',
            'id_pel' => 'required',
            'tarif' => 'required',
            'daya' => 'required',
            'jenis_mk' => 'required',
            'tgl_mutasi' => 'required',
            'jenis_layanan' => 'required',
            'status_dil' => 'required',
        ];

        $messages = [
            'required' => 'Semua input wajib diisi!',
            'id_pel.unique' => 'ID pelanggan sudah digunakan'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $customer = Customer::find($request->id);
        $customer->nama = $request->nama;
        $customer->id_pel = $request->id_pel;
        $customer->nama_pnj = $request->nama_pnj;
        $customer->tarif = $request->tarif;
        $customer->daya = $request->daya;
        $customer->jenis_mk = $request->jenis_mk;
        $customer->tgl_mutasi = $request->tgl_mutasi;
        $customer->jenis_layanan = $request->jenis_layanan;
        $customer->status_dil = $request->status_dil;
        $save = $customer->save();

        if ($save) {
            Session::flash('success', 'Data pelanggan berhasil diubah');
            return redirect()->route('customer');
        } else {
            Session::flash('error', 'Data pelanggan gagal diubah');
            return redirect()->route('admin/customer/edit');
        }
    }

    public function delete($id)
    {
        if (Auth::check()) {
            $customer = Customer::find($id);
            $isDelete = $customer->delete();
            if ($isDelete) {
                Session::flash('warning', 'Data pelanggan berhasil dihapus');
                return redirect()->route('customer');
            } else {
                Session::flash('error', 'Data pelanggan gagal dihapus');
                return redirect()->route('customer');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
