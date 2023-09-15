@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-list"  >
            <h2 class="mt-2">PENERIMAAN NEGARA BUKAN PAJAK</h2>
            <p class="lead">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

            <form>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr class="kolom">
                            <th class="w-25">Tahun</th> 
                            <th class="w-50">Nominal</th> 
                            <th class="">Aksi</th> 
                        </tr>
                    </thead>
                    @if (count($data) == 0)
                    <tr>
                        <td colspan="5" style="text-align: center;">Belum Ada Data</td>
                    </tr>
                @endif
                @foreach ($data as $da)
                    @if ($da->IsDelete == 0)
                        <tr>
                            <td>{{ $da->tahun_pnbp }}</td>
                            <td>{{ $da->nominal_pnbp }}</td>
                            <td style="justify-content: space-between; align-items:center">
                                {{-- <a href="{{ route('pnbp.pnbp', $da->id_pnbp) }}"
                                    class="btn btn-warning mb-1 m-l-1">Edit</a>
                                <a data-id="{{ $da->id_pnbp }}" href="{{ route('potensi.destroy', $da->id_pnbp) }}"
                                    class="btn btn-danger mb-1 m-l-2">Hapus</a> --}}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </table>
                <div style="display: flex; justify-content: flex-end;"> 
                    <a class="btn btn-primary" style="color: white" href="/tambah-pnbp">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>
@endsection
