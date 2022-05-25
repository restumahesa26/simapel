@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-flex justify-content-start">
        <a href="{{ route('ujian-skripsi.index') }}" class="btn btn-sm btn-warning mr-2">Kembali</a>
        <h1 class="h3 mb-0 text-gray-800">Ujian Skripsi</h1>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('ujian-skripsi.index') }}">Ujian Skripsi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</div>

<form action="{{ route('ujian-skripsi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ Auth::user()->nama }}" disabled>
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="Masukkan NIM" value="{{ Auth::user()->mahasiswa->nim }}" disabled>
                        @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ Auth::user()->mahasiswa->tempat_lahir }}" disabled>
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ Auth::user()->mahasiswa->tanggal_lahir }}" disabled>
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi / Jurusan</label>
                        <input type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi" placeholder="Masukkan Prodi / Jurusan" value="{{ Auth::user()->mahasiswa->prodi }}" disabled>
                        @error('prodi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" placeholder="Masukkan Semester" value="{{ old('semester') }}" required>
                        @error('semester')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="tempat_lahir" name="nama_ayah" placeholder="Masukkan Nama Ayah" value="{{ Auth::user()->mahasiswa->nama_ayah }}" disabled>
                            @error('nama_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" value="{{ Auth::user()->mahasiswa->nama_ibu }}" disabled>
                            @error('nama_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dosen_penasehat">Dosen Penasehat</label>
                        <input type="text" class="form-control @error('dosen_penasehat') is-invalid @enderror" id="dosen_penasehat" name="dosen_penasehat" placeholder="Masukkan Dosen Penasehat" value="{{ Auth::user()->mahasiswa->dosen_penasehat }}" disabled>
                        @error('dosen_penasehat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="akademik">Akademik</label>
                        <input type="text" class="form-control @error('akademik') is-invalid @enderror" id="akademik" name="akademik" placeholder="Masukkan Akademik" value="{{ old('akademik') }}" required>
                        @error('akademik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_rumah">Alamat Rumah</label>
                        <input type="text" class="form-control @error('alamat_rumah') is-invalid @enderror" id="alamat_rumah" name="alamat_rumah" placeholder="Masukkan Alamat Rumah" value="{{ Auth::user()->mahasiswa->alamat_rumah }}" disabled>
                        @error('alamat_rumah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">Nomor Telepon</label>
                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" placeholder="Masukkan Nomor Telepon" value="{{ Auth::user()->mahasiswa->no_telepon }}" disabled>
                        @error('no_telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul_skripsi">Judul Skripsi</label>
                        <textarea name="judul_skripsi" id="judul_skripsi" rows="3" class="form-control" disabled>{{ (Auth::user()->judul_skripsi != NULL) ? Auth::user()->judul_skripsi->judul_skripsi : '' }}</textarea>
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
                        <label for="printout_skripsi">Printout Skripsi</label>
                        <input type="file" class="form-control-file @error('printout_skripsi') is-invalid @enderror" id="printout_skripsi" name="printout_skripsi" placeholder="Masukkan Printout Skripsi" required>
                        @error('printout_skripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kartu_mahasiswa">Kartu Mahasiswa</label>
                        <input type="file" class="form-control-file @error('kartu_mahasiswa') is-invalid @enderror" id="kartu_mahasiswa" name="kartu_mahasiswa" placeholder="Masukkan Kartu Mahasiswa" required>
                        @error('kartu_mahasiswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bukti_lunas">Bukti Lunas</label>
                        <input type="file" class="form-control-file @error('bukti_lunas') is-invalid @enderror" id="bukti_lunas" name="bukti_lunas" placeholder="Masukkan Bukti Lunas" required>
                        @error('bukti_lunas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pas_photo">Pas Photo</label>
                        <input type="file" class="form-control-file @error('pas_photo') is-invalid @enderror" id="pas_photo" name="pas_photo" placeholder="Masukkan Pas Photo" required>
                        @error('pas_photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cover_skripsi">Cover Skripsi</label>
                        <input type="file" class="form-control-file @error('cover_skripsi') is-invalid @enderror" id="cover_skripsi" name="cover_skripsi" placeholder="Masukkan Cover Skripsi" required>
                        @error('printout_skripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nota_dinas">Nota Dinas</label>
                        <input type="file" class="form-control-file @error('nota_dinas') is-invalid @enderror" id="nota_dinas" name="nota_dinas" placeholder="Masukkan Nota Dinas" required>
                        @error('nota_dinas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sk_pembimbing">SK Pembimbing</label>
                        <input type="file" class="form-control-file @error('sk_pembimbing') is-invalid @enderror" id="sk_pembimbing" name="sk_pembimbing" placeholder="Masukkan SK Pembimbing" required>
                        @error('sk_pembimbing')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="izin_penelitian">Izin Penelitian</label>
                        <input type="file" class="form-control-file @error('izin_penelitian') is-invalid @enderror" id="izin_penelitian" name="izin_penelitian" placeholder="Masukkan Izin Penelitian" required>
                        @error('izin_penelitian')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan_selesai">Keterangan Selesai Penelitian</label>
                        <input type="file" class="form-control-file @error('keterangan_selesai') is-invalid @enderror" id="keterangan_selesai" name="keterangan_selesai" placeholder="Masukkan Keterangan Selesai Penelitian" required>
                        @error('keterangan_selesai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sertifikat_kukerta">Sertifikat Kukerta</label>
                        <input type="file" class="form-control-file @error('sertifikat_kukerta') is-invalid @enderror" id="sertifikat_kukerta" name="sertifikat_kukerta" placeholder="Masukkan Sertifikat Kukerta" required>
                        @error('sertifikat_kukerta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="khs">Kartu Hasil Studi</label>
                        <input type="file" class="form-control-file @error('khs') is-invalid @enderror" id="khs" name="khs" placeholder="Masukkan Kartu Hasil Studi" required>
                        @error('khs')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3 btn-simpan">Simpan</button>
        </div>
    </div>
</form>

@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    <script>
        $('input, select, textarea').each(function() {
            if(!$(this).val()){
                $(this).addClass('is-invalid');
            }
        });

        $('.btn-simpan').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Simpan Data?',
            text: "Data Akan Tersimpan",
            icon: 'info',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>

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
