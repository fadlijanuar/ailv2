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
  <h1 class="h3 mb-0 text-gray-800">Detail Dokumen Pelanggan</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ url('/admin/dokumen_pelanggan') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row">
            <input type="hidden" name="id_pel" id="id_pel" class="id" value="{{ $customer->id }}">
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_pel">ID Pelanggan :</label>
                <p>{{ $customer->id_pel }}</p>
              </div>
            </div>
            {{-- SURAT PENGAJUAN --}}
            <div class="col-md-4">
              @if($customer->surat_pengajuan)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/surat_pengajuan/'.$customer->surat_pengajuan) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Mohon maaf dokumen belum diupload</p>
              </div>
              @endif
              <div class="form-group">
                <label for="surat_pengajuan" class="text-dark">Surat Pengajuan Permintaan Penyambungan Baru / Perubahan Daya / Perubahan Data Pelanggan</label>
                <input type="file" class="form-control-file" id="surat_pengajuan" name="surat_pengajuan">
                <small>pilih gambar jika ingin mengubah</small>
              </div>
            </div>
            {{-- IDENTITAS PELANGGAN --}}
            <div class="col-md-4">
              @if($customer->identitas_pelanggan)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/identitas_pelanggan/'.$customer->identitas_pelanggan) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Mohon maaf dokumen belum diupload</p>
              </div>
              @endif
              <div class="form-group">
                <div class="form-group">
                  <label for="identitas_pelanggan" class="text-dark">Identitas Pelanggan</label>
                  <input type="file" class="form-control-file" id="identitas_pelanggan" name="identitas_pelanggan">
                  <small>pilih gambar jika ingin mengubah</small>
                </div>
              </div>
            </div>
            {{-- FORMULIR SURVEI --}}
            <div class="col-md-4">
              @if($customer->formulir_survei)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/formulir_survei/'.$customer->formulir_survei) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Mohon maaf dokumen belum diupload</p>
              </div>
              @endif
              <div class="form-group">
                <label for="formulir_survei" class="text-dark">Formulir Survey Permohonan Listrik</label>
                <input type="file" class="form-control-file" id="formulir_survei" name="formulir_survei">
                <small>pilih gambar jika ingin mengubah</small>
              </div>
            </div>
            {{-- JADWAL PERSETUJUAN --}}
            <div class="col-md-4">
              @if($customer->jadwal_persetujuan)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/jadwal_persetujuan/'.$customer->jadwal_persetujuan) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Mohon maaf dokumen belum diupload</p>
              </div>
              @endif
              <div class="form-group">
                <label for="jawaban_persetujuan" class="text-dark">Jawaban Persetujuan Penyambungan Baru / Perubahan Daya / Perubahan Data Pelanggan</label>
                <input type="file" class="form-control-file" id="jawaban_persetujuan" name="jawaban_persetujuan">
                <small>pilih gambar jika ingin mengubah</small>
              </div>
            </div>
            {{-- SURAT PERJANJIAN JUAL BELI --}}
            <div class="col-md-4">
              @if($customer->surat_perjanjian_jual_beli)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/surat_perjanjian_jual_beli/'.$customer->surat_perjanjian_jual_beli) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Mohon maaf dokumen belum diupload</p>
              </div>
              @endif
              <div class="form-group">
                <label for="surat_perjanjian_jual_beli" class="text-dark">Surat Perjanjian Jual Beli Tenaga Listrik (SPJBTL) /Suplemen Perjanjian Jual Beli Tenaga Listrik</label>
                <input type="file" class="form-control-file" id="surat_perjanjian_jual_beli" name="surat_perjanjian_jual_beli">
                <small>pilih gambar jika ingin mengubah</small>
              </div>
            </div>
            {{-- SURAT LAIK OPERASI --}}
            <div class="col-md-4">
              @if($customer->surat_laik_operasi)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/surat_laik_operasi/'.$customer->sertifikat_laik_operasi) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Mohon maaf dokumen belum diupload</p>
              </div>
              @endif
              <div class="form-group">
                <label for="surat_laik_operasi" class="text-dark">Sertifikat Laik Operasi</label>
                <input type="file" class="form-control-file" id="surat_laik_operasi" name="surat_laik_operasi">
                <small>pilih gambar jika ingin mengubah</small>
              </div>
            </div>
            {{-- KUITANSI PEMBANYARAN --}}
            <div class="col-md-4">
              @if($customer->kuitansi_pembayaran)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/kuitansi_pembayaran/'.$customer->kuitansi_pembayaran) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Mohon maaf dokumen belum diupload</p>
              </div>
              @endif
              <div class="form-group">
                <label for="kuitansi_pembayaran" class="text-dark">Kuitansi Pembayaran</label>
                <input type="file" class="form-control-file" id="kuitansi_pembayaran" name="kuitansi_pembayaran">
                <small>pilih gambar jika ingin mengubah</small>
              </div>
            </div>
            {{-- PERINTAH KERJA PEMASANGAN --}}
            <div class="col-md-4">
              @if($customer->perintah_kerja_pemasangan)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/perintah_kerja_pemasangan/'.$customer->perintah_kerja_pemasangan) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Mohon maaf dokumen belum diupload</p>
              </div>
              @endif
              <div class="form-group">
                <label for="perintah_kerja_pemasangan" class="text-dark">Perintah Kerja Pemasangan / Penyambungan / Pembongkaran SL / Penyambungan Sementara</label>
                <input type="file" class="form-control-file" id="perintah_kerja_pemasangan" name="perintah_kerja_pemasangan">
                <small>pilih gambar jika ingin mengubah</small>
              </div>
            </div>
            {{-- BERITA ACARA PEMASANGAN --}}
            <div class="col-md-4">
              @if($customer->berita_acara_pemasangan)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/berita_acara_pemasangan/'.$customer->berita_acara_pemasangan) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Mohon maaf dokumen belum diupload</p>
              </div>
              @endif
              <div class="form-group">
                <label for="berita_acara_pemasangan" class="text-dark">Berita Acara Pemasangan / Penyambungan / Pembongkaran Sambungan Tenaga Listrik</label>
                <input type="file" class="form-control-file" id="berita_acara_pemasangan" name="berita_acara_pemasangan">
                <small>pilih gambar jika ingin mengubah</small>
              </div>
            </div>
            {{-- DOKUMEN LAIN --}}
            <div class="col-md-4">
              @if($customer->dokumen_lain)
              <iframe width="100%" height="400px" src="{{ asset('document_pelanggan/dokumen_lain/'.$customer->dokumen_lain) }}" type="pdf"></iframe>
              @else
              <div width="100%" style="height: 400px" class="d-flex border rounded justify-content-center align-items-center">
                <p>Tidak ada dokumen yang diupload</p>
              </div>
              @endif
              <div class="form-group">
                <label for="dokumen_lain" class="text-dark">Dokumen Lain</label>
                <input type="file" class="form-control-file" id="dokumen_lain" name="dokumen_lain">
                <small>pilih gambar jika ingin mengubah</small>
              </div>
            </div>
          </div>

          <a href="{{ route('dokumen_pelanggan') }}" class="btn btn-warning">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
