@extends('layout.tamplate')
@section('title', 'Pelanggan | AIL')
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
  <h1 class="h3 mb-0 text-gray-800">Edit Pelanggan</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('editCustomer') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" value="{{ $customer['nama'] }}" class="form-control" id="nama" name="nama" placeholder="Masukan nama">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_pnj">Nama Penanggung Jawaban</label>
                <input type="text" value="{{ $customer['nama_pnj'] }}" class="form-control" id="nama_pnj" name="nama_pnj" placeholder="Masukan nama penanggung jawab">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_pel">ID Pel</label>
                <input type="text" value="{{ $customer['id_pel'] }}" class="form-control" id="id_pel" name="id_pel" placeholder="Masukan id pel">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tarif">Tarif</label>
                <input type="text" value="{{ $customer['tarif'] }}" class="form-control" id="tarif" name="tarif" placeholder="Masukan tarif">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="daya">Daya</label>
                <input type="number" value="{{ $customer['daya'] }}" class="form-control" id="daya" name="daya" placeholder="Masukan daya">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_mk">Mutasi</label>
                <select name="jenis_mk" id="jenis_mk" class="form-control">
                  <option value="">-- Pilih Jenis Mk</option>
                  <option value="A">A.Pasang Baru</option>
                  <option value="B">B.Perubahan Nama</option>
                  <option value="C">C.Perubahan Alamat</option>
                  <option value="D">D.Perubahan Tarif</option>
                  <option value="E">E.Perubahan Daya</option>
                  <option value="F">F.Biaya Panyambungan/UJL</option>
                  <option value="G">G.Angsuran</option>
                  <option value="H">H.Pangaturan Fungsi TUL2-3-5</option>
                  <option value="I">I.Biaya Pemakaian SEWA</option>
                  <option value="J">J.Alat Pengukur/Pembatas</option>
                  <option value="K">K.Faktor Kali Meter</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_mutasi">Tanggal Mutasi</label>
                <input type="date" value="{{ $customer['tgl_mutasi'] }}" class="form-control" id="tgl_mutasi" name="tgl_mutasi" placeholder="Masukan taggal mutasi">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" value="{{ $customer['jenis_layanan'] }}" class="form-control" id="jenis_layanan" name="jenis_layanan" placeholder="Masukan jenis layanan">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="status_dil">Status DIL</label>
                <input type="text" value="{{ $customer['status_dil'] }}" class="form-control" id="status_dil" name="status_dil" placeholder="Masukan Status DIL">
              </div>
            </div>
          </div>
          <input type="hidden" value="{{ $customer['id'] }}" name="id">
          <a href="{{ route('customer') }}" class="btn btn-warning">Kembali</a>
          <button class="btn btn-primary" type="submit">
            Simpan
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $('#jenis_mk').val("{{ $customer['jenis_mk'] }}").change();

</script>
@endsection
