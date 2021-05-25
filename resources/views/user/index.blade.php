@extends('layout.tamplate')
@section('title', 'User List | AIL')
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
  <h1 class="h3 mb-0 text-gray-800">List User</h1>
</div>

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
    <a class="nav-link" id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab" aria-controls="nav-add" aria-selected="false">Tambah Data User</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    {{-- Tabel User --}}
    <div class="card shadow mb-4">
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
    {{-- Tabel User --}}

  </div>
  <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">

    {{-- FORM --}}
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('addUser') }}" method="post" class="user">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name='name' id="name" placeholder="Full Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name='nip' id="nip" placeholder="NIP">
              </div>
              <div class="form-group">
                <select type="text" class="form-control" name='unit_level3' id="unit_level3">
                  <option value="">-- Pilih Unit Level 3 --</option>
                  @foreach($unit_level3 as $key => $unit)
                  <option value="{{ $unit->id }}">{{ $unit->nama_unit_level3 }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block">
                Tambah User
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- FORM --}}

  </div>
</div>
@endsection
