<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Bimbingan Skripsi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        @media print {
            @page {
                margin-top: 16px !important;
                margin-bottom: 0px !important;
                size: portrait;
                size: A4;
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
            margin-bottom: -3px;
            font-size: 22px;
        }

        .table-borderless .table-top tr td {
            padding: 8px !important;
        }

        .table-borderless .table-yth tr td {
            padding: 2px !important;
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
            font-size: 18px;
        }

        table tr th {
            padding: 6px !important;
        }

        table tr td {
            padding: 26px !important;
        }
    </style>
</head>

<body>
    <div class="container" style="padding-left: 0px; padding-right: 0px;">
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
        <div class="text-center mb-3">
            <p>KARTU KONSULTASI BIMBINGAN SKRIPSI</p>
            <p>FAKULTAS SYARI'AH IAIN KERINCI</p>
        </div>
        <table class="table table-borderless mt-4">
            <tbody class="table-top">
                <tr>
                    <td style="width: 18%;">Nama</td>
                    <td style="width: 2%;">&nbsp;:</td>
                    <td>{{ $item->user->nama }}</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>&nbsp;:</td>
                    <td>{{ $item->user->mahasiswa->nim }}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>&nbsp;:</td>
                    <td>{{ $item->user->mahasiswa->prodi }}</td>
                </tr>
                <tr>
                    <td>Judul Skripsi</td>
                    <td>&nbsp;:</td>
                    <td>{{ $item->user->mahasiswa->judul_skripsi }}</td>
                </tr>
                <tr>
                    <td>{{ $dosen }}</td>
                    <td>&nbsp;:</td>
                    <td>
                        @if ($dosen == 'Pembimbing 1')
                        {{ $item->dosen_pembimbing_1 }}
                        @else
                        {{ $item->dosen_pembimbing_2 }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered mt-3">
            <thead>
                <tr class="text-center">
                    <th style="width: 3%;">No</th>
                    <th style="width: 18%;">Hari / Tanggal</th>
                    <th style="width: 22%;">Materi Bimbingan</th>
                    <th>Catatan Pembimbing</th>
                    <th style="width: 16%;">Tanda Tangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-borderless mt-4 ml-4">
            <tbody class="table-yth">
                <tr>
                    <td style="width: 30%;"></td>
                    <td style="width: 40%;">Sungai Penuh, 10 Mei 2022</td>
                </tr>
                <tr>
                    <td>Mahasiswa yang bersangkutan</td>
                    <td>Pembimbing 1</td>
                </tr>
                <tr>
                    <td style="padding-top: 85px !important;" class="font-weight-bold">Mufti Restu Mahesa</td>
                    <td style="padding-top: 85px !important;" class="font-weight-bold">Dewi Harlina</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-borderless" style="margin-top: 30px;">
            <tbody>
                <tr>
                    <td style="width: 6%;">*Catatan</td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 55%;">Kartu Konsultasi Bimbingan Skripsi ini dibawa pada waktu bimbingan dan
                        diserahkan kembali sebagai persyaratan ujian skripsi.</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
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
