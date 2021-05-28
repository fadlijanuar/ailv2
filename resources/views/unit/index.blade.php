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
  <h1 class="h3 mb-0 text-gray-800">List Unit</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/unit/add') }}">Tambah Unit</a>
    <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/unit/add/unitlevel3') }}">Tambah Unit Level 3</a>
    <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/unit/add/unitlevel2') }}">Tambah Unit Level 2</a>
    <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/unit/add/kantorinduk') }}">Tambah Unit Kantor Induk</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kantor Induk <small>Level 1</small></th>
            <th>Level 2</th>
            <th>Level 3</th>
            <th>Wilayah</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($units as $key => $unit)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $unit->nama_kantor_induk }}</td>
            <td>{{ $unit->nama_unit_level2 }}</td>
            <td>{{ $unit->nama_unit_level3 }}</td>
            <td>{{ $unit->wilayah_kerja == 1 ? 'Sumut 1' : 'Sumut 2'  }}</td>
            <td>
              <form action="{{ url('/admin/unit', $unit->id) }}" method="post">
                {{-- TODO: GANTI route ke url agar bisa menampung id --}}
                <a href="{{ route('showFormEdit') }}" class="btn btn-warning btn-sm btn-circle"><i class="fa fa-pen"></i></a>
                <button type="submit" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></button>
                @csrf
                @method('delete')
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
