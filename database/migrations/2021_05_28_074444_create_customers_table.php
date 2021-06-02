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
            $table->string('nama');
            $table->string('nama_pnj');
            $table->string('tarif');
            $table->integer('daya');
            $table->string('jenis_mk');
            $table->date('tgl_mutasi');
            $table->string('jenis_layanan');
            $table->string('status_dil');
            $table->string('surat_pengajuan')->unique();
            $table->string('identitas_pelanggan')->unique();
            $table->string('formulir_survei')->unique();
            $table->string('jawaban_persetujuan')->unique();
            $table->string('surat_perjanjian_jual_beli')->unique();
            $table->string('sertifikat_laik_operasi')->unique();
            $table->string('kuitansi_pembanyaran')->unique();
            $table->string('perintah_kerja_pemasangan')->unique();
            $table->string('berita_acara_pemasangan')->unique();
            $table->string('dokumen_lain')->unique();
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
