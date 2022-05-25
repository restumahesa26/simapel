<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UjianSkripsi;
use App\Models\User;
use Illuminate\Http\Request;

class UjianSkripsiController extends Controller
{
    public function index()
    {
        $items = UjianSkripsi::latest('updated_at')->get();
        $mahasiswas = User::where('role', 'MAHASISWA')->get();

        return view('pages.admin.ujian-skripsi.index', [
            'items' => $items, 'mahasiswas' => $mahasiswas
        ]);
    }

    public function show($id)
    {
        $item = UjianSkripsi::findOrFail($id);

        return view('pages.admin.ujian-skripsi.show', [
            'item' => $item
        ]);
    }

    public function terima($id)
    {
        $item = UjianSkripsi::findOrFail($id);

        $item->status = 'Terima';
        $item->pesan = '';
        $item->save();

        return redirect()->route('admin.ujian-skripsi.index')->with('success', 'Berhasil Menerima Ajuan');
    }

    public function tolak(Request $request, $id)
    {
        $item = UjianSkripsi::findOrFail($id);

        $request->validate([
            'pesan' => ['required', 'string', 'max:255']
        ]);

        $item->status = 'Tolak';
        $item->pesan = $request->pesan;
        $item->save();

        return redirect()->route('admin.ujian-skripsi.index')->with('success', 'Berhasil Menolak Ajuan');
    }

    public function delete($id)
    {
        $item = UjianSkripsi::findOrFail($id);

        $item->delete();

        return redirect()->route('admin.ujian-skripsi.index')->with('success', 'Berhasil Menghapus Data');
    }

    public function set_pembimbing(Request $request, $id)
    {
        $request->validate([
            'dosen_pembimbing_1' => ['required', 'string', 'max:255'],
            'dosen_pembimbing_2' => ['required', 'string', 'max:255'],
            'dosen_penguji_1' => ['required', 'string', 'max:255'],
            'dosen_penguji_2' => ['required', 'string', 'max:255'],
            'ketua_penguji' => ['required', 'string', 'max:255'],
            'sekretaris' => ['required', 'string', 'max:255'],
        ]);

        $item = UjianSkripsi::findOrFail($id);

        $item->dosen_pembimbing_1 = $request->dosen_pembimbing_1;
        $item->dosen_pembimbing_2 = $request->dosen_pembimbing_2;
        $item->dosen_penguji_1 = $request->dosen_penguji_1;
        $item->dosen_penguji_2 = $request->dosen_penguji_2;
        $item->ketua_penguji = $request->ketua_penguji;
        $item->sekretaris = $request->sekretaris;
        $item->save();

        return redirect()->route('admin.ujian-skripsi.show', $id)->with('success', 'Berhasil Set Pembimbing');
    }

    public function set_jadwal_sidang(Request $request, $id)
    {
        $request->validate([
            'tanggal_sidang' => ['required', 'date'],
            'ruang_sidang' => ['required', 'string', 'max:255'],
            'jam_mulai_sidang' => ['required'],
            'jam_selesai_sidang' => ['required'],
        ]);

        $item = UjianSkripsi::findOrFail($id);

        $item->tanggal_sidang = $request->tanggal_sidang;
        $item->ruang_sidang = $request->ruang_sidang;
        $item->jam_mulai_sidang = $request->jam_mulai_sidang;
        $item->jam_selesai_sidang = $request->jam_selesai_sidang;
        $item->save();

        return redirect()->route('admin.ujian-skripsi.show', $id)->with('success', 'Berhasil Set Jadwal');
    }

    public function cetak_undangan(Request $request)
    {
        $mahasiswa = collect();

        foreach ($request->mahasiswa as $value) {
            $check = UjianSkripsi::where('user_id', $value)->first();

            if ($check) {
                $nama_mahasiswa = User::where('role', 'MAHASISWA')->where('id', $value)->first();

                $mahasiswa->add($nama_mahasiswa);
            }
        }

        $mahasiswa = $mahasiswa->sortBy('jam_mulai_sidang');

        $nomor_surat = $request->nomor_surat;
        $nama_dosen = $request->dosen;

        return view('pages.print.undangan_munaqasyah', [
            'mahasiswas' => $mahasiswa, 'nomor_surat' => $nomor_surat, 'nama_dosen' => $nama_dosen
        ]);
    }

    public function lampiran_undangan(Request $request)
    {
        $mahasiswa = collect();

        foreach ($request->mahasiswa as $value) {
            $check = UjianSkripsi::where('user_id', $value)->first();

            if ($check) {
                $nama_mahasiswa = UjianSkripsi::where('user_id', $value)->first();

                $mahasiswa->add($nama_mahasiswa);
            }
        }

        $mahasiswa = $mahasiswa->sortBy('jam_mulai_sidang');

        $nomor_surat = $request->nomor_surat;
        $nama_dosen = $request->dosen;

        return view('pages.print.lampiran_undangan_munaqasyah', [
            'mahasiswas' => $mahasiswa, 'nomor_surat' => $nomor_surat, 'nama_dosen' => $nama_dosen
        ]);
    }

    public function cetak_berita_acara(Request $request)
    {
        $check = UjianSkripsi::where('user_id', $request->mahasiswa)->first();

        if ($check) {
            $nama_mahasiswa = User::where('role', 'MAHASISWA')->where('id', $request->mahasiswa)->first();

            return view('pages.print.berita_acara_munaqasyah', [
                'mahasiswa' => $nama_mahasiswa, 'status' => $request->status_kelulusan, 'jangka' => $request->jangka, 'satuan' => $request->satuan
            ]);
        }else {
            return redirect()->back();
        }
    }
}
