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
                <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#modal_cetak_berita_acara">
                    Cetak Berita Acara
                </button>
                <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#modal_cetak_undangan">
                    Cetak Undangan & Jadwal Munaqasyah
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap table-hover align-items-center" id="dataTable">
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
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_pesan{{ $item->id }}">
                                                Lihat Pesan
                                            </button>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.ujian-skripsi.show', $item->id) }}" class="btn btn-sm btn-primary">Lihat Data</a>
                                        <form action="{{ route('admin.ujian-skripsi.delete', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus Data</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">-- Data Masih Kosong --</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @foreach ($items as $item2)
    <div class="modal fade" id="modal_pesan{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    @endforeach
    <div class="modal fade" id="modal_cetak_undangan" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cetak Undangan Munaqasyah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.ujian-skripsi.cetak-undangan') }}" method="get" target="_blank">
                        <div class="form-group">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="Masukkan Nomor Surat" required>
                        </div>
                        <div class="form-group">
                            <label for="mahasiswa2">Mahasiswa</label><br>
                            <select name="mahasiswa[]" id="mahasiswa2" class="form-control select2-mahasiswa" style="width: 400px;" multiple="multiple">
                                <option value="" hidden>-- Pilih Mahasiswa --</option>
                                @foreach ($mahasiswas as $mhs)
                                    <option value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dosen">Nama Dosen</label>
                            <input type="text" name="dosen" id="dosen" class="form-control" placeholder="Masukkan Nama Dosen" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary btn-block mt-3 mx-3">
                                Cetak Undangan
                            </button>
                            <button type="submit" class="btn btn-info btn-block mt-3 mx-3" formaction="{{ route('admin.ujian-skripsi.cetak-lampiran-undangan') }}" data-target="_blank">
                                Cetak Lampiran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_cetak_berita_acara" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cetak Berita Acara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.ujian-skripsi.cetak-berita-acara') }}" method="get" target="_blank">
                        <div class="form-group">
                            <label for="mahasiswa">Mahasiswa</label><br>
                            <select name="mahasiswa" id="mahasiswa" class="form-control select2-mahasiswa2" style="width: 400px;">
                                <option value="" hidden>-- Pilih Mahasiswa --</option>
                                @foreach ($mahasiswas as $mhs)
                                    <option value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_kelulusan">Status Kelulusan</label><br>
                            <select name="status_kelulusan" id="status_kelulusan" class="form-control">
                                <option value="" hidden>-- Pilih Status Kelulusan --</option>
                                <option value="Lulus">Lulus</option>
                                <option value="Tidak Lulus">Tidak Lulus</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jangka">Jangka Waktu</label>
                                    <input type="number" name="jangka" id="jangka" class="form-control" placeholder="Masukkan Jangka Waktu" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <select name="satuan" id="satuan" class="form-control">
                                        <option value="" hidden>-- Pilih Satuan Jangka Waktu --</option>
                                        <option value="Hari">Hari</option>
                                        <option value="Minggu">Minggu</option>
                                        <option value="Bulan">Bulan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary btn-block mt-3 mx-3">
                                Cetak Undangan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
    <link href="{{ url('backend/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('backend/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "language": {
                    "paginate": {
                        "first":      "Awal",
                        "last":       "Akhir",
                        "next":       "Selanjutnya",
                        "previous":   "Sebelumnya"
                    },
                    "lengthMenu":     "Menampilkan _MENU_ entri",
                    "search":         "Cari data :",
                    "zeroRecords":    "Tidak ada data yang cocok",
                    "info":           "Menampilkan _START_ to _END_ dari _TOTAL_ entri",
                    "infoEmpty":      "Menampilkan 0 to 0 dari 0 entri",
                    "emptyTable":     "Data kosong",
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#mahasiswa').select2({
                placeholder: "-- Pilih Mahasiswa --",
                allowClear: true
            });
            $('#mahasiswa2').select2({
                placeholder: "-- Pilih Mahasiswa --",
                allowClear: true
            });
        });

    </script>

    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Hapus Data?',
            text: "Data Akan Terhapus",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
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
