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
                @csrf
                <div class="wrapper">
                    <div class="hhbk">
                        <h3>Hasil Hutan Kayu</h3>
                    </div>
                </div>

                <!-- tabel potensi -->

                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Jenis Tegakan</th>
                            <th>Luas Tegakan</th>
                            <th>Volume Tegakan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- tesih dummy -->
                        <tr>
                            <td>Jenis Jati</td>
                            <td>xxx</td>
                            <td>xxx</td>
                        </tr>
                        <tr>
                            <td>Jenis Kayu Putih</td>
                            <td>xxx</td>
                            <td>xxx</td>
                        </tr>
                        <tr>
                            <td>Jenis Rimba</td>
                            <td>xxx</td>
                            <td>xxx</td>
                        </tr>
                        <!-- sampek sini -->

                    </tbody>
                </table>

                <div class="wrapper">
                    <div class="hhbk">
                        <h3>Hasil Hutan Bukan Kayu</h3>
                    </div>
                </div>

                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Wisata</th>
                            <th>Lokasi Wisata</th>
                            <th>Atraksi Wisata</th>
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
                                    <td>{{ $da->nama_wisata }}</td>
                                    <td>{{ $da->lokasi_wisata }}</td>
                                    <td>{{ $da->atraksi_wisata }}</td>
                                    <td style="justify-content: space-between; align-items:center">
                                        <a href="{{ route('potensi.edit', $da->id_hhbk) }}"
                                            class="btn btn-warning mb-1 m-l-1">Edit</a>
                                        <a data-id="{{ $da->id_hhbk }}" href="{{ route('potensi.destroy', $da->id_hhbk) }}"
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
