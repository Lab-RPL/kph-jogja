@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('rph.store_read') }}" method="post">
        @csrf
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA RPH</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">
                    <tr>
                        <td><label for="tambah-bdh">NAMA BDH</label></td>
                        <td>
                            <select name="id_bdh" id="tambah-bdh" required class="form-select">
                                <option value="" disabled selected hidden>Pilih BDH</option>
                                @foreach ($bdh as $bdh)
                                    @if ($bdh->IsDelete == 0)
                                        <option value="{{ $bdh->id_bdh }}">{{ $bdh->nama_bdh }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tambah-rph">Nama RPH</label></td>
                        <td><input type="text" id="tambah-rph" name="nama_rph" required></td>
                    </tr>
                    <tr>
                        <td><label for="tambah-rph">Nama Kepala RPH</label></td>
                        <td><input type="text" id="tambah-rph" name="kepala_rph" required></td>
                    </tr>
                    <tr>
                        <td><label for="luas-rph">Luas RPH</label></td>
                        <td><input type="text" id="luas-rph" name="luas_rph" required></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between;" class="mt-4">
                    <a href="{{ route('rph.index2') }}" class="btn btn-warning"
                        style="color: white; font-weight:bold;">Kembali</a>
                    <a class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold"
                        type="submit">Submit</a>
                </div>
            </div>
        </div>
    </form>
@endsection
