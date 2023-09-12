@extends('layouts.main')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('') }}" method="POST">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2>Hasil Hutan Bukan Kayu</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">
                    <tr>
                        <td><label for="nama-wis">Nama Wisata</label></td>
                        <td><input type="text" id="nama-wis" name="nama-wis" value="{{ }}"></td>
                    </tr>
                    <tr>
                        <td><label for="lokasi-wis">Lokasi Wisata</label></td>
                        <td><input type="text" id="lokasi-wis" name="lokasi_wisata" value="{{ }}"></td>
                    </tr>
                    <tr>
                        <td><label for="atraksi-wis">Atraksi Wisata</label></td>
                        <td><input type="text" id="atraksi-wis" name="atraksi_wisata" value="{{ }}"></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="/data-potensi">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Edit Data</button>
                </div>
            </div>
        </div>
    </form>
@endsection
