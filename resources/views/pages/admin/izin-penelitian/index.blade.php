@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Izin Penelitian</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Izin Penelitian</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap table-hover align-items-center" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Prodi</th>
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
                                    <td>
                                        <span class="badge
                                        @if ($item->status === 'Validasi')
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
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.izin-penelitian.show', $item->id) }}" class="btn btn-sm btn-primary">Lihat Data</a>
                                        <form action="{{ route('admin.izin-penelitian.delete', $item->id) }}" method="post" class="d-inline">
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
    @endforeach
</div>
@endsection

@push('addon-style')
    <link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
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
