@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="text-primary font-weight-bold">Selamat Datang, {{ Auth::user()->nama }}</h4>
            </div>
        </div>
    </div>
    @if (Auth::user()->role == 'ADMIN')
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Mahasiswa
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data Izin Penelitian
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $izin }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data Seminar Proposal</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $seminar }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data Ujian Skripsi</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $ujian }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <h5>Informasi</h5>
                <ul>
                    @if (Auth::user()->mahasiswa->nim == NULL)
                        <li class="text-danger">Data NIM masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->prodi == NULL)
                        <li class="text-danger">Data Jurusan / Prodi masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->dosen_penasehat == NULL)
                        <li class="text-danger">Data Dosen Penasehat masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->tempat_lahir == NULL)
                        <li class="text-danger">Data Tempat Lahir masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->tanggal_lahir == NULL)
                        <li class="text-danger">Data Tanggal Lahir masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->tempat_lahir == NULL)
                        <li class="text-danger">Data Tempat Lahir masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->nama_ayah == NULL)
                        <li class="text-danger">Data Nama Ayah masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->nama_ibu == NULL)
                        <li class="text-danger">Data Nama Ibu masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->alamat_rumah == NULL)
                        <li class="text-danger">Data Alamat Rumah masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->no_telepon == NULL)
                        <li class="text-danger">Data No. Telepon masih kosong, silahkan lengkapi!</li>
                    @endif
                    @if (Auth::user()->mahasiswa->nim != NULL && Auth::user()->mahasiswa->prodi != NULL && Auth::user()->mahasiswa->dosen_penasehat != NULL && Auth::user()->mahasiswa->tempat_lahir != NULL && Auth::user()->mahasiswa->tanggal_lahir != NULL && Auth::user()->mahasiswa->nama_ayah != NULL && Auth::user()->mahasiswa->nama_ibu != NULL && Auth::user()->mahasiswa->alamat_rumah != NULL && Auth::user()->mahasiswa->no_telepon != NULL)
                        <li class="text-success font-weight-bold">Data Sudah Lengkap!</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @if (Auth::user()->judul_skripsi_fix != NULL || Auth::user()->ujian_skripsi != NULL || Auth::user()->izin_penelitian != NULL || Auth::user()->kartu_bimbingan != NULL)

    @endif
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>Menu Pintas</h5>
                <ul>
                    @if (Auth::user()->judul_skripsi_fix != NULL)
                        <li>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_dospem">
                                Lihat Dosen Penguji Seminar
                            </button>
                            <div class="modal fade" id="modal_dospem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Dosen Penguji</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <h5>Ketua Penguji</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->judul_skripsi->ketua_penguji }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <h5>Sekretaris</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->judul_skripsi->sekretaris }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <h5>Dosen Penguji 1</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->judul_skripsi->dosen_pembimbing_1 }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <h5>Dosen Penguji 2</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->judul_skripsi->dosen_pembimbing_2 }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mt-2">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_jadwal_seminar">
                                Lihat Jadwal Seminar
                            </button>
                            <div class="modal fade" id="modal_jadwal_seminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jadwal Seminar Proposal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <h5>Tanggal</h5>
                                                </div>
                                                <div class="col-10">
                                                    <h5 class="font-weight-bold">{{ \Carbon\Carbon::parse(Auth::user()->judul_skripsi_fix->tanggal_seminar)->translatedFormat('l, d F Y') }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <h5>Jam</h5>
                                                </div>
                                                <div class="col-10">
                                                    <h5 class="font-weight-bold">{{ \Carbon\Carbon::parse(Auth::user()->judul_skripsi_fix->jam_mulai_seminar)->translatedFormat('H:i') }} sampai {{ \Carbon\Carbon::parse(Auth::user()->judul_skripsi_fix->jam_selesai_seminar)->translatedFormat('H:i') }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <h5>Tempat</h5>
                                                </div>
                                                <div class="col-10">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->judul_skripsi_fix->ruang_seminar }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->ujian_skripsi != NULL)
                        <li class="mt-2">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_dospeng">
                                Lihat Dosen Penguji Sidang
                            </button>
                            <div class="modal fade" id="modal_dospeng" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Dosen Penguji</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <h5>Ketua Penguji</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->ujian_skripsi->ketua_penguji }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <h5>Dosen Penguji 1</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->ujian_skripsi->dosen_pembimbing_1 }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <h5>Dosen Penguji 2</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->ujian_skripsi->dosen_pembimbing_2 }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <h5>Dosen Penguji 3</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->ujian_skripsi->dosen_penguji_1 }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <h5>Dosen Penguji 4</h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->ujian_skripsi->dosen_penguji_2 }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mt-2">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_jadwal_sidang">
                                Lihat Jadwal Sidang
                            </button>
                            <div class="modal fade" id="modal_jadwal_sidang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jadwal Ujian Skripsi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <h5>Tanggal</h5>
                                                </div>
                                                <div class="col-10">
                                                    <h5 class="font-weight-bold">{{ \Carbon\Carbon::parse(Auth::user()->ujian_skripsi->tanggal_sidang)->translatedFormat('l, d F Y') }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <h5>Jam</h5>
                                                </div>
                                                <div class="col-10">
                                                    <h5 class="font-weight-bold">{{ \Carbon\Carbon::parse(Auth::user()->ujian_skripsi->jam_mulai_sidang)->translatedFormat('H:i') }} sampai {{ \Carbon\Carbon::parse(Auth::user()->ujian_skripsi->jam_selesai_sidang)->translatedFormat('H:i') }}</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-2">
                                                    <h5>Tempat</h5>
                                                </div>
                                                <div class="col-10">
                                                    <h5 class="font-weight-bold">{{ Auth::user()->ujian_skripsi->ruang_sidang }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->izin_penelitian != NULL)
                        <li class="mt-2">
                            <a href="{{ route('izin-penelitian.cetak_surat') }}" class="btn btn-primary btn-sm" target="_blank">Cetak Surat Izin Penelitian</a>
                        </li>
                    @endif
                    @if (Auth::user()->kartu_bimbingan != NULL)
                        <li class="mt-2">
                            <a href="{{ route('kartu-bimbingan.cetak_surat', 'Dosen Pembimbing 1') }}" class="btn btn-primary btn-sm" target="_blank">Cetak Kartu Bimbingan Pembimbing 1</a>
                        </li>
                        <li class="mt-2">
                            <a href="{{ route('kartu-bimbingan.cetak_surat', 'Dosen Pembimbing 2') }}" class="btn btn-primary btn-sm" target="_blank">Cetak Kartu Bimbingan Pembimbing 2</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
