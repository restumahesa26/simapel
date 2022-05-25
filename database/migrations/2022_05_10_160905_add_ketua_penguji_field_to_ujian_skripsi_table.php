<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKetuaPengujiFieldToUjianSkripsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ujian_skripsis', function (Blueprint $table) {
            $table->string('ketua_penguji')->nullable();
            $table->string('sekretaris')->nullable();
            $table->date('tanggal_sidang')->nullable();
            $table->string('ruang_sidang')->nullable();
            $table->time('jam_mulai_sidang')->nullable();
            $table->time('jam_selesai_sidang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ujian_skripsis', function (Blueprint $table) {
            $table->dropColumn('ketua_penguji');
            $table->dropColumn('sekretaris');
            $table->dropColumn('tanggal_sidang');
            $table->dropColumn('ruang_sidang');
            $table->dropColumn('jam_mulai_sidang');
            $table->dropColumn('jam_selesai_sidang');
        });
    }
}
