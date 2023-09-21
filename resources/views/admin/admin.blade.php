@extends('layouts.second')
@section('conten')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <style>
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-right: 50px;
        }
    </style>

    <div class="garis">
        <div class="border-list">
            <h2>DATA ADMIN</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                @csrf
                <table id="tabelData" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th valign="middle">Username</th>
                            <th valign="middle">Tipe User</th>
                            <th valign="middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) == 0)
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum Ada Data</td>
                            </tr>
                        @endif
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->name }}</td>
                                    <td>{{ $da->user_type }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit', $da->id) }}" class="btn btn-warning mb-1 m-l-1">Ganti Password / Username</a>
                                        <a data-id="{{ $da->id }}" href="{{ route('admin.destroy', $da->id) }}"
                                            class="btn btn-danger mb-1 m-l-2">Hapus</a>
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
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <div style="display: flex; justify-content: flex-end;" class="nav-item mt-4">
                    <a class="btn btn-primary" style="color: white" href="{{ route('admin.create') }}">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        setTimeout(function() {
            document.getElementById('pesan-sukses').style.display = 'none';
        }, 5000); // 5000 milidetik = 5 detik
    </script>


@endsection
