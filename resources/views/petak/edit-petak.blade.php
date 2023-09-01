@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('bdh.update', ['id' => $bdh->id_bdh]) }}" method="POST">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2>DATA BDH</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <input type="hidden" name="id_bdh" value="{{ $bdh->id_bdh }}">
                <table id="tabelData">
                    <tr>

                        <td><label for="tambah-bdh">NAMA BDH</label></td>
                        <td><input type="text" id="tambah-bdh" name="nama_bdh" value="{{ $bdh->nama_bdh }}"></td>
                    </tr>
                    <tr>
                        <td><label for="tambah-bdh">NAMA KEPALA BDH</label></td>
                        <td><input type="text" id="tambah-bdh" name="kepala_bdh" value="{{ $bdh->kepala_bdh }}"></td>
                    </tr>
                    <tr>
                        <td><label for="luas-tanah">LUAS TANAH</label></td>
                        <td><input type="text" id="luas-tanah" name="luas_tanah" value="{{ $bdh->luas_bdh }}"></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="/data-bdh">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Edit Data</button>
                </div>
            </div>
        </div>
    </form>
@endsection
