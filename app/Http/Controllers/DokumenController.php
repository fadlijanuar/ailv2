<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


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
            $id_pelanggan = Customer::all($columns = ['id_pel']);
            return view('document.index', ['id_pelanggan' => $id_pelanggan]);
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
            $id_pelanggan = Customer::all($columns = ['id_pel']);
            return view('document.add', ['id_pelanggan' => $id_pelanggan]);
        } else {
            return redirect()->route('login');
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
            'id_pel' => 'required'
        ];

        $messages = [
            'id_pel.required' => "ID pelanggan wajib diisi"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // upload document surat pengajuan
        $surat_pengajuan = $request->surat_pengajuan;
        $surat_pengajuan_name = Str::random(20) . "." . $surat_pengajuan->extension();
        $surat_pengajuan->move(public_path("document_pelanggan/surat_pengajuan"), $surat_pengajuan_name);

        // upload document identitas pelanggan
        $identitas_pelanggan = $request->identitas_pelanggan;
        $identitas_pelanggan_name = Str::random(20) . "." . $identitas_pelanggan->extension();
        $identitas_pelanggan->move(public_path("document_pelanggan/identitas_pelanggan"), $identitas_pelanggan_name);

        // upload document formulir survei
        $formulir_survei = $request->formulir_survei;
        $formulir_survei_name = Str::random(20) . "." . $formulir_survei->extension();
        $formulir_survei->move(public_path("document_pelanggan/formulir_survei"), $formulir_survei_name);

        // upload document jawaban persetujuan
        $jawaban_persetujuan = $request->jawaban_persetujuan;
        $jawaban_persetujuan_name = Str::random(20) . "." . $jawaban_persetujuan->extension();
        $jawaban_persetujuan->move(public_path("document_pelanggan/jawaban_persetujuan"), $jawaban_persetujuan_name);

        // upload document surat_perjanjian_jual_beli
        $surat_perjanjian_jual_beli = $request->surat_perjanjian_jual_beli;
        $surat_perjanjian_jual_beli_name = Str::random(20) . "." . $surat_perjanjian_jual_beli->extension();
        $surat_perjanjian_jual_beli->move(public_path("document_pelanggan/surat_perjanjian_jual_beli"), $surat_perjanjian_jual_beli_name);

        // upload document surat_laik_operasi
        $surat_laik_operasi = $request->surat_laik_operasi;
        $surat_laik_operasi_name = Str::random(20) . "." . $surat_laik_operasi->extension();
        $surat_laik_operasi->move(public_path("document_pelanggan/surat_laik_operasi"), $surat_laik_operasi_name);

        // upload document kuitansi_pembayaran
        $kuitansi_pembayaran = $request->kuitansi_pembayaran;
        $kuitansi_pembayaran_name = Str::random(20) . "." . $kuitansi_pembayaran->extension();
        $kuitansi_pembayaran->move(public_path("document_pelanggan/kuitansi_pembayaran"), $kuitansi_pembayaran_name);

        // upload document perintah_kerja_pemasangan
        $perintah_kerja_pemasangan = $request->perintah_kerja_pemasangan;
        $perintah_kerja_pemasangan_name = Str::random(20) . "." . $perintah_kerja_pemasangan->extension();
        $perintah_kerja_pemasangan->move(public_path("document_pelanggan/perintah_kerja_pemasangan"), $perintah_kerja_pemasangan_name);

        // upload document perintah_kerja_pemasangan
        $berita_acara_pemasangan = $request->berita_acara_pemasangan;
        $berita_acara_pemasangan_name = Str::random(20) . "." . $berita_acara_pemasangan->extension();
        $berita_acara_pemasangan->move(public_path("document_pelanggan/berita_acara_pemasangan"), $berita_acara_pemasangan_name);

        // upload document perintah_kerja_pemasangan
        $dokumen_lain = $request->dokumen_lain;
        $dokumen_lain_name = Str::random(20) . "." . $dokumen_lain->extension();
        $dokumen_lain->move(public_path("document_pelanggan/dokumen_lain"), $dokumen_lain_name);

        // TODO: simpan ke db
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokumen $dokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokumen $dokumen)
    {
        //
    }
}
