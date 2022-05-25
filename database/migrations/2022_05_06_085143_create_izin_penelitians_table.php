<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzinPenelitiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin_penelitians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('lokasi_penelitian');
            $table->string('nama_pembimbing_1');
            $table->string('nip_pembimbing_1');
            $table->string('nama_pembimbing_2');
            $table->string('nip_pembimbing_2');
            $table->enum('status',['Validasi','Terima','Tolak'])->default('Validasi');
            $table->string('pesan')->nullable();
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
        Schema::dropIfExists('izin_penelitians');
    }
}
