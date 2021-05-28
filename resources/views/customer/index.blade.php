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
  <h1 class="h3 mb-0 text-gray-800">List Pelanggan</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/pelanggan/add') }}">Tambah Pelanggan</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Surat Pengajuan</th>
            <th>Identitas Pelanggan</th>
            <th>Formulir Survey</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
