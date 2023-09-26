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
            <h2 class="mt-2">DATA TEGAKAN</h2>
            <p class="lead">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

            <form>
                @csrf
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <table id="tabelData" class="table table-bordered, my-custom-table">
                    <thead>
                        <tr class="kolom">
                            <th class="">Jenis</th>
                            <th class="">No. Pohon</th>
                            <th class="">Diameter</th>
                            <th class="">Tinggi</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->jenis_tgk }}</td>
                                    <td>{{ $da->no_pohon }}</td>
                                    <td>{{ $da->diameter }}</td>
                                    <td>{{ $da->tinggi }}</td>
                                    <td class="center-align">
                                        <a class="btn btn-warning mb-1 m-l-1" href="">Edit</a>
                                        <a class="btn btn-danger mb-1 m-l-1"
                                            href="{{ route('data-tgk.destroy', $da->id_tgk) }}"
                                            data-id="{{ $da->id_tgk }}">Hapus</a>
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
                <div style="display: flex; justify-content: flex-end;">
                    <a class="btn btn-primary" style="color: white"
                        href="{{ route('data-tgk.create', ['data_utama' => $id_PU]) }}">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>
@endsection
