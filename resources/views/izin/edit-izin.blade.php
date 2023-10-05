@extends('layouts.main')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('izin.update', [$data->id_izin]) }}" method="POST">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2>Hasil Hutan Bukan Kayu</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <input type="hidden" name="id_izin" value="{{ $data->id_izin }}">
                <table id="tabelData">
                    <tr>
                        <td>Nama Kelompok Tani Hutan</td>
                        <td><input type="text" id="nama-kel" name="nama_kelompok" value="{{ $data->nama_kelompok }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Nomor SK</td>
                        <td><input type="text" id="nomor-sk" name="no_SK" value="{{ $data->no_SK }}"></td>
                    </tr>
                    <tr>
                        <td>Nomor Petak</td>
                        <td>
                            <select name="petak_izin" required>
                                <option value="" selected disabled hidden>Pilih Nomor Petak</option>
                                @foreach ($petak as $ptk)
                                    @if ($ptk->IsDelete == 0)
                                        @php
                                            $selected_petak = $data->id_ptk == $ptk->id_ptk ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $ptk->id_ptk }}" {{ $selected_petak }}>
                                            {{ $ptk->nomor_ptk }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Luas Izin</td>
                        <td><input type="text" id="luas-izin" name="luas_izin" value="{{ $data->luas_izin }}"></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between;" class="mt-5">
                    <a class="btn btn-warning" style="font-weight: bold; color: white" href="/data-izin">Kembali</a>
                    <button class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                        type="submit">Edit Data</button>
                </div>
            </div>
        </div>
    </form>

    <style>
        pre {
            font-weight: bold;
            font-size: 18px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
        }

        .line-table {
            border-bottom: 1px solid;
        }

        select {
            width: 200px;
            padding: 5px;
            border: 2px solid #0CB166;
            border-radius: 5px;
            font-size: 16px;
        }

        option {
            padding: 5px;
        }
    </style>
@endsection
