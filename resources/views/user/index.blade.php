@extends('layout.tamplate')
@section('title', 'User List | AIL')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">List User</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="">Tambah User</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Password</th>
            <th>Unit</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $key => $user)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['nip'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['password'] }}</td>
            <td>{{ $user['unit_id'] }}</td>
            <td>
              <a href="#" class="btn btn-info btn-sm btn-circle"><i class="fa fa-info"></i></a>
              <a href="#" class="btn btn-warning btn-sm btn-circle"><i class="fa fa-pen"></i></a>
              <a href="#" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
