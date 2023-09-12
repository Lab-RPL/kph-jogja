@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-list scrollable-container" style="margin-top: 5%;">
            <h2 style="font-size: 20px; font-weight: bold; text-align: center;" class="mt-2">KESATUAN PENGELOLAAN HUTAN (KPH)</h2>
            <p style="font-size: 18px; text-align: center;">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta
            </p>
            <form>
                <div class="wrapper">
                    <pre>DATA UTAMA</pre>
                </div>
                @csrf
                <center>
                    <table>
                        <tbody></tbody>
                            <tr>
                                <td width="300px">Nomor</td>
                                <td><span>:</span>
                                
                                </td>
                            </tr>
                            <tr>
                                <td >Tanggal</td>
                                <td><span>:</span>

                                </td>
                            </tr>
                            <tr>
                                <td>KPH</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>BDH</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>RPH</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Petak</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor PU (banyak)</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">Koordinat PU</td>
                                <td><span>X :</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td><span>Y :</span>
                            
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
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Tanaman Sela</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun Tanam</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Jarak Tanaman Awal</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <pre>DATA TEGAKAN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Keadaan Kesehatan</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Kerataan</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Kemurnian</td>
                                <td><span>:</span>
                            
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
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Derajat Lereng </td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Kerataan </td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><pre>DATA TANAH</pre></td>
                            </tr>
                            <tr>
                                <td>Jenis Tanah</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Kedalaman </td>
                                <td><span>:</span>
                            
                                </td>                              
                            </tr>
                            <tr>
                                <td colspan="2"><pre style="font-weight: bold; font-size: 18px; text-align: center;">DATA TUMBUHAN BAWAH</pre></td>
                            </tr>
                            <tr>
                                <td>Jenis </td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Kerapatan</td>
                                <td><span>:</span>
                            
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
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Erosi</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Ketinggian Tempat</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <pre style="font-weight: bold; font-size: 18px; text-align: center;">KETERANGAN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Diameter</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Luas Bidang Dasar</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Peninggi</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td>Temuan Lapangan Lain</td>
                                <td><span>:</span>
                            
                                </td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-warning" style="color: white; float: left;" href="#">Ubah Data</a></td>
                                <td><a class="btn btn-primary" style="color: white; float: right;" href="/data-utama">Lanjutkan</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        
                        
                    </div>
        </div>
        </center>
        </form>
    </div>
    </div>

    <style>
        pre{
            font-weight: bold; 
            font-size: 18px; 
            text-align: center;
        }
        .scrollable-container {
            max-height: 38rem;
            overflow-y: scroll;
            border: 3px solid #0CB166;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .scrollable-container::-webkit-scrollbar {
            display: none;
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
    </style>
@endsection
