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
    <form action="" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="id_pel">ID Pelanggan</label>
            <input type="text" name="id_pel" list="list_id_pel" class="form-control" placeholder="Masukan Id Pelanggan">
            <datalist id="list_id_pel">
              @foreach($id_pelanggan as $key => $row)
              <option value="{{ $row['id_pel'] }}">{{ $row['id_pel'] }}</option>
              @endforeach
            </datalist>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
