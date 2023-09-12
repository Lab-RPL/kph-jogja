@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('petak.update', $petak->id_ptk) }}" method="POST">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA PETAK</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">
                    <tr>
                        <td><label for="tambah-rph">NAMA RPH</label></td>
                        <td>
                            <select name="id_rph" id="tambah-rph" required class="form-select">
                                <option value="">Pilih RPH</option>
                                @foreach ($rphs as $rph)
                                    @if ($rph->IsDelete == 0)
                                        <option value="{{ $rph->id_rph }}">{{ $rph->nama_rph }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nomor-ptk">Nomor Petak</label></td>
                        <td><input type="text" id="nomor-ptk" name="nomor_ptk" value="{{ $petak->nomor_ptk }}"></td>
                    </tr>
                    <tr>
                        <td><label for="luas-ptk">Luas Petak</label></td>
                        <td><input type="text" id="luas-ptk" name="luas_ptk" value="{{ $petak->luas_ptk }}"></td>
                    </tr>
                    <tr>
                        <td><label for="potensi-ptk">Potensi Petak</label></td>
                        <td><input type="text" id="potensi-ptk" name="potensi_ptk" value="{{ $petak->potensi_ptk }}"></td>
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
