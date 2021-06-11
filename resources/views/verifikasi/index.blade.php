@extends('layout.tamplate')
@section('title', 'List Unit | AIL')
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
  <h1 class="h3 mb-0 text-gray-800">Verifikasi</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>ID Pel</th>
            <th>Status Surat Pengajuan</th>
            <th>Status Identitas Pelanggan</th>
            <th>Status Formulir Survei</th>
            <th>Status Jawaban Persetujuan</th>
            <th>Status Surat Perjanjian Jual Beli</th>
            <th>Status Surat Laik Operasi</th>
            <th>Status Kuitansi Pembanyaran</th>
            <th>Status Perintah Kerja Pemasangam</th>
            <th>Status Berita Acara Pemasangan</th>
            <th>Status Dokumen Lain</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($dokumen_pelanggan as $key => $row)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $row->id_pel }}</td>
            <td class="text-center"><?php if ($row->status_surat_pengajuan==1){?> <i title="Terverifikasi" class="fas fa-check-circle text-success"></i><?php }else {?> <i itle="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>
            <td class="text-center"><?php if ($row->status_identitas_pelanggan==1){?> <i  title="Terverifikasi" class="fas fa-check-circle text-success"></i><?php }else {?> <i title="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>
            <td class="text-center"><?php if ($row->status_formulir_survei==1){?> <i title="Terverifikasi"  class="fas fa-check-circle text-success"></i><?php }else {?> <i title="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>
            <td class="text-center"><?php if ($row->status_jawaban_persetujuan==1){?> <i  title="Terverifikasi" class="fas fa-check-circle text-success"></i><?php }else {?> <i title="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>
            <td class="text-center"><?php if ($row->status_surat_perjanjian_jual_beli==1){?> <i title="Terverifikasi"  class="fas fa-check-circle text-success"></i><?php }else {?> <i title="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>
            <td class="text-center"><?php if ($row->status_sertifikat_laik_operasi==1){?> <i  title="Terverifikasi" class="fas fa-check-circle text-success"></i><?php }else {?> <i title="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>
            <td class="text-center"><?php if ($row->status_kuitansi_pembayaran==1){?> <i  title="Terverifikasi" class="fas fa-check-circle text-success"></i><?php }else {?> <i title="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>
            <td class="text-center"><?php if ($row->status_perintah_kerja_pemasangan==1){?> <i  title="Terverifikasi" class="fas fa-check-circle text-success"></i><?php }else {?> <i title="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>
            <td class="text-center"><?php if ($row->status_berita_acara_pemasangan==1){?> <i  title="Terverifikasi" class="fas fa-check-circle text-success"></i><?php }else {?> <i title="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>
            <td class="text-center"><?php if ($row->status_dokumen_lain==1){?> <i  title="Terverifikasi" class="fas fa-check-circle text-success"></i><?php }else {?> <i title="Belum Terverifikasi" class="fas fa-exclamation-circle text-danger"></i> <?php } ?></td>            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
