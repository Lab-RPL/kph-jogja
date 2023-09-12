@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <div class="garis">
        <div class="border-list">
            <h2>DATA PETAK
            </h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                <div class="wrapper">
                    <div class="bdh">

                    </div>
                    <div class="rph">

                    </div>
                </div>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor Petak</th>
                            <th>Luas Petak</th>
                            <th>Potensi Petak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) == 0)
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum Ada Data</td>
                            </tr>
                        @endif
                        @foreach ($data as $da)
                            <tr>
                                <td>{{ $da->nomor_ptk }}</td>
                                <td>{{ $da->luas_ptk }} Ha</td>
                                <td>{{ $da->potensi_ptk }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </form>
        </div>
    </div>
@endsection