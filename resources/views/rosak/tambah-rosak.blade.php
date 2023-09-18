@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('bdh.store') }}" method="post">
        @csrf
        <div class="garis">
            <div class="border-lists">
            <h2 class="mt-2 middletext">Kerusakan Dan Kehilangan</h2>
                <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">
                    <tr>
                        <td><label for="jenis">Jenis</label></td>
                        <td>
                            <select id="jenis" name="jenis" required>
                                <option value="" disabled selected hidden>Pilih jenis</option>
                                <option value="kerusakan">Kerusakan</option>
                                <option value="kehilangan">Kehilangan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tanggal-input">Tanggal Input</label></td>
                        <td><input type="date" required></td>
                    </tr>
                    <tr>
                        <td><label for="tanggal-rusak">Tanggal Rusak</label></td>
                        <td><input type="date" required></td>
                    </tr>
                    <tr>
                        <td><label for="nomor-pu">Nomor PU</label></td>
                        <td><input type="text" required></td>
                    </tr>
                    <tr>
                        <td><label for="koordinat-kerusakan">Koordinat Kerusakan</label></td>
                        <td>
                            <input type="text" class="koordinat" id="koordinat-x" name="koordinat-x" placeholder="X" required>
                            <input type="text" class="koordinat" id="koordinat-y" name="koordinat-y" placeholder="Y" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="diameter-tunggak">Diameter Tunggak <br> (Khusus Kehilangan)</label></td>
                        <td><input type="text" required></td>
                    </tr>
                    <tr>
                        <td><label for="upload-foto">Upload Foto</label></td>
                        <td><input type="file" required></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="/data-rusak">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Tambah Data</button>
                </div>
            </div>
        </div>
    </form>
    <style>

        input[type="text"].koordinat::placeholder {
            text-align: right;
        }
    </style>
@endsection
