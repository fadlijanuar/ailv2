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
    <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/customer/add') }}">Tambah Pelanggan</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>NO.</th>
            <th>IDPEL</th>
            <th>NAMA</th>
            <th>NAMA PNJ</th>
            <th>TAFIR</th>
            <th>DAYA</th>
            <th>Jenis MK</th>
            <th>TGL MUTASI</th>
            <th>JENIS LAYANAN</th>
            <th>STATUS DIL</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $key => $row)
          <tr>
            <td>{{ $key +1 }}</td>
            <td>{{ $row['id_pel'] }}</td>
            <td>{{ $row['nama'] }}</td>
            <td>{{ $row['nama_pnj'] }}</td>
            <td>{{ $row['tarif'] }}</td>
            <td>{{ $row['daya'] }}</td>
            <td>{{ $row['jenis_mk'] }}</td>
            <td>{{ date('d M Y', strtotime($row['tgl_mutasi'])) }}</td>
            <td>{{ $row['jenis_layanan'] }}</td>
            <td>{{ $row['status_dil'] }}</td>
            <td>
              <form action="{{ url('admin/customer/delete/' . $row['id']) }}" method="post">
                @csrf
                @method('delete')
                <a class="btn btn-warning btn-sm btn-circle" href="{{ url('admin/customer/edit/'.$row['id']) }}"><i class="fa fa-edit"></i></a>
                <button type="submit" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></button>
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
