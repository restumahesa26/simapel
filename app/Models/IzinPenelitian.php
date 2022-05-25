<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinPenelitian extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id', 'lokasi_penelitian', 'nama_pembimbing_1', 'nip_pembimbing_1', 'nama_pembimbing_2', 'nip_pembimbing_2', 'status', 'pesan'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
