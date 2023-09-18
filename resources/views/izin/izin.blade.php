@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-lists">
            <h2 class="middletext">DATA PERIZINAN BERUSAHA</h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr class="kolom">
                            <th>Nama Kelompok Tani Hutan</th>
                            <th>Nomor SK</th>
                            <th>Petak</th>
                            <th>Luas Izin</th>
                            <th>Aksi</th>
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
                                    <td>{{ $da->nama_kelompok }}</td>
                                    <td>{{ $da->no_SK }}</td>
                                    <td>{{ $da->petak_izin }}</td>
                                    <td>{{ $da->luas_izin }} Ha</td>
                                    <td style="justify-content: space-between; align-items:center">
                                        <a href="{{ route('izin.edit', $da->id_izin) }}"
                                            class="btn btn-warning mb-1 m-l-1">Edit</a>
                                        <a data-id="{{ $da->id_izin }}" href="{{ route('izin.destroy', $da->id_izin) }}"
                                            class="btn btn-danger mb-1 m-l-2">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                {{ $data->links() }}
                <div style="display: flex; justify-content: flex-end;" class="nav-item">
                    <a class="btn btn-primary" style="color: white" href="/tambah-izin">Tambah Data</a>
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
