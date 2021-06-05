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
  <h1 class="h3 mb-0 text-gray-800">Dokumen Pelanggan</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/dokumen_pelanggan/add') }}">Tambah Dokumen Pelanggan</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>ID Pel</th>
            <th>Surat Pengajuan</th>
            <th>Identitas Pelanggan</th>
            <th>Formulir Survei</th>
            <th>Jawaban Persetujuan</th>
            <th>Surat Perjanjian Jual Beli</th>
            <th>Surat Laik Operasi</th>
            <th>Kuitansi Pembanyaran</th>
            <th>Perintah Kerja Pemasangam</th>
            <th>Berita Acara Pemasangan</th>
            <th>Dokumen Lain</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $key => $row)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $row->id_pel }}</td>
            <td class="text-center">{!! $row->surat_pengajuan ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">{!! $row->identitas_pelanggan ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">{!! $row->formulir_survei ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">{!! $row->jawaban_persetujuan ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">{!! $row->surat_perjanjian_jual_beli ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">{!! $row->sertifikat_laik_operasi ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">{!! $row->kuitansi_pembayaran ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">{!! $row->perintah_kerja_pemasangan ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">{!! $row->berita_acara_pemasangan ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">{!! $row->dokumen_lain ? '<i class="fas fa-check text-success"></i>' : '' !!}</td>
            <td class="text-center">
              <a href="{{ url('admin/dokumen_pelanggan/'.$row->id) }}" class="btn btn-info btn-circle btn-sm"><i class="fa fa-info"></i></a>
              <a href="#" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
