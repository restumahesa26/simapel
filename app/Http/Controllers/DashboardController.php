<?php

namespace App\Http\Controllers;

use App\Models\IzinPenelitian;
use App\Models\Mahasiswa;
use App\Models\SeminarProposal;
use App\Models\UjianSkripsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $mahasiswa = User::where('role', 'MAHASISWA')->count();
        $izin = IzinPenelitian::where('status', 'Terima')->count();
        $seminar = SeminarProposal::where('status', 'Terima')->count();
        $ujian = UjianSkripsi::where('status', 'Terima')->count();

        return view('pages.dashboard')->with(compact('mahasiswa', 'seminar', 'ujian', 'izin'));
    }

    public function edit_profile()
    {
        $item = User::findOrFail(Auth::user()->id);

        return view('pages.profile', [
            'item' => $item
        ]);
    }

    public function update_profile(Request $request)
    {
        $item = User::findOrFail(Auth::user()->id);

        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
        ]);

        if (Auth::user()->role == 'MAHASISWA') {
            $request->validate([
                'nim' => ['required', 'string', 'max:12', 'min:10'],
                'tempat_lahir' => ['required', 'string', 'max:255'],
                'tanggal_lahir' => ['required', 'date'],
                'nama_ayah' => ['required', 'string', 'max:255'],
                'nama_ibu' => ['required', 'string', 'max:255'],
                'prodi' => ['required', 'string', 'max:255'],
                'dosen_penasehat' => ['required', 'string', 'max:255'],
                'alamat_rumah' => ['required', 'string', 'max:255'],
                'no_telepon' => ['required', 'string', 'max:255'],
            ]);
        }

        if ($item->email != $request->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $item->nama = $request->nama;
        $item->email = $request->email;
        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();
        if (Auth::user()->role == 'MAHASISWA') {
            $mahasiswa->nim = $request->nim;
            $mahasiswa->tempat_lahir = $request->tempat_lahir;
            $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $mahasiswa->nama_ayah = $request->nama_ayah;
            $mahasiswa->nama_ibu = $request->nama_ibu;
            $mahasiswa->prodi = $request->prodi;
            $mahasiswa->dosen_penasehat = $request->dosen_penasehat;
            $mahasiswa->alamat_rumah = $request->alamat_rumah;
            $mahasiswa->no_telepon = $request->no_telepon;
            $mahasiswa->save();
        }

        return redirect()->route('profile.edit')->with('success', 'Berhasil Mengubah Profile');
    }
}
