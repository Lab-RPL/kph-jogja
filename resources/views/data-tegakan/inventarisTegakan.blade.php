@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    {{-- Style search datatable --}}
    <style>
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-right: 50px;
        }

        .my-custom-table th {
            background-color: #B0E398;
            color: black;
        }
        .my-custom-table td {
            color: black;
        }
    </style>

    <div class="garis">
        <div class="border-list">
            <h2 class="mt-2 middletext">DATA TEGAKAN</h2>
            <p class="lead">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

            <form>
                <div style="display: flex; justify-content: flex-start;" class="mt-4">
                    <a class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                        href="{{ route('data-tgk.create', ['data_utama' => $id_PU]) }}">Tambah Data</a>
                </div>
                @csrf
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <table id="tabelData" class="table table-bordered, my-custom-table">
                    <thead>
                        <tr class="kolom">
                            <th class="" style="width: 14%;">No. Pohon</th>
                            <th class="" style="width: 15%; text-align: center;">Jenis</th>
                            <th class="" style="text-align: center;">Diameter</th>
                            <th class=""style="text-align: center;">Tinggi</th>
                            <th class=""style="text-align: center;">Diameter ²</th>
                            <th class=""style="text-align: center;">Volume</th>
                            <th class=""style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->no_pohon }}</td>
                                    @if ($da->hhbk_jenis_tgk)
                                        <td>{{ $da->hhbk_jenis_tgk }}</td>
                                    @else
                                        <td>{{ $da->hhk_jenis_tgk }}</td>
                                    @endif
                                    <td>{{ $da->diameter }} cm</td>
                                    <td>{{ $da->tinggi }} m</td>
                                    <td>{{ $da->diameter * $da->diameter }} cm²</td>
                                    <td>{{ 3.14 * ($da->diameter / 2) * ($da->diameter / 2) * $da->tinggi }} m³</td>

                                    <td class="center-align">
                                        <a class="btn btn-warning mb-1 m-l-1"
                                            href="{{ route('data-tgk.edit', $da->id_tgk) }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger mb-1 m-l-1"
                                            href="{{ route('data-tgk.destroy', $da->id_tgk) }}"
                                            data-id="{{ $da->id_tgk }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
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
            </form>
        </div>
    </div>
@endsection
