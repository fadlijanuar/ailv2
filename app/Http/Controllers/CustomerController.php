<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\User;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            if ($request->ajax()) {
							if ($request->daya && ($request->startDate && $request->endDate) && $request->nama) {
								$daya = explode('-', $request->daya);

								$customers = Customer::select([
										'IDPEL',
                    'NAMA',
                    'NAMAPNJ',
                    'TARIF',
                    'DAYA',
                    'JENIS_MK',
                    'TGLRUBAH_MK',
                    'JENISLAYANAN',
                    'STATUS_DIL'
								])
								->whereBetween('DAYA', [$daya[0], $daya[1]])
								->whereBetween('TGLRUBAH_MK', [$request->startDate, $request->endDate])
								->where('NAMA', 'like', '%'.$request->nama.'%')
								->get();
							} else {
                $customers = Customer::select([
                    'IDPEL',
                    'NAMA',
                    'NAMAPNJ',
                    'TARIF',
                    'DAYA',
                    'JENIS_MK',
                    'TGLRUBAH_MK',
                    'JENISLAYANAN',
                    'STATUS_DIL'
								])
                ->limit(200)
    	          ->get();
							}

                return DataTables::of($customers)
                    ->addIndexColumn()
                    ->addColumn('actions', function ($row) {
                			return '<div>
											<a class="btn btn-warning btn-sm btn-circle" href="' . url('admin/customer/edit/' . $row->IDPEL) . '"><i class="fa fa-edit"></i></a>
                        <a href="'. url('admin/customer/delete/'. $row->IDPEL) .'" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></a>
                      </div>';
                    })
                    ->editColumn('TGLRUBAH_MK', function ($row) {
                        return date('d M Y', strtotime($row->TGLRUBAH_MK));
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
            }
            return view('customer.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function showAddForm()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
						$unit_id = User::find($user_id)->unit_id;
            return view('customer.add', ['current_unit_id_user' => $unit_id]);
        } else {
            return redirect()->route('login');
        }
    }

    public function add(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'nama_pnj' => 'required',
            'id_pel' => 'required|unique:pelanggan,IDPEL',
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
        $customer->NAMA = $request->nama;
        $customer->IDPEL = $request->id_pel;
        $customer->NAMAPNJ = $request->nama_pnj;
        $customer->TARIF = $request->tarif;
        $customer->DAYA = $request->daya;
        $customer->JENIS_MK = $request->jenis_mk;
        $customer->TGLRUBAH_MK = $request->tgl_mutasi;
        $customer->JENISLAYANAN = $request->jenis_layanan;
        $customer->STATUS_DIL = $request->status_dil;
        $customer->UNIT_ID = $request->unit_id;
        $save = $customer->save();

        if ($save) {
            Session::flash('success', 'Data pelanggan berhasil ditambahkan');
            return redirect()->route('customer');
        } else {
            Session::flash('error', 'Data pelanggan gagal ditambahkan');
            return redirect()->route('admin/customer/add');
        }
		}

		// TODO Memperbaiki fungsi delete pelanggan
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
            $customer = Customer::where('IDPEL', $id);
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
