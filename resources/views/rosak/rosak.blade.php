@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <div class="garis">
        <div class="border-lists">
            <h2 class="mt-2 middletext">DATA KERUSAKAN / KEHILANGAN</h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

            <style>
                div.dataTables_wrapper div.dataTables_filter {
                    text-align: right;
                    margin-right: 50px;
                }
            </style>

            <form>
                <div class="wrapper">
                    <div class="bdh">
                        <h3>Data Kerusakan</h3>
                    </div>
                </div>
                @csrf
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <!-- tabel kerusakan -->

                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Tanggal Input</th>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Tanggal Rusak</th>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Nomor PU</th>
                            <th colspan="2" style="background-color: #9CC589;">Koordinat Rusak</th>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Foto</th>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Aksi</th>
                        </tr>
                        <tr>
                            <th style="background-color: #9CC589;">
                                <div style="text-align: center">X</div>
                            </th>
                            <th style="background-color: #9CC589;">
                                <div style="text-align: center;">Y</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $ros)
                        @if ($ros->jns_rusak == 0)
                        @if ($ros->IsDelete == 0)
                            
                       
                        <tr>
                            <td>{{ $ros->tgl_input }}</td>
                            <td>{{ $ros->tgl_rusak }}</td>
                            <td>{{ $ros->no_PU }}</td>
                            <td>{{ $ros->koor_x }}</td>
                            <td>{{ $ros->koor_y }}</td>
                            <td>{{ $ros->foto }}</td>
                            <td class="btn-group">
                                <a href="{{ route('rosak.destroy', $ros->id_rusak) }}" class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                <a href="{{ route('rosak.edit',$ros->id_rusak) }}" class="btn btn-warning mb-1 m-l-1 ms-2">Edit</a>
                            </td>
                        </tr>
                        @endif
                        @endif
                        @endforeach

                    </tbody>
                </table>

                <div class="wrapper">
                    <div class="bdh">
                        <h3>Data Kehilangan</h3>
                    </div>
                </div>

                <!-- Tabel Kehilangan -->

                <table id="tabelData2" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Tanggal Input</th>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Tanggal Rusak</th>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Nomor PU</th>
                            <th colspan="2" valign="middle" style="background-color: #9CC589;">Koordinat Kehilangan</th>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Diameter Tunggak</th>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Foto</th>
                            <th rowspan="2" valign="middle" style="background-color: #9CC589;">Aksi</th>
                        </tr>
                        <tr>
                            <th style="background-color: #9CC589;">
                                <div style="text-align: center;">X</div>
                            </th>
                            <th style="background-color: #9CC589;">
                                <div style="text-align: center;">Y</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $ros)
                            @if ($ros->jns_rusak == 1)
                            @if ($ros->IsDelete == 0)
                            <tr>
                                <td>{{ $ros->tgl_input }}</td>
                                <td>{{ $ros->tgl_rusak }}</td>
                                <td>{{ $ros->no_PU }}</td>
                                <td>{{ $ros->koor_x }}</td>
                                <td>{{ $ros->koor_y }}</td>
                                <td>{{ $ros->diameter }}</td>
                                <td>{{ $ros->foto }}</td>
                                <td class="btn-group">
                                    <a href="{{ route('rosak.destroy', $ros->id_rusak) }}" data-id="{{ $ros->id_rusak }}" class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                    <a href="{{ route('rosak.edit',$ros->id_rusak) }}" class="btn btn-warning mb-1 m-l-1 ms-2">Edit</a>
                                </td>
                            </tr>
                                
                            @endif
                            @endif
                        @endforeach

                    </tbody>
                </table>

                <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                <script>
                    $('#tabelData').DataTable({
                        lengthMenu: [
                            [5, 10, 25, -1],
                            [5, 10, 25, "All"]
                        ],

                        pageLength: 5 // Menampilkan 5 data per halaman
                    });

                    $('#tabelData2').DataTable({
                        lengthMenu: [
                            [5, 10, 25, -1],
                            [5, 10, 25, "All"]
                        ],

                        pageLength: 5 // Menampilkan 5 data per halaman
                    });
                </script>
                <div style="display: flex; justify-content: space-between;">
                    <a class="btn btn-primary" style="color: white" href="/tambah-rosak">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pesanSukses = document.getElementById('pesan-sukses');
            if (pesanSukses) {
                setTimeout(function() {
                    pesanSukses.style.display = 'none';
                }, 5000);
            }
        });
    </script>
@endsection
