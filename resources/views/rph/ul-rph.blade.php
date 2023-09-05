@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-list">
            <h2>DATA RPH. {{-- Agar Tidak Terjadi Perulangan Hanya Ditampilkan Satu Kali --}}</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                <div class="wrapper">
                    <div class="bdh">
                       
                    </div>
                </div>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama RPH</th>
                            <th>Nama Kepala RPH</th>
                            <th>Luas RPH</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            <tr>
                                <td>{{ $da->nama_rph }}</td>
                                <td>{{ $da->kepala_rph }}</td>
                                <td>{{ $da->luas_rph }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $data->links() }} --}}
            </form>
        </div>
    </div>
@endsection
