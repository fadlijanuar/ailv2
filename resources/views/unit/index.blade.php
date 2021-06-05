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

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-unit_level3-tab" data-toggle="pill" href="#pills-unit_level3" role="tab" aria-controls="pills-unit_level3" aria-selected="true">Unit level 3</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-unit_level2-tab" data-toggle="pill" href="#pills-unit_level2" role="tab" aria-controls="pills-unit_level2" aria-selected="false">Unit Level 2</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-kantor-induk-tab" data-toggle="pill" href="#pills-kantor-induk" role="tab" aria-controls="pills-kantor-induk" aria-selected="false">Kantor Induk</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-unit_level3" role="tabpanel" aria-labelledby="pills-unit_level3-tab">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        {{-- <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/unit/add') }}">Tambah Unit</a> --}}
        <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/unit/add/unitlevel3') }}">Tambah Unit Level 3</a>
      </div>
      <div class="card-body">
        <small>Info : Data yang tampil ditabel adalah data yang merujuk pada unit level 3 saja</small>
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
                    <a href="{{ url('/admin/unit/edit', $unit->id) }}" class="btn btn-warning btn-sm btn-circle"><i class="fa fa-pen"></i></a>
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
  </div>
  <div class="tab-pane fade" id="pills-unit_level2" role="tabpanel" aria-labelledby="pills-unit_level2-tab">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/unit/add/unitlevel2') }}">Tambah Unit Level 2</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableUnitLevel2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kantor Induk <small>Level 1</small></th>
                <th>Level 2</th>
                <th>Wilayah</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($unit_level2 as $key => $unit)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $unit->nama_kantor_induk }}</td>
                <td>{{ $unit->nama_unit_level2 }}</td>
                <td>{{ $unit->wilayah_kerja == 1 ? 'Sumut 1' : 'Sumut 2'  }}</td>
                <td>
                  <form action="{{ url('/admin/unit', $unit->id) }}" method="post">
                    <a href="{{ url('/admin/unit/edit', $unit->id) }}" class="btn btn-warning btn-sm btn-circle"><i class="fa fa-pen"></i></a>
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
  </div>
  <div class="tab-pane fade" id="pills-kantor-induk" role="tabpanel" aria-labelledby="pills-kantor-induk-tab">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a class="m-0 btn btn-primary btn-sm font-weight-bold" href="{{ url('/admin/unit/add/kantorinduk') }}">Tambah Unit Kantor Induk</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableKantorInduk" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kantor Induk <small>Level 1</small></th>
                <th>Wilayah</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($kantor_induk as $key => $unit)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $unit->nama_kantor_induk }}</td>
                <td>{{ $unit->wilayah_kerja == 1 ? 'Sumut 1' : 'Sumut 2'  }}</td>
                <td>
                  <form action="{{ url('/admin/unit', $unit->id) }}" method="post">
                    <a href="{{ url('/admin/unit/edit', $unit->id) }}" class="btn btn-warning btn-sm btn-circle"><i class="fa fa-pen"></i></a>
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
  </div>
</div>
@endsection

@section('script')
<script>
  $('#dataTableKantorInduk').dataTable()
  $('#dataTableUnitLevel2').dataTable()

</script>
@endsection
