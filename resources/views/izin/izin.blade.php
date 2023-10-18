@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <div class="garis">
        <div class="border-lists">
            <h2 class="middletext">DATA PERIZINAN BERUSAHA</h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

            <style>
                div.dataTables_wrapper div.dataTables_filter {
                    text-align: right;
                    margin-right: 50px;
                }
            </style>

            <form>
                @csrf
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr class="kolom">
                            <th style="background-color: #9CC589;" class="text-center">Nama Kelompok Tani Hutan</th>
                            <th style="background-color: #9CC589;" class="text-center">Nomor SK</th>
                            <th style="background-color: #9CC589;" class="text-center">Petak</th>
                            <th style="background-color: #9CC589;" class="text-center">Luas Izin</th>
                            <th style="background-color: #9CC589;" class="text-center">Luas Izin</th>
                            <th style="background-color: #9CC589;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->nama_kelompok }}</td>
                                    <td>{{ $da->no_SK }}</td>
                                    <td>{{ $da->nomor_ptk }}</td>
                                    <td>{{ $da->luas_izin }} Ha</td>
                                    <td>
                                        @if ($da->hhbk_jenis_tgk)
                                            {{ $da->hhbk_jenis_tgk }}
                                        @else
                                            {{ $da->hhk_jenis_tgk }}
                                        @endif
                                    </td>
                                    <td style="justify-content: space-between; align-items:center">
                                        <a href="{{ route('izin.edit', $da->id_izin) }}"
                                            class="btn btn-warning mb-1 m-l-1"><i class="fas fa-pencil-alt"></i></a>
                                        <a data-id="{{ $da->id_izin }}" href="{{ route('izin.destroy', $da->id_izin) }}"
                                            class="btn btn-danger mb-1 m-l-2"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                {{-- {{ $data->links() }} --}}
                <div style="display: flex; justify-content: flex-end;" class="nav-item mt-4">
                    <a class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                        href="/tambah-izin">Tambah Data</a>
                </div>
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

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- SweetAlert2 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


    {{-- script Notif --}}
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
