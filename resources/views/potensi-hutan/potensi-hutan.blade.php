@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-list">
            <h2>Potensi Hasil Hutan</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                <div class="wrapper">
                    <div class="bdh">
                        <h3>Hasil Hutan Kayu</h3>
                    </div>
                </div>
                @csrf

                <!-- tabel kerusakan -->

                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" valign="middle">Jenis Tegakan</th>
                            <th rowspan="2" valign="middle">Luas Tegakan</th>
                            <th rowspan="2" valign="middle">Volume Tegakan</th>
                            <th rowspan="2" valign="middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- tesih dummy -->
                        <tr>
                            <td>Jenis Jati</td>
                            <td>xxx</td>
                            <td>xxx</td>
                            <td>
                                <a href=""class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                <a href=""class="btn btn-warning mb-1 m-l-1">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kayu Putih</td>
                            <td>xxx</td>
                            <td>xxx</td>
                            <td>
                                <a href=""class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                <a href=""class="btn btn-warning mb-1 m-l-1">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Rimba</td>
                            <td>xxx</td>
                            <td>xxx</td>
                            <td>
                                <a href=""class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                <a href=""class="btn btn-warning mb-1 m-l-1">Edit</a>
                            </td>
                        </tr>
                        <!-- sampek sini -->

                    </tbody>
                </table>

                <div class="wrapper">
                    <div class="bdh">
                        <h3>Hasil Hutan Bukan Kayu</h3>
                    </div>
                </div>

                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" valign="middle">Nama Wisata</th>
                            <th rowspan="2" valign="middle">Lokasi Wisata</th>
                            <th rowspan="2" valign="middle">Atraksi Wisata</th>
                            <th rowspan="2" valign="middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bukit Para Layang</td>
                            <td>xxx</td>
                            <td>xxx</td>
                            <td style="justify-content: space-between; align-items:center">
                                <a href="" class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                <a href="" class="btn btn-warning mb-1 m-l-2">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                {{-- {{ $data->links() }} --}}
                <div style="display: flex; justify-content: space-between;">
                    <a class="btn btn-primary" style="color: white" href="/tambah-potensi">Tambah Data HHBK</a>
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('pesan-sukses').style.display = 'none';
                    }, 5000); // 5000 milidetik = 5 detik
                </script>
            </form>
        </div>
    </div>
@endsection
