@extends('layout.tamplate')
@section('title', 'Pelanggan | AIL')
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
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Pelanggan</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('addPelanggan') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="surat_pengajuan">Surat Pengajuan Permintaan Penyambungan Baru / Perubahan Daya / Perubahan Data Pelanggan</label>
            <input type="file" class="form-control-file" id="surat_pengajuan" name="surat_pengajuan">
          </div>

          <div class="form-group">
            <label for="identitas_pelanggan">Identitas Pelanggan</label>
            <input type="file" class="form-control-file" id="identitas_pelanggan" name="identitas_pelanggan">
          </div>

          <div class="form-group">
            <label for="formulir_survei">Formulir Survey Permohonan Listrik</label>
            <input type="file" class="form-control-file" id="formulir_survei" name="formulir_survei">
          </div>

          <div class="form-group">
            <label for="jawaban_persetujuan">Jawaban Persetujuan Penyambungan Baru / Perubahan Daya / Perubahan Data Pelanggan</label>
            <input type="file" class="form-control-file" id="jawaban_persetujuan" name="jawaban_persetujuan">
          </div>

          <div class="form-group">
            <label for="surat_perjanjian_jual_beli">Surat Perjanjian Jual Beli Tenaga Listrik (SPJBTL) /Suplemen Perjanjian Jual Beli Tenaga Listrik</label>
            <input type="file" class="form-control-file" id="surat_perjanjian_jual_beli" name="surat_perjanjian_jual_beli">
          </div>

          <div class="form-group">
            <label for="surat_laik_operasi">Sertifikat Laik Operasi</label>
            <input type="file" class="form-control-file" id="surat_laik_operasi" name="surat_laik_operasi">
          </div>

          <div class="form-group">
            <label for="kuitansi_pembayaran">Kuitansi Pembayaran</label>
            <input type="file" class="form-control-file" id="kuitansi_pembayaran" name="kuitansi_pembayaran">
          </div>

          <div class="form-group">
            <label for="perintah_kerja_pemasangan">Perintah Kerja Pemasangan / Penyambungan / Pembongkaran SL / Penyambungan Sementara</label>
            <input type="file" class="form-control-file" id="perintah_kerja_pemasangan" name="perintah_kerja_pemasangan">
          </div>

          <div class="form-group">
            <label for="berita_acara_pemasangan">Berita Acara Pemasangan / Penyambungan / Pembongkaran Sambungan Tenaga Listrik</label>
            <input type="file" class="form-control-file" id="berita_acara_pemasangan" name="berita_acara_pemasangan">
          </div>

          <div class="form-group">
            <label for="dokumen_lain">Dokumen Lain</label>
            <input type="file" class="form-control-file" id="dokumen_lain" name="dokumen_lain">
          </div>

          <button class="btn btn-primary btn-sm" type="submit">
            Simpan
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
