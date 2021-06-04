<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('id_pel')->unique();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->string('nama_pnj');
            $table->string('tarif');
            $table->integer('daya');
            $table->string('jenis_mk');
            $table->date('tgl_mutasi');
            $table->string('jenis_layanan');
            $table->enum('status_dil', ['aktif', 'hapus', 'bongkar']);
            $table->string('surat_pengajuan')->unique()->nullable();
            $table->string('identitas_pelanggan')->unique()->nullable();
            $table->string('formulir_survei')->unique()->nullable();
            $table->string('jawaban_persetujuan')->unique()->nullable();
            $table->string('surat_perjanjian_jual_beli')->unique()->nullable();
            $table->string('sertifikat_laik_operasi')->unique()->nullable();
            $table->string('kuitansi_pembayaran')->unique()->nullable();
            $table->string('perintah_kerja_pemasangan')->unique()->nullable();
            $table->string('berita_acara_pemasangan')->unique()->nullable();
            $table->string('dokumen_lain')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
