<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\SeminarProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeminarProposalController extends Controller
{
    public function index()
    {
        $check = SeminarProposal::where('user_id', Auth::user()->id)->first();

        if ($check != NULL) {
            return view('pages.mahasiswa.seminar-proposal.index', [
                'item' => $check
            ]);
        }else {
            return view('pages.mahasiswa.seminar-proposal.index', [
                'item' => NULL
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_skripsi' => ['required', 'string', 'max:255'],
        ]);

        $check = SeminarProposal::where('user_id', Auth::user()->id)->first();

        if ($check != NULL) {
            $check->judul_skripsi = $request->judul_skripsi;
            $check->status = 'Validasi';
            $check->save();

            return redirect()->route('seminar-proposal.index')->with('success', 'Berhasil Menyimpan Perubahan');
        }else {
            SeminarProposal::create([
                'user_id' => Auth::user()->id,
                'judul_skripsi' => $request->judul_skripsi,
                'status' => 'Validasi'
            ]);

            return redirect()->route('seminar-proposal.index')->with('success', 'Berhasil Menyimpan Data Baru');
        }
    }
}
