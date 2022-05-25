<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\KartuBimbingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KartuBimbinganController extends Controller
{
    public function index()
    {
        $check = KartuBimbingan::where('user_id', Auth::user()->id)->first();

        if ($check != NULL) {
            return view('pages.mahasiswa.kartu-bimbingan.index', [
                'item' => $check
            ]);
        }else {
            return view('pages.mahasiswa.kartu-bimbingan.index', [
                'item' => NULL
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_pembimbing_1' => ['required', 'string', 'max:255'],
            'dosen_pembimbing_2' => ['required', 'string', 'max:255'],
        ]);

        $check = KartuBimbingan::where('user_id', Auth::user()->id)->first();

        if ($check != NULL) {
            $check->dosen_pembimbing_1 = $request->dosen_pembimbing_1;
            $check->dosen_pembimbing_2 = $request->dosen_pembimbing_2;
            $check->status = 'Validasi';
            $check->save();

            return redirect()->route('kartu-bimbingan.index')->with('success', 'Berhasil Menyimpan Perubahan');
        }else {
            KartuBimbingan::create([
                'user_id' => Auth::user()->id,
                'dosen_pembimbing_1' => $request->dosen_pembimbing_1,
                'dosen_pembimbing_2' => $request->dosen_pembimbing_2,
                'status' => 'Validasi'
            ]);

            return redirect()->route('kartu-bimbingan.index')->with('success', 'Berhasil Menyimpan Data Baru');
        }
    }

    public function cetak_surat($pembimbing)
    {
        $item = KartuBimbingan::where('user_id', Auth::user()->id)->first();

        if ($pembimbing == 'Dosen Pembimbing 1') {
            $dosen = 'Pembimbing 1';
        }else {
            $dosen = 'Pembimbing 2';
        }

        return view('pages.print.kartu_bimbingan_skripsi', [
            'item' => $item, 'dosen' => $dosen
        ]);
    }
}
