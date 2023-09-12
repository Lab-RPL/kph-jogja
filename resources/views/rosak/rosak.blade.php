@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-list">
            <h2 class="mt-2">Kerusakan Dan Kehilangan</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                <div class="wrapper">
                    <div class="bdh">
                        <h3>Data Kerusakan</h3>
                    </div>
                </div>
                @csrf
                
                <!-- tabel kerusakan -->

                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" valign="middle">Tanggal Input</th>
                            <th rowspan="2" valign="middle">Tanggal Rusak</th>
                            <th rowspan="2" valign="middle">Nomor PU</th>
                            <th colspan="2" >Koordinat Rusak</th>
                            <th rowspan="2" valign="middle">Aksi</th>
                            <th rowspan="2" valign="middle">Foto</th>
                        </tr>
                        <tr>
                            <th>
                                <div style="text-align: center;">X</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Y</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href=""class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                    <a href=""class="btn btn-warning mb-1 m-l-1">Edit</a>
                                </td>
                            </tr>
                    </tbody>
                </table>

                <div class="wrapper">
                    <div class="bdh">
                        <h3>Data Kehilangan</h3>
                    </div>
                </div>

                <!-- Tabel Kehilangan -->

                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" valign="middle">Tanggal Input</th>
                            <th rowspan="2" valign="middle">Tanggal Rusak</th>
                            <th rowspan="2" valign="middle">Nomor PU</th>
                            <th colspan="2" valign="middle">Koordinat Kehilangan</th>
                            <th rowspan="2" valign="middle">Foto</th>
                            <th rowspan="2" valign="middle">Diameter Tunggak</th>
                            <th rowspan="2" valign="middle">Aksi</th>
                        </tr>
                        <tr>
                            <th>
                                <div style="text-align: center;">X</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Y</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="btn-group"> 
                                    <a href=""class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                    <a href=""class="btn btn-warning mb-1 m-l-1 ms-2">Edit</a>
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