@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-flex justify-content-start">
        <a href="{{ route('admin.ujian-skripsi.index') }}" class="btn btn-sm btn-warning mr-2">Kembali</a>
        <h1 class="h3 mb-0 text-gray-800">Ujian Skripsi</h1>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.ujian-skripsi.index') }}">Ujian Skripsi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $item->user->nama }}" disabled>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="Masukkan NIM" value="{{ $item->user->mahasiswa->nim }}" disabled>
                    @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ $item->user->mahasiswa->tempat_lahir }}" disabled>
                        @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ $item->user->mahasiswa->tanggal_lahir }}" disabled>
                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi / Jurusan</label>
                    <input type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi" placeholder="Masukkan Prodi / Jurusan" value="{{ $item->user->mahasiswa->prodi }}" disabled>
                    @error('prodi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" placeholder="Masukkan Semester" value="{{ old('semester', $item->semester) }}" disabled>
                    @error('semester')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="tempat_lahir" name="nama_ayah" placeholder="Masukkan Nama Ayah" value="{{ $item->user->mahasiswa->nama_ayah }}" disabled>
                        @error('nama_ayah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" value="{{ $item->user->mahasiswa->nama_ibu }}" disabled>
                        @error('nama_ibu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="dosen_penasehat">Dosen Penasehat</label>
                    <input type="text" class="form-control @error('dosen_penasehat') is-invalid @enderror" id="dosen_penasehat" name="dosen_penasehat" placeholder="Masukkan Dosen Penasehat" value="{{ $item->user->mahasiswa->dosen_penasehat }}" disabled>
                    @error('dosen_penasehat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="akademik">Akademik</label>
                    <input type="text" class="form-control @error('akademik') is-invalid @enderror" id="akademik" name="akademik" placeholder="Masukkan Akademik" value="{{ old('akademik', $item->akademik) }}" disabled>
                    @error('akademik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_rumah">Alamat Rumah</label>
                    <input type="text" class="form-control @error('alamat_rumah') is-invalid @enderror" id="alamat_rumah" name="alamat_rumah" placeholder="Masukkan Alamat Rumah" value="{{ $item->user->mahasiswa->alamat_rumah }}" disabled>
                    @error('alamat_rumah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" placeholder="Masukkan Nomor Telepon" value="{{ $item->user->mahasiswa->no_telepon }}" disabled>
                    @error('no_telepon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul_skripsi">Judul Skripsi</label>
                    <textarea name="judul_skripsi" id="judul_skripsi" rows="3" class="form-control" disabled>{{ $item->user->mahasiswa->judul_skripsi }}</textarea>
                    @error('semester')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="printout_skripsi">
                        Printout Skripsi
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_printout_skripsi">
                        Lihat File Printout Skripsi
                    </button>
                </div>
                <div class="form-group">
                    <label for="kartu_mahasiswa">
                        Kartu Mahasiswa
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_kartu_mahasiswa">
                        Lihat File Kartu Mahasiswa
                    </button>
                </div>
                <div class="form-group">
                    <label for="bukti_lunas">
                        Bukti Lunas
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_bukti_lunas">
                        Lihat File Bukti Lunas
                    </button>
                </div>
                <div class="form-group">
                    <label for="pas_photo">
                        Pas Photo
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_pas_photo">
                        Lihat File Pas Photo
                    </button>
                </div>
                <div class="form-group">
                    <label for="cover_skripsi">
                        Cover Skripsi
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_cover_skripsi">
                        Lihat File Cover Skripsi
                    </button>
                </div>
                <div class="form-group">
                    <label for="nota_dinas">
                        Nota Dinas
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_nota_dinas">
                        Lihat File Nota Dinas
                    </button>
                </div>
                <div class="form-group">
                    <label for="sk_pembimbing">
                        SK Pembimbing
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_sk_pembimbing">
                        Lihat File SK Pembimbing
                    </button>
                </div>
                <div class="form-group">
                    <label for="izin_penelitian">
                        Izin Penelitian
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_izin_penelitian">
                        Lihat File Izin Penelitian
                    </button>
                </div>
                <div class="form-group">
                    <label for="keterangan_selesai">
                        Keterangan Selesai
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_keterangan_selesai">
                        Lihat File Keterangan Selesai
                    </button>
                </div>
                <div class="form-group">
                    <label for="sertifikat_kukerta">
                        Sertifikat Kukerta
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_sertifikat_kukerta">
                        Lihat File Sertifikat Kukerta
                    </button>
                </div>
                <div class="form-group">
                    <label for="khs">
                        Kartu Hasil Studi
                    </label><br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_khs">
                        Lihat File Kartu Hasil Studi
                    </button>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-start mt-3">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_pesan">
                Tolak
            </button>
            <form action="{{ route('admin.ujian-skripsi.terima', $item->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-primary ml-3 btn-terima">Terima</button>
            </form>
        </div>
    </div>
</div>

@if ($item->status == 'Terima')
<form action="{{ route('admin.ujian-skripsi.set-pembimbing', $item->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="ketua_penguji">Ketua Penguji</label>
                        <input type="text" class="form-control @error('ketua_penguji') is-invalid @enderror" id="ketua_penguji" name="ketua_penguji" placeholder="Masukkan Ketua Penguji" value="{{ old('ketua_penguji', $item->ketua_penguji) }}">
                        @error('ketua_penguji')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sekretaris">Sekretaris</label>
                        <input type="text" class="form-control @error('sekretaris') is-invalid @enderror" id="sekretaris" name="sekretaris" placeholder="Masukkan Sekretaris" value="{{ old('sekretaris', $item->sekretaris) }}">
                        @error('sekretaris')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dosen_pembimbing_1">Dosen Pembimbing 1</label>
                        <input type="text" class="form-control @error('dosen_pembimbing_1') is-invalid @enderror" id="dosen_pembimbing_1" name="dosen_pembimbing_1" placeholder="Masukkan Dosen Pembimbing 1" value="{{ old('dosen_pembimbing_1', $item->dosen_pembimbing_1) }}">
                        @error('dosen_pembimbing_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dosen_pembimbing_2">Dosen Pembimbing 2</label>
                        <input type="text" class="form-control @error('dosen_pembimbing_2') is-invalid @enderror" id="dosen_pembimbing_2" name="dosen_pembimbing_2" placeholder="Masukkan Dosen Pembimbing 2" value="{{ old('dosen_pembimbing_2', $item->dosen_pembimbing_2) }}">
                        @error('dosen_pembimbing_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dosen_penguji_1">Dosen Penguji 1</label>
                        <input type="text" class="form-control @error('dosen_penguji_1') is-invalid @enderror" id="dosen_penguji_1" name="dosen_penguji_1" placeholder="Masukkan Dosen Penguji 1" value="{{ old('dosen_penguji_1', $item->dosen_penguji_1) }}">
                        @error('dosen_penguji_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dosen_penguji_2">Dosen Penguji 2</label>
                        <input type="text" class="form-control @error('dosen_penguji_1') is-invalid @enderror" id="dosen_penguji_2" name="dosen_penguji_2" placeholder="Masukkan Dosen Penguji 2" value="{{ old('dosen_penguji_2', $item->dosen_penguji_2) }}">
                        @error('dosen_penguji_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3 btn-set">Set Dosen Pembimbing</button>
        </div>
    </div>
</form>
@endif

@if ($item->status == 'Terima')
<form action="{{ route('admin.ujian-skripsi.set-jadwal-sidang', $item->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="tanggal_sidang">Tanggal Sidang</label>
                            <input type="text" class="form-control @error('tanggal_sidang') is-invalid @enderror" id="tanggal_sidang" name="tanggal_sidang" placeholder="Masukkan Tanggal Sidang" value="{{ old('tanggal_sidang', $item->tanggal_sidang) }}" >
                            @error('tanggal_sidang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="ruang_sidang">Ruang Sidang</label>
                            <input type="text" class="form-control @error('ruang_sidang') is-invalid @enderror" id="ruang_sidang" name="ruang_sidang" placeholder="Masukkan Ruang Sidang" value="{{ old('ruang_sidang', $item->ruang_sidang) }}">
                            @error('ruang_sidang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="jam_mulai_sidang" class="col-12">Jam Sidang</label>
                        <div class="col-4">
                            <input type="text" class="form-control @error('jam_mulai_sidang') is-invalid @enderror" id="jam_mulai_sidang" name="jam_mulai_sidang" value="{{ old('jam_mulai_sidang', $item->jam_mulai_sidang) }}"  placeholder="Masukkan Jam">
                            @error('jam_mulai_sidang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-4 text-center">
                            <p for="">Sampai</p>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control @error('jam_selesai_sidang') is-invalid @enderror" id="jam_selesai_sidang" name="jam_selesai_sidang" value="{{ old('jam_selesai_sidang', $item->jam_selesai_sidang) }}"  placeholder="Masukkan Jam">
                            @error('jam_selesai_sidang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3 btn-jadwal">Set Jadwal Sidang</button>
        </div>
    </div>
</form>
@endif

<div class="modal fade" id="modal_pesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.ujian-skripsi.tolak', $item->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class='form-control' name='pesan' id='pesan' placeholder='Masukkan Pesan' required>{{ old('isi') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger ml-3 btn-tolak">Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_printout_skripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Printout Skripsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/printout_skripsi/'.$item->printout_skripsi) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_kartu_mahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kartu Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/kartu_mahasiswa/'.$item->kartu_mahasiswa) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_bukti_lunas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Lunas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/bukti_lunas/'. $item->bukti_lunas) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_pas_photo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pas Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/pas_photo/'. $item->pas_photo) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_cover_skripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cover Skripsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/cover_skripsi/'. $item->cover_skripsi) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_nota_dinas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nota Dinas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/nota_dinas/'. $item->nota_dinas) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_sk_pembimbing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sk Pembimbing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/sk_pembimbing/'. $item->sk_pembimbing) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_izin_penelitian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Izin Penelitian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/izin_penelitian/'. $item->izin_penelitian) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_keterangan_selesai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keterangan Selesai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/keterangan_selesai/'. $item->keterangan_selesai) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_sertifikat_kukerta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sertifikat Kukerta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/sertifikat_kukerta/'. $item->sertifikat_kukerta) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_khs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kartu Hasil Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/khs/'. $item->khs) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>

@endsection

@push('addon-style')
    <link href="{{ url('backend/vendor/clock-picker/clockpicker.css') }}" rel="stylesheet">
    <link href="{{ url('backend/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" >
@endpush

@push('addon-script')
    <script type="text/javascript" src="{{ url('backend/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('backend/vendor/clock-picker/clockpicker.js') }}"></script>
    <script src="{{ url('backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        CKEDITOR.replace('pesan');
        $('#tanggal_sidang').datepicker({
            format: 'yyyy/mm/dd',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });
        $('#jam_mulai_sidang').clockpicker({
            autoclose: true
        });
        $('#jam_selesai_sidang').clockpicker({
            autoclose: true
        });
    </script>

    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    <script>
        $('.btn-terima').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Terima Bahan Ajuan?',
            text: "Data Akan Tersimpan",
            icon: 'info',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Terima',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });

        $('.btn-tolak').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Tolak Bahan Ajuan?',
            text: "Data Akan Tersimpan",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Tolak',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });

        $('.btn-set').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Set Dosen Pembimbing?',
            text: "Data Akan Tersimpan",
            icon: 'info',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });

        $('.btn-jadwal').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Set Jadwal Sidang?',
            text: "Data Akan Tersimpan",
            icon: 'info',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });

        $('input, select, textarea').each(function() {
            if(!$(this).val()){
                $(this).addClass('is-invalid');
            }
        });

        $('#tanggal_sidang, #jam_mulai_sidang, #jam_selesai_sidang').keypress(function(e) {
            e.preventDefault();
        });
    </script>

    @if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session()->get("success") }}'
        })
    </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Perhatikan Lagi Field Yang Diisi'
            })
        </script>
    @endif
@endpush
