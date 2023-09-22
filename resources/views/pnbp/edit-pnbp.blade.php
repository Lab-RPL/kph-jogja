@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('pnbp.update', ['id' => $pnbp->id_pnbp]) }}" method="POST">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">PENERIMAAN NEGARA BUKAN PAJAK</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <input type="hidden" name="id_bdh" value="{{ $pnbp->id_pnbp }}">
                <input type="hidden" name="id_pnbp">
                <table id="tabelData">
                    <tr>
                        <td><label for="tambah-pnbp">Tahun</label></td>
                        <td><input type="text" id="tambah-pnbp" name="tahun_pnbp" value="{{ $pnbp->tahun_pnbp }}"></td>
                        {{-- <td><input type="text" id="tambah-pnbp" name="tahun_pnbp"></td> --}}
                    </tr>
                    <tr>
                        <td><label for="tambah-pnbp">Nominal</label></td>
                        <td><input type="text" id="tambah-pnbp" name="nominal_pnbp" value="Rp{{ number_format($pnbp->nominal_pnbp, 0, '.', '.') }},00"></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="/data-pnbp">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Edit Data</button>
                </div>
            </div>
        </div>
    </form>
@endsection
