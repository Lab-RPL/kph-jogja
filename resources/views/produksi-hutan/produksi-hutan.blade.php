@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-lists">
            <h2 class="mt-2 middletext">PRODUKSI HASIL HUTAN</h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                <div class="center">
                    <div class="bdh">
                        <pre class="form-control" style="font-weight: bold; background-color:
                        rgba(216, 245, 199, 0.664);padding-left:265px;padding-right:265px;text-align:center">Produksi Hasil Hutan Kayu</pre>
                    </div>
                </div>
                @csrf

                <!-- tabel kayu -->

                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" valign="middle">Luas</th>
                            <th rowspan="2" valign="middle">Volume</th>
                            <th rowspan="2" valign="middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href=""class="btn btn-warning mb-1 m-l-1 ms-2"><i class="fas fa-pencil-alt"></i></a>
                                    <a href=""class="btn btn-danger mb-1 m-l-1"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                    </tbody>
                </table>

                <div class="center">
                    <div class="bdh">
                        <pre class="form-control" style="font-weight: bold; background-color:
                        rgba(216, 245, 199, 0.664);margin-top:40px;text-align:center">Produksi Hasil Hutan Bukan Kayu</pre>
                    </div>
                </div>

                <!-- Tabel Non Kayu -->

                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" valign="middle">Luas</th>
                            <th rowspan="2" valign="middle">Volume</th>
                            <th rowspan="2" valign="middle">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href=""class="btn btn-warning mb-1 m-l-1 ms-2"><i class="fas fa-pencil-alt"></i></a>
                                    <a href=""class="btn btn-danger mb-1 m-l-1"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                    </tbody>
                </table>
                <div style="display: flex; justify-content: space-between;">
                    <a class="btn btn-primary" style="color: white" href="/tambah-rosak">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>

@endsection
