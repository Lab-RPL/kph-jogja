@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-lists scrollable-container">
            <h2 class="middletext" class="mt-2">DATA PETAK UKUR</h2>

            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta
            </p>
            <form action="" method="post">
                <div class="wrapper">
                    <pre>RISALAH HUTAN</pre>
                </div>
                @csrf
                <center>
                    <table>
                        <tbody>
                            <style>
                                span {
                                    color: white;
                                }
                            </style>
                            <tr>
                                <td width="300px">Tanggal</td>
                                <td height="50px"><span>X</span> <input type="date" name="tanggal"></td>
                            </tr>
                            {{-- <tr>
                                <td>BDH</td>
                                <td height="50px"><span>X</span> <input type="text" name=""></td>
                            </tr>
                            <tr>
                                <td>RPH</td>
                                <td height="50px"><span>X</span> <input type="text"></td>
                            </tr> --}}
                            <tr>
                                <td>Petak</td>
                                <td height="50px"><span>X</span> <input type="text" name="petak_pu"></td>
                            </tr>
                            <tr>
                                <td>Nomor PU</td>
                                <td height="50px"><span>X</span> <input type="text" name="no_PU"></td>
                            </tr>
                            <tr>
                                <td rowspan="2">Koordinat PU</td>
                                <td height="50px">X <input placeholder="Koordinat X" type="text" name="koor_x"></td>
                            </tr>
                            <tr>
                                <td height="50px">Y <input placeholder="Koordinat Y" type="text" name="koor_y"></td>
                            </tr>
                            <tr>
                                <td colspan="2" height="65px">
                                    <pre>RISALAH TEGAKAN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanaman Sela</td>
                                <td height="50px"><span>X</span> <input type="text" name="tanam_sela"></td>
                            </tr>
                            <tr>
                                <td>Tahun Tanam</td>
                                <td height="50px"><span>X</span> <input type="text" name="tahun_tanam"></td>
                            </tr>
                            <tr>
                                <td>Jarak Tanaman Awal</td>
                                <td height="50px"><span>X</span> <input type="text" name="jarak_tanam"></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td height="50px"><span>X</span> <input type="text" name="umur_tgk"></td>
                            </tr>
                            <tr>
                                <td>Keadaan Kesehatan</td>
                                <td height="50px"><span>X</span>
                                    <select name="keadaan_kes">
                                        <option value="merah">Baik</option>
                                        <option value="hijau" selected>Sedang</option>
                                        <option value="biru">Jelek</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kerataan</td>
                                <td height="50px"><span>X</span>
                                    <select name="kerataan_kes">
                                        <option value="merah">Rata</option>
                                        <option value="hijau" selected>Agak Rata</option>
                                        <option value="biru">Tidak Rata</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kemurnian</td>
                                <td height="50px"><span>X</span>
                                    <select name="kemurnian">
                                        <option value="merah">Murni</option>
                                        <option value="hijau" selected>Agak Murni</option>
                                        <option value="biru">Tidak Murni</option>
                                    </select>
                                </td>
                            </tr>

                            <!-- line 2 -->
                            <td colspan="2" height="65px">
                                <div class="line-table mt-4"></div>
                            </td>

                            <tr>
                                <td colspan="2" height="65px">
                                    <pre style="font-weight: bold; font-size: 18px; text-align: center;">RISALAH LAPANGAN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Bentuk Lapangan </td>
                                <td height="50px"><span>X</span>
                                    <select name="bentuk_lap">
                                        <option value="merah">Puncak</option>
                                        <option value="hijau" selected>Punggung</option>
                                        <option value="biru">Pasu</option>
                                        <option value="biru">Jurang</option>
                                        <option value="biru">Lereng</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Derajat Lereng </td>
                                <td height="50px"><span>X</span>
                                    <input type="text" style="width: 75px" placeholder="00°">
                                    <select name="derajat_lereng">
                                        <option value="merah">Rata</option>
                                        <option value="hijau" selected>Landai</option>
                                        <option value="biru">Curam</option>
                                        <option value="biru">Sangat Curam</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kerataan </td>
                                <td height="50px"><span>X</span>
                                    <select name="kerataan_lap">
                                        <option value="berbukit">Berbukit</option>
                                        <option value="berombak">Berombak</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <pre>RISALAH TANAH</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Tanah</td>
                                <td><span>X</span>
                                    <select name="jns_tanah">
                                        <option value="abu">Abu</option>
                                        <option value="latosol">Latosol</option>
                                        <option value="kapur">Kapur</option>
                                        <option value="margalit">Margalit</option>
                                        <option value="grumusol">Grumusol</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kedalaman </td>
                                <td height="50px"><span>X</span>
                                    <input type="text" style="width: 80px;" placeholder="m">
                                    <select style="width: 8rem;" name="kelamaan">
                                        <option value="dalam">Dalam</option>
                                        <option value="agak">Agak Dalam</option>
                                        <option value="dangkal">Dangkal</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <pre style="font-weight: bold; font-size: 18px; text-align: center;">RISALAH TUMBUHAN BAWAH</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis </td>
                                <td height="50px"><span>X</span>
                                    <input type="text" style="width: 150px;" name="jenis_bwh">
                                </td>
                            </tr>
                            <tr>
                                <td>Kerapatan</td>
                                <td>
                                    <span>X</span>
                                    <select style="width: 150px;" name="kerapatan">
                                        <option value="rapat">Rapat</option>
                                        <option value="berbukit">Berbukit</option>
                                        <option value="sedang">Sedang</option>
                                        <option value="jarang">Jarang</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <pre style="font-weight: bold; font-size: 18px; text-align: center;">KETERANGAN LAIN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Penemuan Lapangan Lain</td>
                                <td>
                                    <span>X</span>
                                    <input type="text" style="width: 350px;" name="penemuan">
                                </td>
                            </tr>
                            <tr>
                                <td>Erosi</td>
                                <td>
                                    <span>X</span>
                                    <select style="width: 150px;" name="erosi">
                                        <option value="ada">Ada</option>
                                        <option value="tidak-erosi">Tidak / Erosi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Ketinggian Tempat</td>
                                <td>
                                    <span>X</span>
                                    <input type="text" style="width: 150px;" name="tinggi_tempat" placeholder="m">
                                </td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-warning" style="color: white; float: left;"
                                        onclick="return goBack();">Kembali</a></td>
                                <td><a class="btn btn-primary" style="color: white; float: right;"
                                        href="/data-result">Submit</a></td>
                            </tr>
                        </tbody>
                    </table>
        </div>
        </center>
        </form>
    </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
            return false;
        }
    </script>

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
    </style>
@endsection
