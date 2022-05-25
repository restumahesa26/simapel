@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ujian Skripsi</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ujian Skripsi</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($items->count() < 1)
                    <a href="{{ route('ujian-skripsi.create') }}" class="btn btn-primary mb-3">Tambah Data Ujian Skripsi</a>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Prodi</th>
                                <th>Dosen Penasehat</th>
                                <th>Status</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->nama }}</td>
                                    <td>{{ $item->user->mahasiswa->nim }}</td>
                                    <td>{{ $item->user->mahasiswa->prodi }}</td>
                                    <td>{{ $item->user->mahasiswa->dosen_penasehat }}</td>
                                    <td>
                                        <span class="badge
                                        @if ($item->status === 'Kirim')
                                            badge-primary
                                        @elseif ($item->status === 'Terima')
                                            badge-success
                                        @elseif ($item->status === 'Tolak')
                                            badge-danger
                                        @endif
                                        ">{{ $item->status }}</span>
                                    </td>
                                    <td>
                                        @if ($item->pesan != NULL)
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_pesan">
                                                Lihat Pesan
                                            </button>
                                        @elseif ($item->pesan == NULL && $item->status == 'Terima')
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_jadwal">
                                                Lihat Jadwal
                                            </button>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_dospeng">
                                                Lihat Dospeng
                                            </button>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('ujian-skripsi.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                            @if ($item->status == 'Tolak')
                                                Ubah Data
                                            @else
                                                Lihat Data
                                            @endif

                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">-- Data Masih Kosong --</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach ($items as $item2)
        <div class="modal fade" id="modal_pesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $item2->pesan !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_jadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h5>{{ \Carbon\Carbon::parse($item2->tanggal_sidang)->translatedFormat('d F Y') }}</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-2">
                                <h5>Jam</h5>
                            </div>
                            <div class="col-10">
                                <h5>{{ \Carbon\Carbon::parse($item2->jam_mulai_sidang)->translatedFormat('H:i') }} sampai {{ \Carbon\Carbon::parse($item2->jam_selesai_sidang)->translatedFormat('H:i') }}</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-2">
                                <h5>Tempat</h5>
                            </div>
                            <div class="col-10">
                                <h5>{{ $item->ruang_sidang }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                <h5>{{ $item2->ketua_penguji }}</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <h5>Dosen Penguji 1</h5>
                            </div>
                            <div class="col-8">
                                <h5>{{ $item2->dosen_pembimbing_1 }}</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <h5>Dosen Penguji 2</h5>
                            </div>
                            <div class="col-8">
                                <h5>{{ $item2->dosen_pembimbing_2 }}</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <h5>Dosen Penguji 3</h5>
                            </div>
                            <div class="col-8">
                                <h5>{{ $item2->dosen_penguji_1 }}</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <h5>Dosen Penguji 4</h5>
                            </div>
                            <div class="col-8">
                                <h5>{{ $item2->dosen_penguji_2 }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

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
