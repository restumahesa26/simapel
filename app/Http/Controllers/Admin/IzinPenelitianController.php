<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IzinPenelitian;
use Illuminate\Http\Request;

class IzinPenelitianController extends Controller
{
    public function index()
    {
        $items = IzinPenelitian::all();

        return view('pages.admin.izin-penelitian.index', [
            'items' => $items
        ]);
    }

    public function show($id)
    {
        $item = IzinPenelitian::findOrFail($id);

        return view('pages.admin.izin-penelitian.show', [
            'item' => $item
        ]);
    }

    public function terima($id)
    {
        $item = IzinPenelitian::findOrFail($id);

        $item->status = 'Terima';
        $item->pesan = '';
        $item->save();

        return redirect()->route('admin.izin-penelitian.index')->with('success', 'Berhasil Menerima Ajuan');
    }

    public function tolak(Request $request, $id)
    {
        $item = IzinPenelitian::findOrFail($id);

        $request->validate([
            'pesan' => ['required', 'string', 'max:255']
        ]);

        $item->pesan = $request->pesan;
        $item->status = 'Tolak';
        $item->save();

        return redirect()->route('admin.izin-penelitian.index')->with('success', 'Berhasil Menolak Ajuan');
    }

    public function delete($id)
    {
        $item = IzinPenelitian::findOrFail($id);

        $item->delete();

        return redirect()->route('admin.izin-penelitian.index')->with('success', 'Berhasil Menghapus Data');
    }
}
