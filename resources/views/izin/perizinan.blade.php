@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-list">
            <h2>DATA PERIZINAN BERUSAHA</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr class="kolom">
                            <th>Nama Kelompok Tani Hutan</th>
                            <th>Nomor SK</th>
                            <th>Petak</th>
                            <th>Luas Izin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href=""class="btn btn-danger mb-1 m-l-1">Hapus</a>
                            <a href=""class="btn btn-warning mb-1 m-l-1">Edit</a>
                        </td>

                    </tbody>
                </table>
                <div style="display: flex; justify-content: space-between;">
                    <a class="btn btn-warning" style="color: white" href="/data-bdh">Kembali</a>
                    <a class="btn btn-primary" style="color: white" href="/tambah-izin">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>
@endsection
