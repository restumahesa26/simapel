<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara Munaqasyah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman';
            line-height: normal;
        }

        h4 {
            margin-bottom: -3px;
        }

        p,
        span {
            margin-bottom: -3px;
            font-size: 22px;
        }

        .table-borderless .table-top tr td {
            padding: 2px !important;
        }

        .table-borderless .table-yth tr td {
            padding: 0px !important;
        }

        .table-borderless .table-ctt tr td {
            padding: 0px !important;
            font-size: 18px;
        }

        .table-borderless tr td {
            padding: 3px !important;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000 !important;
        }

        table tr td,
        table tr th {
            font-size: 22px;
        }

        table tr th {
            padding: 6px !important;
        }

        table tr td {
            padding: 10px !important;
        }
    </style>
</head>

<body>
    <div class="container" style="padding-left: 50px; padding-right: 50px;">
        <div class="row justify-content-center text-center">
            <div class="col-3">
                <img src="{{ url('logo-iain.png') }}" alt="" srcset="" style=" width: 135px; margin-left: -200px;">
            </div>
            <div class="col-9 mt-4" style="margin-left: -200px;">
                <h4>KEMENTERIAN AGAMA REPUBLIK INDONESIA</h4>
                <h4>INSTITUT AGAMA ISLAM NEGERI (IAIN) KERINCI</h4>
                <h3 class="font-weight-bold">FAKULTAS SYARIAH</h3>
                <p style=" margin-top: -10px; font-size: 16px;">Jln. Pelita IV Sungai Penuh Telp.(0748) 21065 Fax.(0748)
                    22114 Kode Pos. 37112</p>
            </div>
        </div>
        <hr style="border: 2px solid #000; margin-top: -4px;">
        <div class="text-center font-weight-bold">
            <p>BERITA ACARA MUNAQASYAH SKRIPSI</p>
            <p>MAHASISWA FAKULTAS SYARI'AH IAIN KERINCI</p>
            <p>TAHUN AKADEMIK 2019/2020</p>
        </div>
        <p style="margin-top: 30px;">Pada Hari ini {{ \Carbon\Carbon::parse($mahasiswa->ujian_skripsi->tanggal_sidang)->translatedFormat('l') }} Tanggal {{ \Carbon\Carbon::parse($mahasiswa->ujian_skripsi->tanggal_sidang)->translatedFormat('d F Y') }} telah dilaksanakan munaqasyah mahasiswa:
        </p>
        <table class="table table-borderless mt-4">
            <tbody class="table-top">
                <tr>
                    <td style="width: 15%;">Nama</td>
                    <td style="width: 1%;">:</td>
                    <td class="font-weight-bold">{{ $mahasiswa->nama }}</td>
                </tr>
                <tr>
                    <td style="width: 15%;">NPM</td>
                    <td style="width: 1%;">:</td>
                    <td>{{ $mahasiswa->mahasiswa->nim }}</td>
                </tr>
                <tr>
                    <td style="width: 15%;">Jurusan</td>
                    <td style="width: 1%;">:</td>
                    <td>{{ $mahasiswa->mahasiswa->prodi }}</td>
                </tr>
                <tr>
                    <td style="width: 15%;">Judul</td>
                    <td style="width: 1%;">:</td>
                    <td class="text-justify">{{ $mahasiswa->judul_skripsi->judul_skripsi }}</td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top: 20px;">Dengan Susunan Tim Penguji Sebagai Berikut:</p>
        <table class="table table-borderless ml-3 mt-3">
            <tr>
                <td style="width: 35%;">
                    1. {{ $mahasiswa->ujian_skripsi->ketua_penguji }}
                </td>
                <td>
                    sebagai : Ketua Sidang
                </td>
            </tr>
            <tr>
                <td style="width: 35%;">
                    2. {{ $mahasiswa->ujian_skripsi->dosen_pembimbing_1 }}
                </td>
                <td>
                    sebagai : Penguji 1
                </td>
            </tr>
            <tr>
                <td style="width: 35%;">
                    3. {{ $mahasiswa->ujian_skripsi->dosen_pembimbing_2 }}
                </td>
                <td>
                    sebagai : Penguji 2
                </td>
            </tr>
            <tr>
                <td style="width: 35%;">
                    4. {{ $mahasiswa->ujian_skripsi->dosen_penguji_1 }}
                </td>
                <td>
                    sebagai : Penguji 3
                </td>
            </tr>
            <tr>
                <td style="width: 35%;">
                    5. {{ $mahasiswa->ujian_skripsi->dosen_penguji_2 }}
                </td>
                <td>
                    sebagai : Penguji 4
                </td>
            </tr>
        </table>
        <p class="text-justify mt-4">Setelah membaca dan mempertimbangkan hasil munaqasyah, tim penguji menyatakan bahwa
            yang bersangkutan @if ($status == 'Lulus')
                <span class="font-weight-bold">LULUS/<strike>TIDAK LULUS</strike></span>. </p>
            @else
                <span class="font-weight-bold"><strike>LULUS</strike>/TIDAK LULUS</span>. </p>
            @endif
        <p class="text-justify mt-1">Dengan catatan : Skripsi yang bersangkutan diperbaiki sesuai dengan masukan dan
            arahan dari tim penguji dalam jangka waktu selama {{ $jangka }} ( <span style="text-transform: capitalize">{{ Riskihajar\Terbilang\Facades\Terbilang::make($jangka) }}</span> )  @if ($satuan == 'Hari')
            Hari/<strike>Minggu</strike>/<strike>Bulan</strike>
            @elseif ($satuan == 'Minggu')
            <strike>Hari</strike>/Minggu/<strike>Bulan</strike>
            @elseif ($satuan == 'Bulan')
            <strike>Hari</strike>/<strike>Minggu</strike>/Bulan
            @endif terhitung Sejak tanggal {{ \Carbon\Carbon::parse($mahasiswa->ujian_skripsi->tanggal_sidang)->translatedFormat('d F Y') }}.</p>
        <div class="text-center mt-3 mb-3">
            <p class="font-weight-bold">TIM PENGUJI</p>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th style="width: 5%;">No</th>
                    <th style="width: 40%;">Nama</th>
                    <th>Nilai</th>
                    <th style="width: 40%;">Tanda Tangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>{{ $mahasiswa->ujian_skripsi->ketua_penguji }}</td>
                    <td></td>
                    <td>1.</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>{{ $mahasiswa->ujian_skripsi->dosen_pembimbing_1 }}</td>
                    <td></td>
                    <td class="text-center">2.</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>{{ $mahasiswa->ujian_skripsi->dosen_pembimbing_2 }}</td>
                    <td></td>
                    <td>3.</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>{{ $mahasiswa->ujian_skripsi->dosen_penguji_1 }}</td>
                    <td></td>
                    <td class="text-center">4.</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>{{ $mahasiswa->ujian_skripsi->dosen_penguji_2 }}</td>
                    <td></td>
                    <td>5.</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center font-weight-bold" style="padding: 6px !important;">Jumlah</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center font-weight-bold" style="padding: 6px !important;">Rata-Rata</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-end" style="margin-right: 100px;">
            <div class="column">
                <p>Mengetahui</p>
                <p>Ketua Sidang</p>
                <p style="margin-top: 100px;">{{ $mahasiswa->ujian_skripsi->ketua_penguji }}</p>
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
