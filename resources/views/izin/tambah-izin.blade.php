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
            <div class="border-list">
                <h2>PERIZINAN BERUSAHA PENGOLAHAN HUTAN</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

                <table id="tabelData">
                    <tr>
                        <td><label for="tambah-bdh">Nama Kelompok Tani Hutan</label></td>
                        <td><input type="text" id="tambah-rph" name="nama_bdh" required></td>
                    </tr>
                    <tr>
                        <td><label for="tambah-bdh">Nomor SK</label></td>
                        <td><input type="text" id="tambah-rph" name="kepala_bdh" required></td>
                    </tr>
                    <tr>
                        <td><label for="nomor-ptk">Nomor Petak</label></td>
                        <td><input type="text" id="nomor-ptk" name="nomor_ptk" required></td>
                    </tr>
                    <tr>
                        <td><label for="luas-izin">Luas Izin</label></td>
                        <td><input type="text" id="luas-izin" name="luas_izin" required></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="/data-izin">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
