@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('data-tgk.update', $dataTegak->id_tgk) }}" method="post">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA Tegakan</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">

                    <tr>
                        <td>Nomor PU</td>
                        <td>
                            @foreach ($utama as $utama)
                                @if ($utama->IsDelete == 0 && $utama->id_PU == $dataTegak->id_PU)
                                    <input value=" {{ $utama->no_PU }}" id="edit-tgk" type="text" name="no_PU"
                                        readonly class="bg-secondary opacity-75">
                                    <input value="{{ $utama->id_PU }}" id="edit-tgk" type="hidden" name="id_PU">
                                @break
                            @endif
                        @endforeach


                    </td>
                </tr>

                <tr>
                    <td>Jenis Tegakan</td>
                    <td><input type="text" id="tambah-tegakan" name="jenis_tgk" value="{{ $dataTegak->jenis_tgk }}">
                    </td>
                </tr>
                <tr>
                    <td>Nomor Pohon</td>
                    <td><input type="text" id="tambah-tegakan" name="no_pohon" value="{{ $dataTegak->no_pohon }}">
                    </td>
                </tr>
                <tr>
                    <td>Diameter</td>
                    <td><input type="text" id="tambah-tegakan" name="diameter" value="{{ $dataTegak->diameter }}">
                    </td>
                </tr>
                <tr>
                    <td>Tinggi</td>
                    <td><input type="text" id="tambah-tegakan" name="tinggi" value="{{ $dataTegak->tinggi }}"></td>
                </tr>
            </table>

            <div style="display: flex; justify-content: space-between;" class="mt-5">
                <button onclick="goBack()" class="btn btn-warning"
                    style="color: white; font-weight: bold;">Kembali</button>

                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
                <button class="btn btn-primary"
                    style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                    type="submit">Submit</button>
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
