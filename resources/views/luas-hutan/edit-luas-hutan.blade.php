@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form method="POST" action="{{ route('luas-hutan.update', $luasHutan) }}">
        @csrf
        @method('PUT') <!-- Menambahkan method PUT agar server menginterpretasi request sebagai update -->
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">PENERIMAAN NEGARA BUKAN PAJAK</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <input type="hidden" >
                <input type="hidden" >
                <table id="tabelData">
                    <tr>
                        <td><label>Luas Hutan Lindung</label></td>
                        <td><input type="text" name="luas_hutan_lindung" value="{{ $luasHutan->luas_lindung }}"></td> 
                    </tr>
                    <tr>
                        <td><label>Luas Hutan Produksi</label></td>
                        <td><input type="text" name="luas_hutan_produksi" value="{{ $luasHutan->luas_produksi }}"></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="/data-luas">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Edit Data</button>
                </div>
            </div>
        </div>
    </form>
@endsection
