<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianSkripsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_skripsis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('semester');
            $table->string('akademik');
            $table->string('printout_skripsi');
            $table->string('kartu_mahasiswa');
            $table->string('bukti_lunas');
            $table->string('pas_photo');
            $table->string('cover_skripsi');
            $table->string('nota_dinas');
            $table->string('sk_pembimbing');
            $table->string('izin_penelitian');
            $table->string('keterangan_selesai');
            $table->string('sertifikat_kukerta');
            $table->string('khs');
            $table->enum('status',['Kirim','Tolak','Terima'])->default('Kirim');
            $table->text('pesan')->nullable();
            $table->string('dosen_pembimbing_1')->nullable();
            $table->string('dosen_pembimbing_2')->nullable();
            $table->string('dosen_penguji_1')->nullable();
            $table->string('dosen_penguji_2')->nullable();
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
        Schema::dropIfExists('ujian_skripsis');
    }
}
