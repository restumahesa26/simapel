@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
</div>

<form action="{{ route('profile.update') }}" method="post">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama', $item->nama) }}">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if (Auth::user()->role == 'MAHASISWA')
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="Masukkan NIM" value="{{ old('nim', $item->mahasiswa->nim) }}">
                        @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select name="prodi" id="prodi" class="form-control @error('prodi') is-invalid @enderror">
                            <option value="" hidden>-- Pilih Prodi --</option>
                            <option value="Hukum Keluarga Islam" @if (old('prodi', $item->mahasiswa->prodi) == 'Hukum Keluarga Islam')
                                selected
                            @endif>Hukum Keluarga Islam</option>
                            <option value="Hukum Ekonomi Syariah" @if (old('prodi', $item->mahasiswa->prodi) == 'Hukum Ekonomi Syariah')
                                selected
                            @endif>Hukum Ekonomi Syariah</option>
                        </select>
                        @error('prodi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dosen_penasehat">Dosen Penasehat</label>
                        <input type="text" class="form-control @error('dosen_penasehat') is-invalid @enderror" id="dosen_penasehat" name="dosen_penasehat" placeholder="Masukkan Dosen Penasehat" value="{{ old('dosen_penasehat', $item->mahasiswa->dosen_penasehat) }}">
                        @error('dosen_penasehat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir', $item->mahasiswa->tempat_lahir) }}">
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal_lahir', $item->mahasiswa->tanggal_lahir) }}">
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" value="{{ old('nama_ayah', $item->mahasiswa->nama_ayah) }}">
                            @error('nama_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" value="{{ old('nama_ibu', $item->mahasiswa->nama_ibu) }}">
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_rumah">Alamat Rumah</label>
                        <input type="text" class="form-control @error('alamat_rumah') is-invalid @enderror" id="alamat_rumah" name="alamat_rumah" placeholder="Masukkan Alamat Rumah" value="{{ old('alamat_rumah', $item->mahasiswa->alamat_rumah) }}">
                        @error('alamat_rumah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No. Telepon</label>
                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" placeholder="Masukkan No. Telepon" value="{{ old('no_telepon', $item->mahasiswa->no_telepon) }}">
                        @error('no_telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if (Auth::user()->judul_skripsi)
                    <div class="form-group">
                        <label for="judul_skripsi">Judul Skripsi</label>
                        <textarea name="judul_skripsi" id="judul_skripsi" rows="3" class="form-control" disabled>{{ old('judul_skripsi', $item->judul_skripsi->judul_skripsi) }}</textarea>
                        @error('semester')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @endif
                    @endif
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email', $item->email) }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Konfirmasi Password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
        </div>
    </div>
</form>

@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    <script>
        $('input:not(#password, #password_confirmation), select, textarea').each(function() {
            if(!$(this).val()){
                $(this).addClass('is-invalid');
            }
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
