@extends('layout.tamplate')
@section('title', 'List Unit | AIL')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">List Unit</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="">Tambah Unit</a>
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
      </table>
    </div>
  </div>
</div>
@endsection
