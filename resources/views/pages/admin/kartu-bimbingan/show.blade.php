@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-flex justify-content-start">
        <a href="{{ route('admin.kartu-bimbingan.index') }}" class="btn btn-sm btn-warning mr-2">Kembali</a>
        <h1 class="h3 mb-0 text-gray-800">Kartu Bimbingan</h1>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.kartu-bimbingan.index') }}">Kartu Bimbingan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</div>

<form action="{{ route('admin.kartu-bimbingan.terima', $item->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $item->user->nama }}" readonly>
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="Masukkan NIM" value="{{ old('nim', $item->user->mahasiswa->nim) }}" readonly>
                        @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi / Jurusan</label>
                        <input type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi" placeholder="Masukkan Prodi / Jurusan" value="{{ old('prodi', $item->user->mahasiswa->prodi) }}" readonly>
                        @error('prodi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul_skripsi">Judul Skripsi</label>
                        <textarea name="judul_skripsi" id="judul_skripsi" rows="3" class="form-control" readonly>{{ old('no_telepon', $item->user->judul_skripsi->judul_skripsi) }}</textarea>
                        @error('semester')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dosen_pembimbing_1">Dosen Pembimbing 1</label>
                        <input type="text" class="form-control @error('dosen_pembimbing_1') is-invalid @enderror" id="dosen_pembimbing_1" name="dosen_pembimbing_1" placeholder="Masukkan Dosen Pembimbing 1" value="{{ old('dosen_pembimbing_1', $item->dosen_pembimbing_1) }}" readonly>
                        @error('dosen_pembimbing_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dosen_pembimbing_2">Dosen Pembimbing 2</label>
                        <input type="text" class="form-control @error('dosen_pembimbing_2') is-invalid @enderror" id="dosen_pembimbing_2" name="dosen_pembimbing_2" placeholder="Masukkan Dosen Pembimbing 2" value="{{ old('dosen_pembimbing_2', $item->dosen_pembimbing_2) }}" readonly>
                        @error('dosen_pembimbing_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary btn-block mt-3 btn-terima mx-2">Terima</button>
                <button type="button" class="btn btn-danger btn-block mt-3 mx-2" data-toggle="modal" data-target="#modal_pesan">
                    Tolak
                </button>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="modal_pesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.kartu-bimbingan.tolak', $item->id) }}" method="post">
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
@endsection

@push('addon-script')
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
