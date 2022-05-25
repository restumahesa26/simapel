<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id', 'nim', 'tempat_lahir', 'tanggal_lahir', 'prodi', 'nama_ayah', 'nama_ibu', 'dosen_penasehat', 'alamat_rumah', 'no_telepon'
    ];
}
