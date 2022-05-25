<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeminarProposal;
use App\Models\User;
use Illuminate\Http\Request;

class SeminarProposalController extends Controller
{
    public function index()
    {
        $items = SeminarProposal::latest('updated_at')->get();
        $mahasiswas = User::where('role', 'MAHASISWA')->get();

        return view('pages.admin.seminar-proposal.index', [
            'items' => $items, 'mahasiswas' => $mahasiswas
        ]);
    }

    public function show($id)
    {
        $item = SeminarProposal::findOrFail($id);

        return view('pages.admin.seminar-proposal.show', [
            'item' => $item
        ]);
    }

    public function terima(Request $request, $id)
    {
        $item = SeminarProposal::findOrFail($id);

        $request->validate([
            'ketua_penguji' => ['required', 'string', 'max:255'],
            'sekretaris' => ['required', 'string', 'max:255'],
            'dosen_pembimbing_1' => ['required', 'string', 'max:255'],
            'dosen_pembimbing_2' => ['required', 'string', 'max:255'],
            'tanggal_seminar' => ['required', 'date'],
            'ruang_seminar' => ['required', 'string', 'max:255'],
            'jam_mulai_seminar' => ['required'],
            'jam_selesai_seminar' => ['required'],
        ]);

        $item->ketua_penguji = $request->ketua_penguji;
        $item->sekretaris = $request->sekretaris;
        $item->dosen_pembimbing_1 = $request->dosen_pembimbing_1;
        $item->dosen_pembimbing_2 = $request->dosen_pembimbing_2;
        $item->tanggal_seminar = $request->tanggal_seminar;
        $item->ruang_seminar = $request->ruang_seminar;
        $item->jam_mulai_seminar = $request->jam_mulai_seminar;
        $item->jam_selesai_seminar = $request->jam_selesai_seminar;
        $item->status = 'Terima';
        $item->pesan = '';
        $item->save();

        return redirect()->route('admin.seminar-proposal.index')->with('success', 'Berhasil Menerima Ajuan');
    }

    public function tolak(Request $request, $id)
    {
        $item = SeminarProposal::findOrFail($id);

        $request->validate([
            'pesan' => ['required', 'string', 'max:255']
        ]);

        $item->ketua_penguji = NULL;
        $item->sekretaris = NULL;
        $item->dosen_pembimbing_1 = NULL;
        $item->dosen_pembimbing_2 = NULL;
        $item->tanggal_seminar = NULL;
        $item->ruang_seminar = NULL;
        $item->jam_mulai_seminar = NULL;
        $item->jam_selesai_seminar = NULL;
        $item->status = 'Tolak';
        $item->pesan = $request->pesan;
        $item->save();

        return redirect()->route('admin.seminar-proposal.index')->with('success', 'Berhasil Menolak Ajuan');
    }

    public function delete($id)
    {
        $item = SeminarProposal::findOrFail($id);

        $item->delete();

        return redirect()->route('admin.seminar-proposal.index')->with('success', 'Berhasil Menghapus Data');
    }

    public function cetak_sk(Request $request)
    {
        $check = SeminarProposal::where('user_id', $request->mahasiswa)->first();

        if ($check) {
            $nama_mahasiswa = User::where('role', 'MAHASISWA')->where('id', $request->mahasiswa)->first();

            $nomor_surat = $request->nomor_surat;

            return view('pages.print.sk_pembimbing', [
                'mahasiswa' => $nama_mahasiswa, 'nomor_surat' => $nomor_surat
            ]);
        }else {
            return redirect()->back();
        }
    }

    public function cetak_undangan(Request $request)
    {
        $mahasiswa = collect();

        foreach ($request->mahasiswa as $value) {
            $check = SeminarProposal::where('user_id', $value)->first();

            if ($check) {
                $nama_mahasiswa = User::where('role', 'MAHASISWA')->where('id', $value)->first();

                $mahasiswa->add($nama_mahasiswa);
            }
        }

        $mahasiswa = $mahasiswa->sortBy('jam_mulai_seminar');

        $nomor_surat = $request->nomor_surat;
        $nama_dosen = $request->dosen;

        return view('pages.print.undangan_seminar_proposal', [
            'mahasiswas' => $mahasiswa, 'nomor_surat' => $nomor_surat, 'nama_dosen' => $nama_dosen
        ]);
    }

    public function cetak_jadwal(Request $request)
    {
        $mahasiswa = collect();

        foreach ($request->mahasiswa as $value) {
            $check = SeminarProposal::where('user_id', $value)->first();

            if ($check) {
                $nama_mahasiswa = SeminarProposal::where('user_id', $value)->first();

                $mahasiswa->add($nama_mahasiswa);
            }
        }

        $mahasiswa = $mahasiswa->sortBy('jam_mulai_sidang');

        return view('pages.print.jadwal_seminar_proposal', [
            'mahasiswas' => $mahasiswa
        ]);
    }
}
