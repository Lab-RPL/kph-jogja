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
                    @if ($data)
                        <table>

                            <tr>
                                <td width="300px">Nomor</td>
                                <td><span>:</span>
                                    {{ $data->no_PU }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td><span>:</span>
                                    {{ $data->tanggal }}
                                </td>
                            </tr>
                            <tr>
                                <td>BDH</td>
                                <td><span>:</span>
                                    {{ $data->nama_bdh }}
                                </td>
                            </tr>
                            <tr>
                                <td>RPH</td>
                                <td><span>:</span>
                                    {{ $data->nama_rph }}
                                </td>
                            </tr>
                            <tr>
                                <td>Petak</td>
                                <td><span>:</span>
                                    {{ $data->nomor_ptk }}
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">Koordinat PU</td>
                                <td><span>X :</span>
                                    {{ $data->koor_x }}
                                </td>
                            </tr>
                            <tr>
                                <td><span>Y :</span>
                                    {{ $data->koor_y }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <pre>RISALAH TEGAKAN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanaman Sela</td>
                                <td><span>:</span>
                                    {{ $data->tanam_sela }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun Tanam</td>
                                <td><span>:</span>
                                    {{ $data->tahun_tanam }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jarak Tanaman Awal</td>
                                <td><span>:</span>
                                    {{ $data->jarak_tanam }}
                                </td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td><span>:</span>
                                    {{ $data->umur_tgk }}
                                </td>
                            </tr>
                            <tr>
                                <td>Keadaan Kesehatan</td>
                                <td><span>:</span>
                                    {{ $data->keadaan_kes }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kerataan</td>
                                <td><span>:</span>
                                    {{ $data->kerataan_tgk }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kemurnian</td>
                                <td><span>:</span>
                                    {{ $data->kemurnian }}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <pre style="font-weight: bold; font-size: 18px; text-align: center;">RISALAH LAPANGAN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Bentuk Lapangan </td>
                                <td><span>:</span>
                                    {{ $data->bentuk_lap }}
                                </td>
                            </tr>
                            <tr>
                                <td>Derajat Lereng </td>
                                <td><span>:</span>
                                    {{ $data->derajat_lereng }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kerataan </td>
                                <td><span>:</span>
                                    {{ $data->kerataan_lap }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <pre>RISALAH TANAH</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Tanah</td>
                                <td><span>:</span>
                                    {{ $data->jns_tanah }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kedalaman </td>
                                <td><span>:</span>
                                    {{ $data->kedalaman }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <pre style="font-weight: bold; font-size: 18px; text-align: center;">RISALAH TUMBUHAN BAWAH</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis </td>
                                <td><span>:</span>
                                    {{ $data->jns_bwh }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kerapatan</td>
                                <td><span>:</span>
                                    {{ $data->kerapatan }}
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
                                    {{ $data->penemuan }}
                                </td>
                            </tr>
                            <tr>
                                <td>Erosi</td>
                                <td><span>:</span>
                                    {{ $data->erosi }}
                                </td>
                            </tr>
                            <tr>
                                <td>Ketinggian Tempat</td>
                                <td><span>:</span>
                                    {{ $data->tinggi_tempat }}
                                </td>
                            </tr>
                        </table>
                        <div style="display: flex; justify-content: space-between; margin-top: 60px;">
                            <a class="btn btn-danger" style="color: white; float: left;" href="{{route('data-utama.index')}}">Kembali</a>
                            <a class="btn btn-warning" style="color: white; float: left;" href="{{route('data-utama.edit',['id_PU'=> $data->id_PU])}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-primary" style="color: white; float: right;"
                                href="{{ route('data-tgk.index', ['id_PU' => $data->id_PU]) }}">Lanjutkan</a>
                        </div>
                    @else
                        <p>Tidak ada data yang ditemukan</p>
                    @endif
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
