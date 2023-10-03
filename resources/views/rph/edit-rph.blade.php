@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="" method="post">
        @csrf
        <div class="garis">
            <div class="border-lists">
                <h2 class="mt-2 middletext">DATA KERUSAKAN / KEHILANGAN</h2>
                <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table>
                    <tbody>
                        <style>
                            span {
                                color: white;
                            }
                        </style>

                        <tr>
                            <td>Jenis</td>
                            <td height="50px"><span>X</span>
                                <select name="jns_rusak" required>
                                    <option value="" disabled selected hidden>Pilih Jenis</option>
                                    <option value="0">Rusak</option>
                                    <option value="1">Hilang</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="300px">Tanggal Input</td>
                            <td height="50px"><span>X</span> <input type="date" name="tanggal_input" required></td>
                        </tr>
                        <tr>
                            <td width="300px">Tanggal Kejadian</td>
                            <td height="50px"><span>X</span> <input type="date" name="tanggal_jadi" required></td>
                        </tr>
                        <tr>
                            <td>Nomor PU</td>
                            <td height="50px"><span>X</span> <input type="text" name="no_PU" required></td>
                        </tr>
                        <tr>
                            <td rowspan="2">Koordinat PU</td>
                            <td height="50px">X <input placeholder="Koordinat X" type="text" name="koor_x" required>
                            </td>
                        </tr>
                        <tr>
                            <td height="50px">Y <input placeholder="Koordinat Y" type="text" name="koor_y" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Diameter Tunggak</td>
                            <td height="50px"><span>X</span> <input type="text" name="diameter"></td>
                        </tr>
                    </tbody>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Edit Data</button>
                </div>
            </div>
        </div>
    </form>
    <style>
        input[type="text"].koordinat::placeholder {
            text-align: right;
        }

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
    </style>
@endsection
