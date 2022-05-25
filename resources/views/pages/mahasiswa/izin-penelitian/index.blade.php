@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-flex justify-content-start">
        <h1 class="h3 mb-0 text-gray-800">Izin Penelitian</h1>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Izin Penelitian</li>
    </ol>
</div>

@if ($item != NULL)
@if ($item->status == 'Tolak')
<div class="modal fade" id="modal_pesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Pesan Perbaikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $item->pesan !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
<form action="{{ route('izin-penelitian.store') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ Auth::user()->nama }}" disabled >
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
                        <label for="judul_skripsi">Judul Skripsi</label>
                        <textarea name="judul_skripsi" id="judul_skripsi" rows="3" class="form-control" disabled>{{ (Auth::user()->judul_skripsi != NULL) ? Auth::user()->judul_skripsi->judul_skripsi : '' }}</textarea>
                        @error('semester')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi_penelitian">Lokasi Penelitian</label>
                        <input type="text" class="form-control @error('lokasi_penelitian') is-invalid @enderror" id="lokasi_penelitian" name="lokasi_penelitian" placeholder="Masukkan Lokasi Penelitian" value="{{ old('lokasi_penelitian', $item->lokasi_penelitian) }}" required @if ($item->status == 'Validasi' || $item->status == 'Terima') disabled @endif>
                        @error('lokasi_penelitian')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Dosen Pembimbing Skripsi 1</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_pembimbing_1">Nama</label>
                                <input type="text" class="form-control @error('nama_pembimbing_1') is-invalid @enderror" id="nama_pembimbing_1" name="nama_pembimbing_1" placeholder="Masukkan Nama Pembimbing Skripsi 1" value="{{ old('nama_pembimbing_1', $item->nama_pembimbing_1) }}" required @if ($item->status == 'Validasi' || $item->status == 'Terima') disabled @endif>
                                @error('nama_pembimbing_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip_pembimbing_1">NIP</label>
                                <input type="text" class="form-control @error('nip_pembimbing_1') is-invalid @enderror" id="nip_pembimbing_1" name="nip_pembimbing_1" placeholder="Masukkan NIP Pembimbing Skripsi 1" value="{{ old('nip_pembimbing_1', $item->nip_pembimbing_1) }}" required @if ($item->status == 'Validasi' || $item->status == 'Terima') disabled @endif>
                                @error('nip_pembimbing_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Dosen Pembimbing Skripsi 2</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_pembimbing_2">Nama</label>
                                <input type="text" class="form-control @error('nama_pembimbing_2') is-invalid @enderror" id="nama_pembimbing_2" name="nama_pembimbing_2" placeholder="Masukkan Nama Pembimbing Skripsi 2" value="{{ old('nama_pembimbing_2', $item->nama_pembimbing_2) }}" required @if ($item->status == 'Validasi' || $item->status == 'Terima') disabled @endif>
                                @error('nama_pembimbing_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip_pembimbing_2">NIP</label>
                                <input type="text" class="form-control @error('nip_pembimbing_2') is-invalid @enderror" id="nip_pembimbing_2" name="nip_pembimbing_2" placeholder="Masukkan NIP Pembimbing Skripsi 2" value="{{ old('nip_pembimbing_2', $item->nip_pembimbing_2) }}" required @if ($item->status == 'Validasi' || $item->status == 'Terima') disabled @endif>
                                @error('nip_pembimbing_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($item->status == 'Tolak')
            <button type="submit" class="btn btn-primary btn-block mt-3 btn-simpan-perubahan">Simpan Perubahan</button>
            @elseif ($item->status == 'Validasi')
            <div class="text-center">
                <h5 class="text-danger mt-3 font-weight-bold">Tunggu Data Anda Divalidasi oleh Admin</h5>
            </div>
            @elseif ($item->status == 'Terima')
            <div class="text-center">
                <a href="{{ route('izin-penelitian.cetak_surat') }}" class="btn btn-primary mt-3" target="_blank">Cetak Surat Izin Penelitian</a>
                <h5 class="text-success mt-3 font-weight-bold">Data Anda Sudah Divalidasi oleh Admin</h5>
                <h5 class="text-success font-weight-bold" style="margin-top: -12px">Jika ingin melakukan perubahan data, silahkan hubungi Admin</h5>
            </div>
            @endif
        </div>
    </div>
</form>
@else
<form action="{{ route('izin-penelitian.store') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col-md-12">
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
                        <label for="judul_skripsi">Judul Skripsi</label>
                        <textarea name="judul_skripsi" id="judul_skripsi" rows="3" class="form-control" disabled>{{ (Auth::user()->judul_skripsi != NULL) ? Auth::user()->judul_skripsi->judul_skripsi : '' }}</textarea>
                        @error('semester')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi_penelitian">Lokasi Penelitian</label>
                        <input type="text" class="form-control @error('lokasi_penelitian') is-invalid @enderror" id="lokasi_penelitian" name="lokasi_penelitian" placeholder="Masukkan Lokasi Penelitian" value="{{ old('lokasi_penelitian') }}" required>
                        @error('lokasi_penelitian')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Dosen Pembimbing Skripsi 1</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_pembimbing_1">Nama</label>
                                <input type="text" class="form-control @error('nama_pembimbing_1') is-invalid @enderror" id="nama_pembimbing_1" name="nama_pembimbing_1" placeholder="Masukkan Nama Pembimbing Skripsi 1" value="{{ old('nama_pembimbing_1') }}" required>
                                @error('nama_pembimbing_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip_pembimbing_1">NIP</label>
                                <input type="text" class="form-control @error('nip_pembimbing_1') is-invalid @enderror" id="nip_pembimbing_1" name="nip_pembimbing_1" placeholder="Masukkan NIP Pembimbing Skripsi 1" value="{{ old('nip_pembimbing_1') }}" required>
                                @error('nip_pembimbing_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Dosen Pembimbing Skripsi 2</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_pembimbing_2">Nama</label>
                                <input type="text" class="form-control @error('nama_pembimbing_2') is-invalid @enderror" id="nama_pembimbing_2" name="nama_pembimbing_2" placeholder="Masukkan Nama Pembimbing Skripsi 2" value="{{ old('nama_pembimbing_2') }}" required>
                                @error('nama_pembimbing_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip_pembimbing_2">NIP</label>
                                <input type="text" class="form-control @error('nip_pembimbing_2') is-invalid @enderror" id="nip_pembimbing_2" name="nip_pembimbing_2" placeholder="Masukkan NIP Pembimbing Skripsi 2" value="{{ old('nip_pembimbing_2') }}" required>
                                @error('nip_pembimbing_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3 btn-simpan">Simpan</button>
        </div>
    </div>
</form>
@endif


@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#modal_pesan').modal('show');
            $('#modal_pesan').modal({backdrop: 'static', keyboard: false});
        });
    </script>

    <script>
        $('input, select, textarea').each(function() {
            if(!$(this).val()){
                $(this).addClass('is-invalid');
            }
        });

        $('.btn-simpan-perubahan').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Simpan Perubahan?',
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

    @if(session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session()->get("success") }}'
            })
        </script>
    @endif
@endpush
