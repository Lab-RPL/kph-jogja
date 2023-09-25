@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-lists scrollable-container">
            <h2 class="middletext" class="mt-2">KESATUAN PENGELOLAAN HUTAN (KPH)</h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta
            </p>
            <form method="POST">
                <div class="wrapper">
                    <pre>DATA UTAMA</pre>
                </div>
                @csrf
                {{-- @method('put') --}}
                <center>
                    <table>
                        {{-- @foreach ($data as $da)
                        <tr>
                            <td width="300px">Nomor</td>
                            <td><span>:</span>
                                {{ $da->no_PU }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td><span>:</span>
                                {{ $da->tanggal }}
                            </td>
                        </tr>
                        <tr>
                            <td>BDH</td>
                            <td><span>:</span>
                                {{ $da->nama_bdh }}
                            </td>
                        </tr>
                        <tr>
                            <td>RPH</td>
                            <td><span>:</span>
                                {{ $da->nama_rph }}
                            </td>
                        </tr>
                        <tr>
                            <td>Petak</td>
                            <td><span>:</span>
                                {{ $da->nomor_ptk }}
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2">Koordinat PU</td>
                            <td><span>X :</span>
                                {{ $da->koor_x }}
                            </td>
                        </tr>
                        <tr>
                            <td><span>Y :</span>
                                {{ $da->koor_y }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <pre>DATA UTAMA (RISALAH HUTAN)</pre>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Tanaman</td>
                            <td><span>:</span>
                                {{ $da->jns_tanam }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tanaman Sela</td>
                            <td><span>:</span>
                                {{ $da->tanam_sela }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun Tanam</td>
                            <td><span>:</span>
                                {{ $da->tahun_tanam }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jarak Tanaman Awal</td>
                            <td><span>:</span>
                                {{ $da->jarak_tanam }}
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <pre style="font-weight: bold; font-size: 18px; text-align: center;">DATA LAPANGAN</pre>
                            </td>
                        </tr>
                        <tr>
                            <td>Bentuk Lapangan </td>
                            <td><span>:</span>
                                {{ $da->bentuk_lap }}
                            </td>
                        </tr>
                        <tr>
                            <td>Derajat Lereng </td>
                            <td><span>:</span>
                                {{ $da->derajat_lereng }}
                            </td>
                        </tr>
                        <tr>
                            <td>Kerataan </td>
                            <td><span>:</span>
                                {{ $da->kerataan_lap }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <pre>DATA TANAH</pre>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Tanah</td>
                            <td><span>:</span>
                                {{ $da->jns_tanah }}
                            </td>
                        </tr>
                        <tr>
                            <td>Kedalaman </td>
                            <td><span>:</span>
                                {{ $da->kedalaman }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <pre style="font-weight: bold; font-size: 18px; text-align: center;">DATA TUMBUHAN BAWAH</pre>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis </td>
                            <td><span>:</span>
                                {{ $da->jns_bwh }}
                            </td>
                        </tr>
                        <tr>
                            <td>Kerapatan</td>
                            <td><span>:</span>
                                {{ $da->kerapatan }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <pre style="font-weight: bold; font-size: 18px; text-align: center;">KETERANGAN LAIN</pre>
                            </td>
                        </tr>
                        <tr>
                            <td>Tipe Penggunaan Lahan</td>
                            <td><span>:</span>
                                {{ $da->penemuan }}
                            </td>
                        </tr>
                        <tr>
                            <td>Erosi</td>
                            <td><span>:</span>
                                {{ $da->erosi }}
                            </td>
                        </tr>
                        <tr>
                            <td>Ketinggian Tempat</td>
                            <td><span>:</span>
                                {{ $da->tinggi_tempat }}
                            </td>
                        </tr>
                        @endforeach --}}
                    </table> 
                    <div style="display: flex; justify-content: space-between; margin-top: 60px;">
                        <a class="btn btn-warning" style="color: white; float: left;" href="">Ubah
                            Data</a>
                        <a class="btn btn-primary" style="color: white; float: right;" href="/data-tegakan">Lanjutkan</a>
                    </div>
        </div>
        </center>
        </form>
    </div>
    </div>

    <style>
        pre {
            font-weight: bold;
            font-size: 18px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
        }

        .line-table {
            border-bottom: 1px solid;
        }

        select {
            width: 200px;
            padding: 5px;
            border: 2px solid #0CB166;
            border-radius: 5px;
            font-size: 16px;
        }

        option {
            padding: 5px;
        }

        .border-top-bottom {
            border-top: 2px solid #0CB166;
            border-bottom: 2px solid #0CB166;
            padding: 2rem;
        }
    </style>
@endsection
