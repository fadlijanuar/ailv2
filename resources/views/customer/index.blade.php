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
    <form action="" method="post" class="mt-3" id="filter">
      <div class="form-row">

        <div class="form-group col-md-3">
          <label for="daya">Daya</label>
          <select id="daya" name='daya' class="form-control form-control-sm" required>
            <option value="">Daya</option>
						<option value="0-1000">0 - 1000</option>
						<option value="1001-2500">1001 - 2500</option>
            <option value="251-5000">2501 - 5000</option>
            <option value="5001-10000">5001 - 10000</option>
            <option value="10001-100000">10001 - 100000</option>
            <option value="1000001-500000">1000001 - 500000</option>
            <option value="500001-100000000000">500001 Ke atas</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <label for="tgl_mutasi">Tanggal Mutasi</label>
          <input type="text" name="tgl_mutasi" id="tgl_mutasi" class="form-control form-control-sm" placeholder="Range Taggal" required>
        </div>
				
				<div class="form-group col-md-3">
					<label for="tgl_mutasi">Mencari Nama</label>
					<input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Masukan nama" required autocomplete="off">	
				</div>

      </div>
      <div class="form-row">
        <div class="form-group col-md-1">
          <button type="submit" class="btn btn-primary btn-sm" id="btn-filter">Filter</button>
        </div>
      </div>
    </form>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-customers" id="dataTable-customers" width="100%" cellspacing="0">
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
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(function() {

    let startDate = '';
    let endDate = '';

    $('input[name="tgl_mutasi"]').daterangepicker({
      autoUpdateInput: false
      , locale: {
        cancelLabel: 'Clear'
      }
    });

    $('input[name="tgl_mutasi"]').on('apply.daterangepicker', function(ev, picker) {
      startDate = picker.startDate.format('YYYY-MM-DD')
      endDate = picker.endDate.format('YYYY-MM-DD')
      $(this).val(startDate + ' - ' + endDate);
    });


    var table = $('#dataTable-customers').DataTable({
			searching: false,
      responsive: true,
			scrollX: true, 
			processing: true, 
			serverSide: true, 
			ajax: {
			url: "{{ route('customer') }}",
				data: function(data) {
					data.daya = $('#daya').val()
					data.startDate = startDate
					data.endDate = endDate
					data.nama = $('#nama').val()
				}
      }, 
			columns: [{
          data: 'DT_RowIndex', 
					name: 'DT_RowIndex'
      	}, {
          data: 'IDPEL', 
					nama: 'IDPEL'
     	 	}, {
          data: 'NAMA', 
					name: 'NAMA'
        }, {
          data: 'NAMAPNJ', 
					name: 'NAMAPNJ'
        }, {
          data: 'TARIF', 
					name: 'TARIF'
        }, {
          data: 'DAYA', 
					name: 'DAYA'
        }, {
          data: 'JENIS_MK', 
					name: 'JENIS_MK'
        }, {
          data: 'TGLRUBAH_MK', 
					name: 'TGLRUBAH_MK'
        }, {
          data: 'JENISLAYANAN', 
					name: 'JENISLAYANAN'
        }, {
          data: 'STATUS_DIL', 
					name: 'STATUS_DIL'
        }, {
          data: 'actions', 
					name: 'actions'
        }
      ]
    })

    $('#filter').on('submit', function(e) {
      e.preventDefault();
			table.draw()
		})

  })

</script>
@endsection
