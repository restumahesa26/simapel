<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianSkripsi extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id', 'semester', 'akademik', 'printout_skripsi', 'kartu_mahasiswa', 'bukti_lunas', 'pas_photo', 'cover_skripsi', 'nota_dinas', 'sk_pembimbing', 'izin_penelitian', 'keterangan_selesai', 'sertifikat_kukerta', 'khs', 'status', 'dosen_pembimbing_1', 'dosen_pembimbing_2', 'dosen_penguji_1', 'dosen_penguji_2', 'ketua_penguji', 'sekretaris', 'tanggal_sidang', 'jam_mulai_sidang', 'jam_selesai_sidang', 'ruang_sidang'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
