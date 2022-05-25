<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('judul_skripsi');
            $table->enum('status',['Validasi','Terima','Tolak'])->default('Validasi');
            $table->string('pesan')->nullable();
            $table->date('tanggal_seminar')->nullable();
            $table->string('ruang_seminar')->nullable();
            $table->time('jam_mulai_seminar')->nullable();
            $table->time('jam_selesai_seminar')->nullable();
            $table->string('dosen_pembimbing_1')->nullable();
            $table->string('dosen_pembimbing_2')->nullable();
            $table->string('ketua_penguji')->nullable();
            $table->string('sekretaris')->nullable();
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
        Schema::dropIfExists('seminar_proposals');
    }
}
