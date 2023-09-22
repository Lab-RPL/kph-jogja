@extends('layouts.main')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('rph.update', $rph->id_rph) }}" method="POST">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA RPH</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">
                    <tr>
                        <td><label for="tambah-bdh">NAMA BDH</label></td>
                        <td>
                            @foreach ($bdhs as $bdh)
                                @if ($bdh->IsDelete == 0 && $bdh->id_bdh == $rph->id_bdh)
                                    <input value=" {{ $bdh->nama_bdh }}" id="tambah-rph" type="text" name="nama_rph"
                                        readonly class="bg-secondary opacity-75">
                                @break
                            @endif
                        @endforeach


                        {{-- @foreach ($bdhs as $bdh)
                                    @if ($bdh->IsDelete == 0)
                                        <option value="{{ $bdh->id_bdh }}"
                                            {{ $bdh->id_bdh == $rph->id_bdh ? 'selected' : '' }} disabled>{{ $bdh->nama_bdh }}
                                        </option>
                                    @endif
                                @endforeach --}}

                    </td>
                </tr>
                <tr>
                    <td><label for="tambah-rph">Nama RPH</label></td>
                    <td><input type="text" id="tambah-rph" name="nama_rph" value="{{ $rph->nama_rph }}"></td>
                </tr>
                <tr>
                    <td><label for="tambah-rph">Nama Kepala RPH</label></td>
                    <td><input type="text" id="tambah-rph" name="kepala_rph" value="{{ $rph->kepala_rph }}"></td>
                </tr>
                <tr>
                    <td><label for="luas-rph">Luas RPH</label></td>
                    <td><input type="text" id="luas-rph" name="luas_rph" value="{{ $rph->luas_rph }}"></td>
                </tr>
            </table>
            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                <a class="btn btn-warning" style="color: white" href="/data-bdh" onclick="return goBack();">Kembali</a>

                <script>
                    function goBack() {
                        window.history.back();
                        return false;
                    }
                </script>
                <button class="btn btn-primary" style="color: white" type="submit">Edit Data</button>
            </div>
        </div>
    </div>
</form>
@endsection
