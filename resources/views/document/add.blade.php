@extends('layout.tamplate')
@section('title', 'Dokumen Pelanggan | AIL')
@section('content')


@if(session('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Something it's wrong:
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@if (Session::has('success'))
<div class="alert alert-success">
  {{ Session::get('success') }}
</div>
@endif
@if (Session::has('warning'))
<div class="alert alert-warning">
  {{ Session::get('warning') }}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger">
  {{ Session::get('error') }}
</div>
@endif

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dokumen Pelanggan</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex align-items-center">
    <a href="{{ route('dokumen_pelanggan') }}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-arrow-left"></i></a>
    <p class="m-0 font-weight-bold">Tambah Dokumen Pelanggan</p>
  </div>
  <div class="card-body">
    <form action="{{ route('add_dokumen_pelanggan') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="id_pel">ID Pelanggan</label>
            <input type="number" name="id_pel" list="list_id_pel" class="form-control" placeholder="Masukan Id Pelanggan">
            <datalist id="list_id_pel">
              @foreach($id_pelanggan as $key => $row)
              <option value="{{ $row['id_pel'] }}">{{ $row['id_pel'] }}</option>
              @endforeach
            </datalist>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="surat_pengajuan">Surat Pengajuan Permintaan Penyambungan Baru / Perubahan Daya / Perubahan Data Pelanggan</label>
            <input type="file" class="form-control-file" id="surat_pengajuan" name="surat_pengajuan">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="identitas_pelanggan">Identitas Pelanggan</label>
            <input type="file" class="form-control-file" id="identitas_pelanggan" name="identitas_pelanggan">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="formulir_survei">Formulir Survey Permohonan Listrik</label>
            <input type="file" class="form-control-file" id="formulir_survei" name="formulir_survei">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="jawaban_persetujuan">Jawaban Persetujuan Penyambungan Baru / Perubahan Daya / Perubahan Data Pelanggan</label>
            <input type="file" class="form-control-file" id="jawaban_persetujuan" name="jawaban_persetujuan">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="surat_perjanjian_jual_beli">Surat Perjanjian Jual Beli Tenaga Listrik (SPJBTL) /Suplemen Perjanjian Jual Beli Tenaga Listrik</label>
            <input type="file" class="form-control-file" id="surat_perjanjian_jual_beli" name="surat_perjanjian_jual_beli">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="surat_laik_operasi">Sertifikat Laik Operasi</label>
            <input type="file" class="form-control-file" id="surat_laik_operasi" name="surat_laik_operasi">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="kuitansi_pembayaran">Kuitansi Pembayaran</label>
            <input type="file" class="form-control-file" id="kuitansi_pembayaran" name="kuitansi_pembayaran">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="perintah_kerja_pemasangan">Perintah Kerja Pemasangan / Penyambungan / Pembongkaran SL / Penyambungan Sementara</label>
            <input type="file" class="form-control-file" id="perintah_kerja_pemasangan" name="perintah_kerja_pemasangan">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="berita_acara_pemasangan">Berita Acara Pemasangan / Penyambungan / Pembongkaran Sambungan Tenaga Listrik</label>
            <input type="file" class="form-control-file" id="berita_acara_pemasangan" name="berita_acara_pemasangan">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="dokumen_lain">Dokumen Lain</label>
            <input type="file" class="form-control-file" id="dokumen_lain" name="dokumen_lain">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection
