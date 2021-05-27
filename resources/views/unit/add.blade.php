@extends('layout.tamplate')
@section('title', 'List Unit | AIL')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Unit</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <form action="" method="post">
          <div class="form-group">
            <label for="kantor_induk">Nama Kantor Induk</label>
            <input type="text" class="form-control" name="kantor_induk" id="kantor_induk" placeholder="Masukan nama kantor induk">
          </div>
          <div class="form-group">
            <label for="unit_level2">Nama Unit Level 2</label>
            <input type="text" class="form-control" name="unit_level2" id="unit_level2" placeholder="Masukan nama unit level 2">
          </div>
          <div class="form-group">
            <label for="unit_level3">Nama Unit Level 3</label>
            <input type="text" class="form-control" name="unit_level3" id="unit_level3" placeholder="Masukan nama unit level 3">
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
