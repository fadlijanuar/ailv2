<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mockery\Undefined;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $customers = Customer::all();
            return view('document.index', ['customers' => $customers]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $customers = Customer::where('surat_pengajuan', null)
                ->where('identitas_pelanggan', null)
                ->where('formulir_survei', null)
                ->where('jawaban_persetujuan', null)
                ->where('surat_perjanjian_jual_beli', null)
                ->where('sertifikat_laik_operasi', null)
                ->where('kuitansi_pembayaran', null)
                ->where('perintah_kerja_pemasangan', null)
                ->where('berita_acara_pemasangan', null)
                ->where('dokumen_lain', null)
                ->get(['id_pel', 'nama', 'nama_pnj']);
            return view('document.add', ['customers' => $customers]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * @param Object $request
     * @param String $folder
     * @return String $name_file
     */

    private function uploadFile($request, $folder)
    {
        if ($request) {
            $file_name = Str::random(20) . "." . $request->extension();
            $request->move(public_path("document_pelanggan/" . $folder), $file_name);
            return $file_name;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id_pel' => 'required',
            'surat_pengajuan' => 'mimes:pdf,doc,docx|max:500',
            'identitas_pelanggan' => 'mimes:pdf,doc,docx|max:500',
            'formulir_survei' => 'mimes:pdf,doc,docx|max:500',
            'jawaban_persetujuan' => 'mimes:pdf,doc,docx|max:500',
            'surat_perjanjian_jual_beli' => 'mimes:pdf,doc,docx|max:500',
            'surat_laik_operasi' => 'mimes:pdf,doc,docx|max:500',
            'kuitansi_pembayaran' => 'mimes:pdf,doc,docx|max:500',
            'perintah_kerja_pemasangan' => 'mimes:pdf,doc,docx|max:500',
            'berita_acara_pemasangan' => 'mimes:pdf,doc,docx|max:500',
            'dokumen_lain' => 'mimes:pdf,doc,docx|max:500',
        ];

        $messages = [
            'id_pel.required' => "ID pelanggan wajib diisi",
            'surat_pengajuan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'identitas_pelanggan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'formulir_survei.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'jawaban_persetujuan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'surat_perjanjian_jual_beli.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'surat_laik_operasi.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'kuitansi_pembayaran.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'perintah_kerja_pemasangan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'berita_acara_pemasangan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'dokumen_lain.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
            'surat_pengajuan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            'identitas_pelanggan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            'formulir_survei.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            'jawaban_persetujuan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            'surat_perjanjian_jual_beli.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            'surat_laik_operasi.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            'kuitansi_pembayaran.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            'perintah_kerja_pemasangan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            'berita_acara_pemasangan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            'dokumen_lain.max' => 'Ukuran file tidak boleh lebih dari 500kb',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $customer = Customer::where('id_pel', $request->id_pel)->first();
        // upload document 
        $customer->surat_pengajuan = $this->uploadFile($request->surat_pengajuan, 'surat_pengajuan');
        $customer->identitas_pelanggan = $this->uploadFile($request->identitas_pelanggan, 'identitas_pelanggan');
        $customer->formulir_survei = $this->uploadFile($request->formulir_survei, 'formulir_survei');
        $customer->jawaban_persetujuan = $this->uploadFile($request->jawaban_persetujuan, 'jawaban_persetujuan');
        $customer->surat_perjanjian_jual_beli = $this->uploadFile($request->surat_perjanjian_jual_beli, 'surat_perjanjian_jual_beli');
        $customer->sertifikat_laik_operasi = $this->uploadFile($request->surat_laik_operasi, 'surat_laik_operasi');
        $customer->kuitansi_pembayaran = $this->uploadFile($request->kuitansi_pembayaran, 'kuitansi_pembayaran');
        $customer->perintah_kerja_pemasangan = $this->uploadFile($request->perintah_kerja_pemasangan, 'perintah_kerja_pemasangan');
        $customer->berita_acara_pemasangan = $this->uploadFile($request->berita_acara_pemasangan, 'berita_acara_pemasangan');
        $customer->dokumen_lain = $this->uploadFile($request->dokumen_lain, 'dokumen_lain');

        $isSave = $customer->save();

        if ($isSave) {
            Session::flash('success', 'Berhasil menambahkan dokument pelanggan');
            return redirect()->route('dokumen_pelanggan');
        } else {
            Session::flash('error', 'Gagal menambahkan dokument pelanggan!');
            return redirect()->route('dokumen_pelanggan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $customer = Customer::find($id);
            return view('document.detail', ['customer' => $customer]);
        } else {
            return redirect()->route('login');
        }
    }

    private function updateFileUpload($request, $document, $folder)
    {
        // 1. Cek apakah user upload file
        if ($request) {
            // 2. Cek apakah file sebelumnya ada
            if ($document) {
                // 3. Jika ada maka file sebelumnya dihapus
                File::delete(public_path('document_pelanggan/' . $folder . '/' . $document));
            }
            // 3. Upload file baru
            $files = $request;
            $files_name = Str::random(20) . "." . $files->extension();
            $files->move(public_path("document_pelanggan/" . $folder), $files_name);
            return $files_name;
        } else {
            if ($document) {
                return $document;
            }
            return null;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Auth::check()) {
            // malakukan validasi data
            $rules = [
                'id_pel' => 'required',
                'surat_pengajuan' => 'mimes:pdf,doc,docx|max:500',
                'identitas_pelanggan' => 'mimes:pdf,doc,docx|max:500',
                'formulir_survei' => 'mimes:pdf,doc,docx|max:500',
                'jawaban_persetujuan' => 'mimes:pdf,doc,docx|max:500',
                'surat_perjanjian_jual_beli' => 'mimes:pdf,doc,docx|max:500',
                'surat_laik_operasi' => 'mimes:pdf,doc,docx|max:500',
                'kuitansi_pembayaran' => 'mimes:pdf,doc,docx|max:500',
                'perintah_kerja_pemasangan' => 'mimes:pdf,doc,docx|max:500',
                'berita_acara_pemasangan' => 'mimes:pdf,doc,docx|max:500',
                'dokumen_lain' => 'mimes:pdf,doc,docx|max:500',
            ];

            $messages = [
                'id_pel.required' => "ID pelanggan wajib diisi",
                'surat_pengajuan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'identitas_pelanggan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'formulir_survei.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'jawaban_persetujuan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'surat_perjanjian_jual_beli.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'surat_laik_operasi.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'kuitansi_pembayaran.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'perintah_kerja_pemasangan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'berita_acara_pemasangan.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'dokumen_lain.mimes' => 'File yang dapat diupload adalah pdf, doc, docx',
                'surat_pengajuan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
                'identitas_pelanggan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
                'formulir_survei.max' => 'Ukuran file tidak boleh lebih dari 500kb',
                'jawaban_persetujuan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
                'surat_perjanjian_jual_beli.max' => 'Ukuran file tidak boleh lebih dari 500kb',
                'surat_laik_operasi.max' => 'Ukuran file tidak boleh lebih dari 500kb',
                'kuitansi_pembayaran.max' => 'Ukuran file tidak boleh lebih dari 500kb',
                'perintah_kerja_pemasangan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
                'berita_acara_pemasangan.max' => 'Ukuran file tidak boleh lebih dari 500kb',
                'dokumen_lain.max' => 'Ukuran file tidak boleh lebih dari 500kb',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            // mengambil customer yang akan diedit
            $dokumen_pelanggan = Customer::find($request->id_pel);
            // surat pengajuan 
            $dokumen_pelanggan->surat_pengajuan = $this->updateFileUpload($request->surat_pengajuan, $dokumen_pelanggan->surat_pengajuan, 'surat_pengajuan');
            // identitas pelanggan 
            $dokumen_pelanggan->identitas_pelanggan = $this->updateFileUpload($request->identitas_pelanggan, $dokumen_pelanggan->identitas_pelanggan, 'identitas_pelanggan');
            // Formulir Survei 
            $dokumen_pelanggan->formulir_survei = $this->updateFileUpload($request->formulir_survei, $dokumen_pelanggan->formulir_survei, 'formulir_survei');
            // Jawaban Persetujuan 
            $dokumen_pelanggan->jawaban_persetujuan = $this->updateFileUpload($request->jawaban_persetujuan, $dokumen_pelanggan->jawaban_persetujuan, 'jawaban_persetujuan');
            // Surat Perjanjian Jual Beli 
            $dokumen_pelanggan->surat_perjanjian_jual_beli = $this->updateFileUpload($request->surat_perjanjian_jual_beli, $dokumen_pelanggan->surat_perjanjian_jual_beli, 'surat_perjanjian_jual_beli');
            // Sertifikat Laik Operasi
            $dokumen_pelanggan->sertifikat_laik_operasi = $this->updateFileUpload($request->surat_laik_operasi, $dokumen_pelanggan->sertifikat_laik_operasi, 'surat_laik_operasi');
            // Kuitansi Pembanyaran 
            $dokumen_pelanggan->kuitansi_pembayaran = $this->updateFileUpload($request->kuitansi_pembayaran, $dokumen_pelanggan->kuitansi_pembayaran, 'kuitansi_pembayaran');
            // Surat Perjanjian Jual Beli 
            $dokumen_pelanggan->perintah_kerja_pemasangan = $this->updateFileUpload($request->perintah_kerja_pemasangan, $dokumen_pelanggan->perintah_kerja_pemasangan, 'perintah_kerja_pemasangan');
            // Surat Perjanjian Jual Beli 
            $dokumen_pelanggan->berita_acara_pemasangan = $this->updateFileUpload($request->berita_acara_pemasangan, $dokumen_pelanggan->berita_acara_pemasangan, 'berita_acara_pemasangan');
            // Surat Perjanjian Jual Beli 
            $dokumen_pelanggan->dokumen_lain = $this->updateFileUpload($request->dokumen_lain, $dokumen_pelanggan->dokumen_lain, 'dokumen_lain');
            // Kita Lakukan Save
            $isSave = $dokumen_pelanggan->save();
            if ($isSave) {
                Session::flash('success', 'Berhasil menambahkan dokument pelanggan');
                return redirect()->route('dokumen_pelanggan');
            } else {
                Session::flash('error', 'Gagal menambahkan dokument pelanggan!');
                return redirect()->route('dokumen_pelanggan');
            }
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $customer = Customer::find($id);
            // surat pengajuan
            if ($customer->surat_pengajuan) {
                File::delete(public_path('document_pelanggan/surat_pengajuan/' . $customer->surat_pengajuan));
                $customer->surat_pengajuan = null;
            }
            // identitas pelanggan
            if ($customer->identitas_pelanggan) {
                File::delete(public_path('document_pelanggan/identitas_pelanggan/' . $customer->identitas_pelanggan));
                $customer->identitas_pelanggan = null;
            }
            // formulir survei
            if ($customer->formulir_survei) {
                File::delete(public_path('document_pelanggan/formulir_survei/' . $customer->formulir_survei));
                $customer->formulir_survei = null;
            }
            // jawaban persetujuan
            if ($customer->jawaban_persetujuan) {
                File::delete(public_path('document_pelanggan/jawaban_persetujuan/' . $customer->jawaban_persetujuan));
                $customer->jawaban_persetujuan = null;
            }
            // surat pengajuan jual beli
            if ($customer->surat_perjanjian_jual_beli) {
                File::delete(public_path('document_pelanggan/surat_perjanjian_jual_beli/' . $customer->surat_perjanjian_jual_beli));
                $customer->surat_perjanjian_jual_beli = null;
            }
            // sertifikat laik operasi
            if ($customer->sertifikat_laik_operasi) {
                File::delete(public_path('document_pelanggan/surat_laik_operasi/' . $customer->sertifikat_laik_operasi));
                $customer->sertifikat_laik_operasi = null;
            }
            // kuitansi pembayaran
            if ($customer->kuitansi_pembayaran) {
                File::delete(public_path('document_pelanggan/kuitansi_pembayaran/' . $customer->kuitansi_pembayaran));
                $customer->kuitansi_pembayaran = null;
            }
            // perintah kerja pemasangan
            if ($customer->perintah_kerja_pemasangan) {
                File::delete(public_path('document_pelanggan/perintah_kerja_pemasangan/' . $customer->perintah_kerja_pemasangan));
                $customer->perintah_kerja_pemasangan = null;
            }
            // berita acara pemasangan
            if ($customer->berita_acara_pemasangan) {
                File::delete(public_path('document_pelanggan/berita_acara_pemasangan/' . $customer->berita_acara_pemasangan));
                $customer->berita_acara_pemasangan = null;
            }
            // document lain
            if ($customer->dokumen_lain) {
                File::delete(public_path('document_pelanggan/dokumen_lain/' . $customer->dokumen_lain));
                $customer->dokumen_lain = null;
            }
            $isSave = $customer->save();
            if ($isSave) {
                Session::flash('warning', 'Berhasil menghapus dokument pelanggan');
                return redirect()->route('dokumen_pelanggan');
            } else {
                Session::flash('error', 'Gagal menghapus dokument pelanggan!');
                return redirect()->route('dokumen_pelanggan');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
