<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuBimbingan extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id', 'dosen_pembimbing_1', 'dosen_pembimbing_2', 'status', 'pesan'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
