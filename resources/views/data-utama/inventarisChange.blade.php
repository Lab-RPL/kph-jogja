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
            <form action="{{ route('data-utama.update', $data->id_PU) }}" method="post">
                <div class="wrapper">
                    <pre>RISALAH HUTAN</pre>
                </div>
                @csrf
                @method('PUT')
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
                                <td height="50px"><span>X</span> <input type="date" name="tanggal"
                                        value="{{ $data->tanggal }}" required></td>
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
                                    <select name="id_ptk" required>
                                        <option value="" selected disabled hidden>Pilih Nomor Petak</option>
                                        @foreach ($petak as $ptk)
                                            @if ($ptk->IsDelete == 0)
                                                @php
                                                    $selected_petak = $data->id_ptk == $ptk->id_ptk ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $ptk->id_ptk }}" {{ $selected_petak }}>
                                                    {{ $ptk->nomor_ptk }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Nomor PU</td>
                                <td height="50px"><span>X</span> <input type="text" name="no_PU"
                                        value="{{ $data->no_PU }}" required>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">Koordinat PU</td>
                                <td height="50px">X <input placeholder="Koordinat X" type="text" name="koor_x" required
                                        value="{{ $data->koor_x }}"></td>
                            </tr>
                            <tr>
                                <td height="50px">Y <input placeholder="Koordinat Y" type="text" name="koor_y" required
                                        value="{{ $data->koor_y }}"></td>
                            </tr>
                            <tr>
                                <td colspan="2" height="65px">
                                    <pre>RISALAH TEGAKAN</pre>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanaman Sela</td>
                                <td height="50px"><span>X</span> <input type="text" name="tanam_sela" required
                                        value="{{ $data->tanam_sela }}"></td>
                            </tr>
                            <tr>
                                <td>Tahun Tanam</td>
                                <td height="50px"><span>X</span> <input type="text" name="tahun_tanam"
                                        placeholder="Tahun" required value="{{ $data->tahun_tanam }}"></td>
                            </tr>
                            <tr>
                                <td>Jarak Tanaman Awal</td>
                                <td height="50px"><span>X</span> <input type="text" name="jarak_tanam"
                                        value="{{ $data->jarak_tanam }}" placeholder="m" required></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td height="50px"><span>X</span> <input type="text" name="umur_tgk" placeholder="Tahun"
                                        required value="{{ $data->umur_tgk }}"></td>
                            </tr>
                            <tr>
                                <td>Keadaan Kesehatan</td>
                                <td height="50px"><span>X</span>
                                    <select name="keadaan_kes" required>
                                        <option value="">Pilih Keadaan</option>
                                        <option value="Baik" @if ($data->keadaan_kes == 'Baik') selected @endif>Baik
                                        </option>
                                        <option value="Sedang" @if ($data->keadaan_kes == 'Sedang') selected @endif>Sedang
                                        </option>
                                        <option value="Jelek" @if ($data->keadaan_kes == 'Jelek') selected @endif>Jelek
                                        </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Kerataan</td>
                                <td height="50px"><span>X</span>
                                    <select name="kerataan_tgk" required>
                                        <option value="">Pilih Kerataan</option>
                                        <option value="Rata" @if ($data->kerataan_tgk == 'Rata') selected @endif>Rata
                                        </option>
                                        <option value="Agak Rata" @if ($data->kerataan_tgk == 'Agak Rata') selected @endif>Agak
                                            Rata</option>
                                        <option value="Tidak Rata" @if ($data->kerataan_tgk == 'Tidak Rata') selected @endif>Tidak
                                            Rata</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kemurnian</td>
                                <td height="50px"><span>X</span>
                                    <select name="kemurnian" required>
                                        <option value="">Pilih Kemurnian</option>
                                        <option value="Murni" @if ($data->kemurnian == 'Murni') selected @endif>Murni
                                        </option>
                                        <option value="Agak Murni" @if ($data->kemurnian == 'Agak Murni') selected @endif>Agak
                                            Murni</option>
                                        <option value="Tidak Murni" @if ($data->kemurnian == 'Tidak Murni') selected @endif>Tidak
                                            Murni</option>
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
                                <td>Bentuk Lapangan</td>
                                <td height="50px"><span>X</span>
                                    <select name="bentuk_lap" required>
                                        <option value="">Pilih Bentuk Lapangan</option>
                                        <option value="Puncak" @if ($data->bentuk_lap == 'Puncak') selected @endif>Puncak
                                        </option>
                                        <option value="Punggung" @if ($data->bentuk_lap == 'Punggung') selected @endif>
                                            Punggung</option>
                                        <option value="Pasu" @if ($data->bentuk_lap == 'Pasu') selected @endif>Pasu
                                        </option>
                                        <option value="Jurang" @if ($data->bentuk_lap == 'Jurang') selected @endif>Jurang
                                        </option>
                                        <option value="Lereng" @if ($data->bentuk_lap == 'Lereng') selected @endif>Lereng
                                        </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Derajat Lereng </td>
                                <td height="50px"><span>X</span>
                                    <input type="text" style="width: 75px" placeholder="00°" name="derajat_lereng"
                                        required value="{{ $data->derajat_lereng }}">
                                    <select name="landai_lereng" required>
                                        <option value="">Pilih Data</option>
                                        <option value="Rata" @if ($data->landai_lereng == 'Rata') selected @endif>Rata
                                        </option>
                                        <option value="Landai" @if ($data->landai_lereng == 'Landai') selected @endif>Landai
                                        </option>
                                        <option value="Curam" @if ($data->landai_lereng == 'Curam') selected @endif>Curam
                                        </option>
                                        <option value="Sangat Curam" @if ($data->landai_lereng == 'Sangat Curam') selected @endif>
                                            Sangat Curam</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kerataan </td>
                                <td height="50px"><span>X</span>
                                    <select name="kerataan_lap" required>
                                        <option value="">Pilih Kerataan</option>
                                        <option value="Berbukit" @if ($data->kerataan_lap == 'Berbukit') selected @endif>
                                            Berbukit</option>
                                        <option value="Berombak" @if ($data->kerataan_lap == 'Berombak') selected @endif>
                                            Berombak</option>
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
                                    <select name="jns_tanah" required>
                                        <option value="">Pilih Jenis Tanah</option>
                                        <option value="Abu" @if ($data->jns_tanah == 'Abu') selected @endif>Abu
                                        </option>
                                        <option value="latosol" @if ($data->jns_tanah == 'latosol') selected @endif>Latosol
                                        </option>
                                        <option value="Kapur" @if ($data->jns_tanah == 'Kapur') selected @endif>Kapur
                                        </option>
                                        <option value="Margalit" @if ($data->jns_tanah == 'Margalit') selected @endif>
                                            Margalit</option>
                                        <option value="Grumusol" @if ($data->jns_tanah == 'Grumusol') selected @endif>
                                            Grumusol</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>Kedalaman </td>
                                <td height="50px"><span>X</span>
                                    <input type="text" style="width: 85px;" placeholder="m" name="kedalaman" required
                                        value="{{ $data->kedalaman }}">
                                    <select style="width: 8rem;" name="dalaman" required>
                                        <option value="">Pilih Data</option>
                                        <option value="Dalam" @if ($data->dalaman == 'Dalam') selected @endif>Dalam
                                        </option>
                                        <option value="Agak Dalam" @if ($data->dalaman == 'Agak Dalam') selected @endif>Agak
                                            Dalam</option>
                                        <option value="Dangkal" @if ($data->dalaman == 'Dangkal') selected @endif>Dangkal
                                        </option>
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
                                    <input type="text" style="width: 150px;" name="jns_bwh"
                                        value="{{ $data->jns_bwh }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Kerapatan</td>
                                <td>
                                    <span>X</span>
                                    <select style="width: 150px;" name="kerapatan" required>
                                        <option value="">Pilih Kerapatan</option>
                                        <option value="Rapat" @if ($data->kerapatan == 'Rapat') selected @endif>Rapat
                                        </option>
                                        <option value="Berbukit" @if ($data->kerapatan == 'Berbukit') selected @endif>
                                            Berbukit</option>
                                        <option value="Sedang" @if ($data->kerapatan == 'Sedang') selected @endif>Sedang
                                        </option>
                                        <option value="Jarang" @if ($data->kerapatan == 'Jarang') selected @endif>Jarang
                                        </option>
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
                                    <input type="text" style="width: 350px;" name="penemuan"
                                        value="{{ $data->penemuan }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Erosi</td>
                                <td>
                                    <span>X</span>
                                    <select style="width: 150px;" name="erosi">
                                        <option value="">Pilih Data</option>
                                        <option value="Ada" @if ($data->erosi == 'Ada') selected @endif>Ada
                                        </option>
                                        <option value="Tidak Erosi" @if ($data->erosi == 'Tidak Erosi') selected @endif>
                                            Tidak Erosi</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>Ketinggian Tempat</td>
                                <td>
                                    <span>X</span>
                                    <input type="text" style="width: 150px;" name="tinggi_tempat" placeholder="m"
                                        value="{{ $data->tinggi_tempat }}">
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
