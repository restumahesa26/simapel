<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarProposal extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id', 'judul_skripsi', 'status', 'pesan', 'tanggal_seminar', 'jam_mulai_seminar', 'jam_selesai_seminar', 'ruang_seminar', 'dosen_pembimbing_1', 'dosen_pembimbing_2', 'ketua_penguji', 'sekretaris'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
