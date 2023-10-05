@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <div class="garis">
        <div class="border-lists">
            <h2 class="mt-2 middletext">PENERIMAAN NEGARA BUKAN PAJAK</h2>
            <p class="lead undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

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
                            <th class="w-25" style="background-color: #9CC589;">Tahun</th>
                            <th class="w-50" style="background-color: #9CC589;">Nominal</th>
                            <th class="" style="background-color: #9CC589;">Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($data as $da)
                        @if ($da->IsDelete == 0)
                            <tr>
                                <td>{{ $da->tahun_pnbp }}</td>
                                <td>Rp{{ number_format($da->nominal_pnbp, 0, '.', '.') }},00</td>
                                <td style="justify-content: space-between; align-items:center">
                                    <a href="{{ route('pnbp.edit', $da->id_pnbp) }}"
                                        class="btn btn-warning mb-1 m-l-1">Edit</a>
                                    <a data-id="{{ $da->id_pnbp }}" href="{{ route('pnbp.destroy', $da->id_pnbp) }}"
                                        class="btn btn-danger mb-1 m-l-2">Hapus</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>

                {{-- {{ $data->links() }} --}}
                <div style="display: flex; justify-content: flex-end;" class="mt-4">
                    <a class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                        href="{{ route('pnbp.create') }}">Tambah Data</a>
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
