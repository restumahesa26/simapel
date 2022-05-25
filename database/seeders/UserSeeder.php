<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'ADMIN',
            'password' => Hash::make('password')
        ]);

        $mahasiswa = User::create([
            'nama' => 'Mufti Restu Mahesa',
            'email' => 'mufti.restumahesa@gmail.com',
            'role' => 'MAHASISWA',
            'password' => Hash::make('password')
        ]);

        Mahasiswa::create([
            'user_id' => $mahasiswa->id,
            'nim' => 'G1A019014',
            'tempat_lahir' => 'Cilacap',
            'tanggal_lahir' => '2001-10-26',
            'prodi' => 'Informatika',
            'nama_ayah' => 'Taris',
            'nama_ibu' => 'Irdaniah',
            'dosen_penasehat' => 'Dewi Harlina',
            'alamat_rumah' => 'Desa Pasar Semerap',
            'no_telepon' => '08117482512'
        ]);
    }
}
