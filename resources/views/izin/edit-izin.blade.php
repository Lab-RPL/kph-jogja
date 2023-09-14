@extends('layouts.main')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('izin.update', ['id' => $izin->id_izin]) }}" method="POST">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2>Hasil Hutan Bukan Kayu</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <input type="hidden" name="id_izin" value="{{ $izin->id_izin }}">
                <table id="tabelData">
                    <tr>
                        <td><label for="nama-kel">Nama Kelompok Tani Hutan</label></td>
                        <td><input type="text" id="nama-kel" name="nama_kelompok" value="{{ $izin->nama_kelompok }}"></td>
                    </tr>
                    <tr>
                        <td><label for="nomor-sk">Nomor SK</label></td>
                        <td><input type="text" id="nomor-sk" name="no_SK" value="{{ $izin->no_SK }}"></td>
                    </tr>
                    <tr>
                        <td><label for="petak-izin">Nomor Petak</label></td>
                        <td><input type="text" id="petak-izin" name="petak_izin" value="{{ $izin->petak_izin }}"></td>
                    </tr>
                    <tr>
                        <td><label for="luas-izin">Luas Izin</label></td>
                        <td><input type="text" id="luas-izin" name="luas_izin" value="{{ $izin->luas_izin }}"></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="/data-izin">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Edit Data</button>
                </div>
            </div>
        </div>
    </form>
@endsection
