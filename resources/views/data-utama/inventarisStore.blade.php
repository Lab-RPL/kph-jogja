@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-lists">
            <h2 class="middletext" class="mt-2">DATA PETAK UKUR</h2>

            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta
            </p>
            <form action="{{ route('data-utama.store') }}" method="post">
                <div class="wrapper">
                    <pre class="form-control" style="font-weight: bold; background-color: rgba(216, 245, 199, 0.664);">RISALAH HUTAN</pre>
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
                                <td height="50px"><span>X</span> <input style="width: 25rem;" type="date" name="tanggal" required></td>
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
                                <td height="50px">
                                    <span>X</span>
                                    <select style="width: 25rem;" name="id_ptk" required>
                                        <option value="" disabled selected hidden>Pilih Nomor Petak</option>
                                        @foreach ($petak as $petak)
                                            @if ($petak->IsDelete == 0)
                                                <option value="{{ $petak->id_ptk }}">{{ $petak->nomor_ptk }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Nomor PU</td>
                                <td height="50px"><span>X</span> <input type="text" name="no_PU" required></td>
                            </tr>
                            <tr>
                                <td rowspan="2">Koordinat PU</td>
                                <td height="50px">X <input placeholder="Koordinat X" type="text" name="koor_x"
                                        required></td>
                            </tr>
                            <tr>
                                <td height="50px">Y <input placeholder="Koordinat Y" type="text" name="koor_y"
                                        required></td>
                            </tr>
                            <tr>
                                <td>Luas Petak Ukur</td>
                                <td height="50px"><span>X</span> <input type="text" name="luas_PU" required></td>
                            </tr>
                            <tr>
                                <td colspan="2" height="50px">
                                    <pre class="form-control" style="background-color: rgba(216, 245, 199, 0.664); font-weight: bold; margin-top: 5rem;">RISALAH TEGAKAN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanaman Sela</td>
                                <td height="50px"><span>X</span> <input type="text" name="tanam_sela" required></td>
                            </tr>
                            <tr>
                                <td>Tahun Tanam</td>
                                <td height="50px"><span>X</span> <input type="text" name="tahun_tanam"
                                        placeholder="Tahun" required></td>
                            </tr>
                            <tr>
                                <td>Jarak Tanaman Awal</td>
                                <td height="50px"><span>X</span> <input type="text" name="jarak_tanam" placeholder="m"
                                        required></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td height="50px"><span>X</span> <input type="text" name="umur_tgk" placeholder="Tahun"
                                        required></td>
                            </tr>
                            <tr>
                                <td>Keadaan Kesehatan</td>
                                <td height="50px"><span>X</span>
                                    <select style="width: 25rem;" name="keadaan_kes" required>
                                        <option value="" disabled selected hidden>Pilih Keadaan</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Sedang">Sedang</option>
                                        <option value="Jelek">Jelek</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kerataan</td>
                                <td height="50px"><span>X</span>
                                    <select style="width: 25rem;" name="kerataan_tgk" required>
                                        <option value="" disabled selected hidden>Pilih Kerataan</option>
                                        <option value="Rata">Rata</option>
                                        <option value="Agak Rata">Agak Rata</option>
                                        <option value="Tidak Rata">Tidak Rata</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kemurnian</td>
                                <td height="50px"><span>X</span>
                                    <select style="width: 25rem;" name="kemurnian" required>
                                        <option value="" disabled selected hidden>Pilih Kemurnian</option>
                                        <option value="Murni">Murni</option>
                                        <option value="Agak Murni">Agak Murni</option>
                                        <option value="Tidak Murni">Tidak Murni</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" height="50px">
                                    <pre class="form-control"
                                        style="background-color: rgba(216, 245, 199, 0.664); font-weight: bold; font-size: 18px; text-align: center; margin-top: 5rem;"
                                        class="form-control">RISALAH LAPANGAN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Bentuk Lapangan </td>
                                <td height="50px"><span>X</span>
                                    <select style="width: 25rem;" name="bentuk_lap" required>
                                        <option value="" disabled selected hidden>Pilih Bentuk Lapangan</option>
                                        <option value="Puncak">Puncak</option>
                                        <option value="Punggung">Punggung</option>
                                        <option value="Pasu">Pasu</option>
                                        <option value="Jurang">Jurang</option>
                                        <option value="Lereng">Lereng</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Derajat Lereng </td>
                                <td height="50px"><span>X</span>
                                    <input  type="text" style="width: 75px" placeholder="00°" name="derajat_lereng"
                                        required>
                                    <select style="width: 20rem;" name="landai_lereng" required>
                                        <option value="" disabled selected hidden>Pilih Data</option>
                                        <option value="Rata">Rata</option>
                                        <option value="Landai">Landai</option>
                                        <option value="Curam">Curam</option>
                                        <option value="Sangat Curam">Sangat Curam</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kerataan </td>
                                <td height="50px"><span>X</span>
                                    <select style="width: 25rem;" name="kerataan_lap" required>
                                        <option value="" disabled selected hidden>Pilih Kerataan</option>
                                        <option value="Berbukit">Berbukit</option>
                                        <option value="Berombak">Berombak</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" height="50px">
                                    <pre class="form-control" style="background-color: rgba(216, 245, 199, 0.664); font-weight: bold; margin-top: 5rem;">RISALAH TANAH</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Tanah</td>
                                <td><span>X</span>
                                    <select style="width: 25rem;" name="jns_tanah" required>
                                        <option value="" disabled selected hidden>Pilih Jenis Tanah</option>
                                        <option value="Abu">Abu</option>
                                        <option value="latosol">Latosol</option>
                                        <option value="Kapur">Kapur</option>
                                        <option value="Margalit">Margalit</option>
                                        <option value="Grumusol">Grumusol</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kedalaman </td>
                                <td height="50px"><span>X</span>
                                    <input type="text" style="width: 4.7rem;" placeholder="m" name="kedalaman"
                                        required>
                                    <select style="width: 20rem;" name="dalaman" required>
                                        <option value="" disabled selected hidden>Pilih Data</option>
                                        <option value="Dalam">Dalam</option>
                                        <option value="Agak Dalam">Agak Dalam</option>
                                        <option value="Dangkal">Dangkal</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <pre class="form-control"
                                        style="background-color: rgba(216, 245, 199, 0.664); font-weight: bold; font-size: 18px; text-align: center; margin-top: 5rem;">RISALAH TUMBUHAN BAWAH</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis </td>
                                <td height="50px"><span>X</span>
                                    <input style="width: 25rem;" type="text" style="width: 150px;" name="jns_bwh">
                                </td>
                            </tr>
                            <tr>
                                <td>Kerapatan</td>
                                <td>
                                    <span>X</span>
                                    <select style="width: 25rem;" style="width: 150px;" name="kerapatan" required>
                                        <option value="" disabled selected hidden>Pilih Kerapatan</option>
                                        <option value="Rapat">Rapat</option>
                                        <option value="Berbukit">Berbukit</option>
                                        <option value="Sedang">Sedang</option>
                                        <option value="Jarang">Jarang</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <pre class="form-control"
                                        style="background-color: rgba(216, 245, 199, 0.664); font-weight: bold; font-size: 18px; text-align: center; margin-top: 5rem;">KETERANGAN LAIN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Penemuan Lapangan Lain</td>
                                <td>
                                    <span>X</span>
                                    <input type="text" style="width: 25rem;" name="penemuan">
                                </td>
                            </tr>
                            <tr>
                                <td>Erosi</td>
                                <td>
                                    <span>X</span>
                                    <select style="width: 25rem;" name="erosi">
                                        <option value="" disabled selected hidden>Pilih Data</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Erosi">Tidak Erosi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Ketinggian Tempat</td>
                                <td>
                                    <span>X</span>
                                    <input type="text" style="width: 25rem;" name="tinggi_tempat" placeholder="m">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="display: flex; justify-content: space-between; margin-top: 60px;">
                        <a class="btn btn-warning" style="color: white; font-weight: bold;"
                            onclick="return goBack();">Kembali</a>
                        <button class="btn btn-primary"
                            style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                            type="submit">Submit</button>
                    </div>

                    <script>
                        function goBack() {
                            window.history.back();
                            return false;
                        }
                    </script>
        </div>
        </center>
        </form>
    </div>
    </div>

    <style>
        /* .border-lists {
                                        position: relative;
                                        border: 3px solid #ccc;
                                        border-radius: 20px;
                                        padding: 60px;
                                        max-width: 980px;
                                        width: 100%;
                                        height: auto;
                                        max-height: 550px;
                                        border-color: #0CB166;
                                        overflow-y: scroll;
                                        margin-bottom: 38px;
                                        } */

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
