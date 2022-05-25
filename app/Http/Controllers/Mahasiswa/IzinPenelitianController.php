<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\IzinPenelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinPenelitianController extends Controller
{
    public function index()
    {
        $check = IzinPenelitian::where('user_id', Auth::user()->id)->first();

        if ($check != NULL) {
            return view('pages.mahasiswa.izin-penelitian.index', [
                'item' => $check
            ]);
        }else {
            return view('pages.mahasiswa.izin-penelitian.index', [
                'item' => NULL
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi_penelitian' => ['required', 'string', 'max:255'],
            'nama_pembimbing_1' => ['required', 'string', 'max:255'],
            'nip_pembimbing_1' => ['required', 'string', 'max:255'],
            'nama_pembimbing_2' => ['required', 'string', 'max:255'],
            'nama_pembimbing_2' => ['required', 'string', 'max:255'],
        ]);

        $check = IzinPenelitian::where('user_id', Auth::user()->id)->first();

        if ($check != NULL) {
            $check->nama_pembimbing_1 = $request->nama_pembimbing_1;
            $check->nip_pembimbing_1 = $request->nip_pembimbing_1;
            $check->nama_pembimbing_2 = $request->nama_pembimbing_2;
            $check->nip_pembimbing_2 = $request->nip_pembimbing_2;
            $check->status = 'Validasi';
            $check->save();

            return redirect()->route('izin-penelitian.index')->with('success', 'Berhasil Menyimpan Perubahan');
        }else {
            IzinPenelitian::create([
                'user_id' => Auth::user()->id,
                'lokasi_penelitian' => $request->lokasi_penelitian,
                'nama_pembimbing_1' => $request->nama_pembimbing_1,
                'nip_pembimbing_1' => $request->nip_pembimbing_1,
                'nama_pembimbing_2' => $request->nama_pembimbing_2,
                'nip_pembimbing_2' => $request->nip_pembimbing_2,
                'status' => 'Validasi'
            ]);

            return redirect()->route('izin-penelitian.index')->with('success', 'Berhasil Menyimpan Data Baru');
        }
    }

    public function cetak_surat()
    {
        $item = IzinPenelitian::where('user_id', Auth::user()->id)->first();

        return view('pages.print.surat_izin_penelitian', [
            'item' => $item
        ]);
    }
}
