@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <div class="garis">
        <div class="border-list">
            <h2>DATA PETAK</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

            <div class="wrapper">
                <div class="bdh">
                    <h3>BDH(.data)</h3>
                </div>
                <div class="rph">
                    <h3>RPH(.data)</h3>
                </div>
            </div>

            <form>
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor Petak</th>
                            <th>Luas Petak</th>
                            <th>Potensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi data dinamis di sini -->
                    </tbody>
                </table>
                <div style="display: flex; justify-content: space-between;">
                    <a class="btn btn-warning" style="color: white" href="">Kembali</a>
                    <a class="btn btn-primary" style="color: white" href="/tambahpetak">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>
@endsection
