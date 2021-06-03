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
  <h1 class="h3 mb-0 text-gray-800">Tambah Pelanggan</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('addCustomer') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_pnj">Nama Penanggung Jawaban</label>
                <input type="text" class="form-control" id="nama_pnj" name="nama_pnj" placeholder="Masukan nama penanggung jawab">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_pel">ID Pel</label>
                <input type="text" class="form-control" id="id_pel" name="id_pel" placeholder="Masukan id pel">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tarif">Tarif</label>
                <input type="text" class="form-control" id="tarif" name="tarif" placeholder="Masukan tarif">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="daya">Daya</label>
                <input type="number" class="form-control" id="daya" name="daya" placeholder="Masukan daya">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_mk">Mutasi</label>
                <select name="jenis_mk" id="jenis_mk" class="form-control">
                  <option value="">-- Pilih Jenis MK --</option>
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
                <input type="date" class="form-control" id="tgl_mutasi" name="tgl_mutasi" placeholder="Masukan taggal mutasi">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" class="form-control" id="jenis_layanan" name="jenis_layanan" placeholder="Masukan jenis layanan">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="status_dil">Status DIL</label>
                <select name="status_dil" id="status_dil" class="form-control">
                  <option value="">-- Pilih Status --</option>
                  <option value="aktif">Aktif</option>
                  <option value="hapus">Hapus</option>
                  <option value="bongkar">Bongkar</option>
                </select>
              </div>
            </div>
          </div>
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
