<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KartuBimbingan;
use Illuminate\Http\Request;

class KartuBimbinganController extends Controller
{
    public function index()
    {
        $items = KartuBimbingan::latest('updated_at')->get();

        return view('pages.admin.kartu-bimbingan.index', [
            'items' => $items
        ]);
    }

    public function show($id)
    {
        $item = KartuBimbingan::findOrFail($id);

        return view('pages.admin.kartu-bimbingan.show', [
            'item' => $item
        ]);
    }

    public function terima($id)
    {
        $item = KartuBimbingan::findOrFail($id);

        $item->status = 'Terima';
        $item->pesan = '';
        $item->save();

        return redirect()->route('admin.kartu-bimbingan.index')->with('success', 'Berhasil Menerima Ajuan');
    }

    public function tolak(Request $request, $id)
    {
        $item = KartuBimbingan::findOrFail($id);

        $request->validate([
            'pesan' => ['required', 'string', 'max:255']
        ]);

        $item->pesan = $request->pesan;
        $item->status = 'Tolak';
        $item->save();

        return redirect()->route('admin.kartu-bimbingan.index')->with('success', 'Berhasil Menolak Ajuan');
    }

    public function delete($id)
    {
        $item = KartuBimbingan::findOrFail($id);

        $item->delete();

        return redirect()->route('admin.kartu-bimbingan.index')->with('success', 'Berhasil Menghapus Data');
    }
}
