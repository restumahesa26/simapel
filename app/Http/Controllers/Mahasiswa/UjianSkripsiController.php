<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\UjianSkripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UjianSkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = UjianSkripsi::where('user_id', Auth::user()->id)->get();

        return view('pages.mahasiswa.ujian-skripsi.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $check = UjianSkripsi::where('user_id', Auth::user()->id)->first();

        if ($check == NULL) {
            return view('pages.mahasiswa.ujian-skripsi.create');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = UjianSkripsi::where('user_id', Auth::user()->id)->first();

        if ($check == NULL) {
            $request->validate([
                'semester' => ['required','string','max:255'],
                'akademik' => ['required','string','max:255'],
                'printout_skripsi' => ['required','mimes:pdf'],
                'kartu_mahasiswa' => ['required','mimes:pdf'],
                'bukti_lunas' => ['required','mimes:pdf'],
                'pas_photo' => ['required','mimes:pdf'],
                'cover_skripsi' => ['required','mimes:pdf'],
                'nota_dinas' => ['required','mimes:pdf'],
                'sk_pembimbing' => ['required','mimes:pdf'],
                'izin_penelitian' => ['required','mimes:pdf'],
                'keterangan_selesai' => ['required','mimes:pdf'],
                'sertifikat_kukerta' => ['required','mimes:pdf'],
                'khs' => ['required','mimes:pdf'],
            ]);

            $printout_skripsi = $request->file('printout_skripsi');
            $extension = $printout_skripsi->extension();
            $fileNames = 'Printout Skripsi-' . $request->nama . '.' . $extension;
            Storage::putFileAs('public/printout_skripsi', $printout_skripsi, $fileNames);

            $kartu_mahasiswa = $request->file('kartu_mahasiswa');
            $extension2 = $kartu_mahasiswa->extension();
            $fileNames2 = 'Kartu Mahasiswa-' . $request->nama . '.' . $extension2;
            Storage::putFileAs('public/kartu_mahasiswa', $kartu_mahasiswa, $fileNames2);

            $bukti_lunas = $request->file('bukti_lunas');
            $extension3 = $bukti_lunas->extension();
            $fileNames3 = 'Bukti Lunas-' . $request->nama . '.' . $extension3;
            Storage::putFileAs('public/bukti_lunas', $bukti_lunas, $fileNames3);

            $pas_photo = $request->file('pas_photo');
            $extension4 = $pas_photo->extension();
            $fileNames4 = 'Pas Photo-' . $request->nama . '.' . $extension4;
            Storage::putFileAs('public/pas_photo', $pas_photo, $fileNames4);

            $cover_skripsi = $request->file('cover_skripsi');
            $extension5 = $cover_skripsi->extension();
            $fileNames5 = 'Cover Skripsi-' . $request->nama . '.' . $extension5;
            Storage::putFileAs('public/cover_skripsi', $cover_skripsi, $fileNames5);

            $nota_dinas = $request->file('nota_dinas');
            $extension6 = $nota_dinas->extension();
            $fileNames6 = 'Nota Dinas-' . $request->nama . '.' . $extension6;
            Storage::putFileAs('public/nota_dinas', $nota_dinas, $fileNames6);

            $sk_pembimbing = $request->file('sk_pembimbing');
            $extension7 = $sk_pembimbing->extension();
            $fileNames7 = 'Sk Pembimbing-' . $request->nama . '.' . $extension7;
            Storage::putFileAs('public/sk_pembimbing', $sk_pembimbing, $fileNames7);

            $izin_penelitian = $request->file('izin_penelitian');
            $extension8 = $izin_penelitian->extension();
            $fileNames8 = 'Izin Penelitian-' . $request->nama . '.' . $extension8;
            Storage::putFileAs('public/izin_penelitian', $izin_penelitian, $fileNames8);

            $keterangan_selesai = $request->file('keterangan_selesai');
            $extension9 = $keterangan_selesai->extension();
            $fileNames9 = 'Keterangan Selesai-' . $request->nama . '.' . $extension9;
            Storage::putFileAs('public/keterangan_selesai', $keterangan_selesai, $fileNames9);

            $sertifikat_kukerta = $request->file('sertifikat_kukerta');
            $extension10 = $sertifikat_kukerta->extension();
            $fileNames10 = 'Sertifikat Kukerta-' . $request->nama . '.' . $extension10;
            Storage::putFileAs('public/sertifikat_kukerta', $sertifikat_kukerta, $fileNames10);

            $khs = $request->file('khs');
            $extension11 = $khs->extension();
            $fileNames11 = 'KHS-' . $request->nama . '.' . $extension11;
            Storage::putFileAs('public/khs', $khs, $fileNames11);

            UjianSkripsi::create([
                'user_id' => Auth::user()->id,
                'semester' => $request->semester,
                'akademik' => $request->akademik,
                'printout_skripsi' => $fileNames,
                'kartu_mahasiswa' => $fileNames2,
                'bukti_lunas' => $fileNames3,
                'pas_photo' => $fileNames4,
                'cover_skripsi' => $fileNames5,
                'nota_dinas' => $fileNames6,
                'sk_pembimbing' => $fileNames7,
                'izin_penelitian' => $fileNames8,
                'keterangan_selesai' => $fileNames9,
                'sertifikat_kukerta' => $fileNames10,
                'khs' => $fileNames11,
            ]);

            return redirect()->route('ujian-skripsi.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UjianSkripsi  $ujianSkripsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UjianSkripsi  $ujianSkripsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = UjianSkripsi::where('id', $id)->where('user_id', Auth::user()->id)->first();

        return view('pages.mahasiswa.ujian-skripsi.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UjianSkripsi  $ujianSkripsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'semester' => ['required','string','max:255'],
            'akademik' => ['required','string','max:255'],
        ]);

        if ($request->printout_skripsi) {
            $request->validate([
                'printout_skripsi' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->kartu_mahasiswa) {
            $request->validate([
                'kartu_mahasiswa' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->bukti_lunas) {
            $request->validate([
                'bukti_lunas' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->pas_photo) {
            $request->validate([
                'pas_photo' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->cover_skripsi) {
            $request->validate([
                'cover_skripsi' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->nota_dinas) {
            $request->validate([
                'nota_dinas' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->sk_pembimbing) {
            $request->validate([
                'sk_pembimbing' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->izin_penelitian) {
            $request->validate([
                'izin_penelitian' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->keterangan_selesai) {
            $request->validate([
                'keterangan_selesai' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->sertifikat_kukerta) {
            $request->validate([
                'sertifikat_kukerta' => ['required','mimes:pdf'],
            ]);
        }

        if ($request->khs) {
            $request->validate([
                'khs' => ['required','mimes:pdf'],
            ]);
        }

        $item = UjianSkripsi::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if ($request->printout_skripsi) {
            $printout_skripsi = $request->file('printout_skripsi');
            $extension = $printout_skripsi->extension();
            $fileNames = 'Printout Skripsi-' . $request->nama . '.' . $extension;
            Storage::putFileAs('public/printout_skripsi', $printout_skripsi, $fileNames);
        } else {
            $fileNames = $item->printout_skripsi;
        }

        if ($request->kartu_mahasiswa) {
            $kartu_mahasiswa = $request->file('kartu_mahasiswa');
            $extension2 = $kartu_mahasiswa->extension();
            $fileNames2 = 'Kartu Mahasiswa-' . $request->nama . '.' . $extension2;
            Storage::putFileAs('public/kartu_mahasiswa', $kartu_mahasiswa, $fileNames2);
        } else {
            $fileNames2 = $item->kartu_mahasiswa;
        }

        if ($request->bukti_lunas) {
            $bukti_lunas = $request->file('bukti_lunas');
            $extension3 = $bukti_lunas->extension();
            $fileNames3 = 'Bukti Lunas-' . $request->nama . '.' . $extension3;
            Storage::putFileAs('public/bukti_lunas', $bukti_lunas, $fileNames3);
        } else {
            $fileNames3 = $item->bukti_lunas;
        }

        if ($request->pas_photo) {
            $pas_photo = $request->file('pas_photo');
            $extension4 = $pas_photo->extension();
            $fileNames4 = 'Pas Photo-' . $request->nama . '.' . $extension4;
            Storage::putFileAs('public/pas_photo', $pas_photo, $fileNames4);
        } else {
            $fileNames4 = $item->pas_photo;
        }

        if ($request->cover_skripsi) {
            $cover_skripsi = $request->file('cover_skripsi');
            $extension5 = $cover_skripsi->extension();
            $fileNames5 = 'Cover Skripsi-' . $request->nama . '.' . $extension5;
            Storage::putFileAs('public/cover_skripsi', $cover_skripsi, $fileNames5);
        } else {
            $fileNames5 = $item->cover_skripsi;
        }

        if ($request->nota_dinas) {
            $nota_dinas = $request->file('nota_dinas');
            $extension6 = $nota_dinas->extension();
            $fileNames6 = 'Nota Dinas-' . $request->nama . '.' . $extension6;
            Storage::putFileAs('public/nota_dinas', $nota_dinas, $fileNames6);
        } else {
            $fileNames6 = $item->nota_dinas;
        }

        if ($request->sk_pembimbing) {
            $sk_pembimbing = $request->file('sk_pembimbing');
            $extension7 = $sk_pembimbing->extension();
            $fileNames7 = 'Sk Pembimbing-' . $request->nama . '.' . $extension7;
            Storage::putFileAs('public/sk_pembimbing', $sk_pembimbing, $fileNames7);
        } else {
            $fileNames7 = $item->sk_pembimbing;
        }

        if ($request->izin_penelitian) {
            $izin_penelitian = $request->file('izin_penelitian');
            $extension8 = $izin_penelitian->extension();
            $fileNames8 = 'Izin Penelitian-' . $request->nama . '.' . $extension8;
            Storage::putFileAs('public/izin_penelitian', $izin_penelitian, $fileNames8);
        } else {
            $fileNames8 = $item->izin_penelitian;
        }

        if ($request->keterangan_selesai) {
            $keterangan_selesai = $request->file('keterangan_selesai');
            $extension9 = $keterangan_selesai->extension();
            $fileNames9 = 'Keterangan Selesai-' . $request->nama . '.' . $extension9;
            Storage::putFileAs('public/keterangan_selesai', $keterangan_selesai, $fileNames9);
        } else {
            $fileNames9 = $item->keterangan_selesai;
        }

        if ($request->sertifikat_kukerta) {
            $sertifikat_kukerta = $request->file('sertifikat_kukerta');
            $extension10 = $sertifikat_kukerta->extension();
            $fileNames10 = 'Sertifikat Kukerta-' . $request->nama . '.' . $extension10;
            Storage::putFileAs('public/sertifikat_kukerta', $sertifikat_kukerta, $fileNames10);
        } else {
            $fileNames10 = $item->sertifikat_kukerta;
        }

        if ($request->khs) {
            $khs = $request->file('khs');
            $extension11 = $khs->extension();
            $fileNames11 = 'KHS-' . $request->nama . '.' . $extension11;
            Storage::putFileAs('public/khs', $khs, $fileNames11);
        } else {
            $fileNames11 = $item->khs;
        }

        $item->update([
            'semester' => $request->semester,
            'akademik' => $request->akademik,
            'printout_skripsi' => $fileNames,
            'kartu_mahasiswa' => $fileNames2,
            'bukti_lunas' => $fileNames3,
            'pas_photo' => $fileNames4,
            'cover_skripsi' => $fileNames5,
            'nota_dinas' => $fileNames6,
            'sk_pembimbing' => $fileNames7,
            'izin_penelitian' => $fileNames8,
            'keterangan_selesai' => $fileNames9,
            'sertifikat_kukerta' => $fileNames10,
            'khs' => $fileNames11,
            'status' => 'Kirim'
        ]);

        return redirect()->route('ujian-skripsi.index')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UjianSkripsi  $ujianSkripsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
