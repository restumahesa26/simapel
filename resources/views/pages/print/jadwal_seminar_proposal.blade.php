<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Seminar Proposal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        @media print {
            @page {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                padding-top: 0px !important;
                padding-bottom: 0px !important;
                size: landscape;
                size: 12.9921in 8.5in;
            }
        }

        body {
            font-family: 'Times New Roman';
            line-height: normal;
        }

        h4 {
            margin-bottom: -3px;
        }

        p,
        span {
            margin-bottom: -1px;
            font-size: 16px;
        }

        .table-borderless .table-top tr td {
            padding: 8px !important;
        }

        .table-borderless .table-yth tr td {
            padding: 0px !important;
        }

        .table-borderless .table-ctt tr td {
            padding: 0px !important;
            font-size: 17px;
        }

        .table-borderless tr td {
            padding: 3px !important;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000 !important;
            font-size: 14px;
        }

        table tr td,
        table tr th {
            font-size: 22px;
        }

        table tr th {
            padding: 2px !important;
        }

        table tr td {
            padding-top: 3px !important;
            padding-left: 3px !important;
            padding-right: 3px !important;
            padding-bottom: 3px !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-8">
                <img src="{{ url('logo-iain.png') }}" alt="" srcset="" style="width: 50px; float: left;">
                <h4 style="font-size: 12px;">KEMENTERIAN AGAMA REPUBLIK INDONESIA</h4>
                <h4 style="font-size: 12px;">INSTITUT AGAMA ISLAM NEGERI (IAIN) KERINCI</h4>
                <h3 class="font-weight-bold" style="font-size: 12px;">FAKULTAS SYARIAH</h3>
                <p style=" margin-top: -10px; font-size: 10px;">Jln. Pelita IV Sungai Penuh Telp.(0748) 21065 Fax.(0748)
                    22114 Kode Pos. 37112</p>
            </div>
            <div class="col-4">
                <h4
                    style="width: 290px; border: 3px solid #000; border-radius: 10px; padding: 7px; text-align: center;">
                    {{ $mahasiswas->first()->ruang_seminar }}</h4>
            </div>
        </div>
        <div class="text-center mb-3 mt-3">
            <p class="font-weight-bold" style="font-size: 17px;">JADWAL SEMINAR PROPOSAL</p>
            <p class="font-weight-bold" style="font-size: 17px;">PERIODE V TAHUN AKADEMIK 2021 / 2022</p>
            <p class="font-weight-bold" style="font-size: 17px;">FAKULTAS SYARIAH</p>
        </div>
        <p>Hari / Tanggal : {{ \Carbon\Carbon::parse($mahasiswas->first()->tanggal_seminar)->translatedFormat('l, d F Y') }}</p>
        <table class="table table-bordered mt-3">
            <thead>
                <tr class="text-center ">
                    <th style="width: 3%; vertical-align: middle;">No</th>
                    <th style="width: 6%; vertical-align: middle;">Jam</th>
                    <th style="width: 22%;">Nama Mahasiswa<br>NIM / Jurusan</th>
                    <th style="vertical-align: middle;">Judul Skripsi</th>
                    <th style="width: 20%; vertical-align: middle;">Tim Penguji</th>
                    <th style="width: 10%;">Jabatan Pembahas</th>
                    <th style="width: 3%; vertical-align: middle;">Ket</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->jam_mulai_seminar)->translatedFormat('H:i') }} <br> s.d <br> {{ \Carbon\Carbon::parse($item->jam_selesai_seminar)->translatedFormat('H:i') }}</td>
                    <td class="text-center"><span style="text-transform: uppercase">{{ $item->user->nama }}</span> <br>{{ $item->user->mahasiswa->nim }} / {{ $item->user->mahasiswa->prodi }}</td>
                    <td class="text-justify">{{ $item->judul_skripsi }}</td>
                    <td>
                        <ul style="margin-left: -35px !important; list-style: none; margin-bottom: 0 !important">
                            <li>{{ $item->ketua_penguji }}</li>
                            <li>{{ $item->sekretaris }}</li>
                            <li>{{ $item->dosen_pembimbing_1 }}</li>
                            <li>{{ $item->dosen_pembimbing_2 }}</li>
                        </ul>
                    </td>
                    <td>
                        <ul style="margin-left: -35px !important; list-style: none; margin-bottom: 0 !important">
                            <li>Ketua</li>
                            <li>Sekretaris</li>
                            <li>Pembimbing 1</li>
                            <li>Pembimbing 2</li>
                        </ul>
                    </td>
                    <td class="text-center"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end" style="margin-right: 70px;">
            <div class="column">
                <p>Sungai Penuh, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p style="margin-left: -32px;">A.n. Dekan,</p>
                <p>Wakil Dekan 1 Bidang Akademik</p>
                <p>dan Kelembagaan</p>
                <p style="margin-top: 60px;" class="font-weight-bold">Dr. Hj. Afridawati., M.Ag</p>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<script>
    window.print()
</script>
</html>
