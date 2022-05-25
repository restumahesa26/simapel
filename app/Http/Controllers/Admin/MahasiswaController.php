<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::where('role', 'MAHASISWA')->get();

        return view('pages.admin.data-mahasiswa.index', [
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
        return view('pages.admin.data-mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:12', 'min:10'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'nama_ayah' => ['required', 'string', 'max:255'],
            'nama_ibu' => ['required', 'string', 'max:255'],
            'prodi' => ['required', 'string', 'max:255'],
            'dosen_penasehat' => ['required', 'string', 'max:255'],
            'alamat_rumah' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $mahasiswa = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => 'MAHASISWA',
            'password' => Hash::make($request->password)
        ]);

        Mahasiswa::create([
            'user_id' => $mahasiswa->id,
            'nim' => $request->nim,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'prodi' => $request->prodi,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'dosen_penasehat' => $request->dosen_penasehat,
            'alamat_rumah' => $request->alamat_rumah,
            'no_telepon' => $request->no_telepon
        ]);

        return redirect()->route('data-mahasiswa.index')->with('success', 'Berhasil Menambah Data Mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::where('role', 'MAHASISWA')->where('id', $id)->first();

        return view('pages.admin.data-mahasiswa.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = User::where('role', 'MAHASISWA')->where('id', $id)->first();

        $mahasiswa = Mahasiswa::where('user_id', $id)->first();

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'nama_ayah' => ['required', 'string', 'max:255'],
            'nama_ibu' => ['required', 'string', 'max:255'],
            'prodi' => ['required', 'string', 'max:255'],
            'dosen_penasehat' => ['required', 'string', 'max:255'],
            'alamat_rumah' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'max:255'],
        ]);

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

        return redirect()->route('data-mahasiswa.index')->with('success', 'Berhasil Mengubah Data Mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::where('role', 'MAHASISWA')->where('id', $id)->first();

        $item->delete();

        return redirect()->route('data-mahasiswa.index')->with('success', 'Berhasil Menghapus Data Mahasiswa');
    }
}
