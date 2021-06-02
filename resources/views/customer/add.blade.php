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
        <form action="{{ route('addPelanggan') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama">
              </div>
              <div class="form-group">
                <label for="nama_pnj">Nama Penanggung Jawaban</label>
                <input type="text" class="form-control" id="nama_pnj" name="nama_pnj" placeholder="Masukan nama penanggung jawab">
              </div>
              <div class="form-group">
                <label for="id_pel">ID Pel</label>
                <input type="text" class="form-control" id="id_pel" name="id_pel" placeholder="Masukan id pel">
              </div>
              <div class="form-group">
                <label for="tarif">Tarif</label>
                <input type="text" class="form-control" id="tarif" name="tarif" placeholder="Masukan tarif">
              </div>
              <div class="form-group">
                <label for="daya">Daya</label>
                <input type="number" class="form-control" id="daya" name="daya" placeholder="Masukan daya">
              </div>
              <div class="form-group">
                <label for="jenis_mk">Mutasi</label>
                <select name="jenis_mk" id="jenis_mk">
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
              <div class="form-group">
                <label for="tgl_mutasi">Tanggal Mutasi</label>
                <input type="date" class="form-control" id="tgl_mutasi" name="tgl_mutasi" placeholder="Masukan taggal mutasi">
              </div>
              <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" class="form-control" id="jenis_layanan" name="jenis_layanan" placeholder="Masukan jenis layanan">
              </div>
              <div class="form-group">
                <label for="status_dil">Status DIL</label>
                <input type="text" class="form-control" id="status_dil" name="status_dil" placeholder="Masukan Status DIL">
              </div>
            </div>
            <div class="col-md-6">


              <div class="form-group">
                <label for="surat_pengajuan">Surat Pengajuan Permintaan Penyambungan Baru / Perubahan Daya / Perubahan Data Pelanggan</label>
                <input type="file" class="form-control-file" id="surat_pengajuan" name="surat_pengajuan">
              </div>

              <div class="form-group">
                <label for="identitas_pelanggan">Identitas Pelanggan</label>
                <input type="file" class="form-control-file" id="identitas_pelanggan" name="identitas_pelanggan">
              </div>

              <div class="form-group">
                <label for="formulir_survei">Formulir Survey Permohonan Listrik</label>
                <input type="file" class="form-control-file" id="formulir_survei" name="formulir_survei">
              </div>

              <div class="form-group">
                <label for="jawaban_persetujuan">Jawaban Persetujuan Penyambungan Baru / Perubahan Daya / Perubahan Data Pelanggan</label>
                <input type="file" class="form-control-file" id="jawaban_persetujuan" name="jawaban_persetujuan">
              </div>

              <div class="form-group">
                <label for="surat_perjanjian_jual_beli">Surat Perjanjian Jual Beli Tenaga Listrik (SPJBTL) /Suplemen Perjanjian Jual Beli Tenaga Listrik</label>
                <input type="file" class="form-control-file" id="surat_perjanjian_jual_beli" name="surat_perjanjian_jual_beli">
              </div>

              <div class="form-group">
                <label for="surat_laik_operasi">Sertifikat Laik Operasi</label>
                <input type="file" class="form-control-file" id="surat_laik_operasi" name="surat_laik_operasi">
              </div>

              <div class="form-group">
                <label for="kuitansi_pembayaran">Kuitansi Pembayaran</label>
                <input type="file" class="form-control-file" id="kuitansi_pembayaran" name="kuitansi_pembayaran">
              </div>

              <div class="form-group">
                <label for="perintah_kerja_pemasangan">Perintah Kerja Pemasangan / Penyambungan / Pembongkaran SL / Penyambungan Sementara</label>
                <input type="file" class="form-control-file" id="perintah_kerja_pemasangan" name="perintah_kerja_pemasangan">
              </div>

              <div class="form-group">
                <label for="berita_acara_pemasangan">Berita Acara Pemasangan / Penyambungan / Pembongkaran Sambungan Tenaga Listrik</label>
                <input type="file" class="form-control-file" id="berita_acara_pemasangan" name="berita_acara_pemasangan">
              </div>

              <div class="form-group">
                <label for="dokumen_lain">Dokumen Lain</label>
                <input type="file" class="form-control-file" id="dokumen_lain" name="dokumen_lain">
              </div>
            </div>
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
