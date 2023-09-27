@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-lists"  >
            <h2 class="mt-2 middletext">Luas Hutan</h2>
            <p class="lead undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

            <form>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr class="kolom">
                            <th class="w-50">LUAS LINDUNG</th> 
                            <th class="">LUAS PRODUKSI</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $item = $luasHutan->first();
                    @endphp
                        <tr>
                            <td>{{ $item->luas_lindung }} Ha</td>
                            <td>{{ $item->luas_produksi }} Ha</td>
                        </tr>
                    </tbody>
                </table>
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <div style="display: flex; justify-content: flex-end;">
                        <a class="btn btn-primary" style="color: white" href="{{ route('luas-hutan.edit', $item->id_luas) }}">Ubah Data</a>
                </div>
            </form>
        </div>
    </div>


        {{-- script Notif --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const pesanSukses = document.getElementById('pesan-sukses');
                if (pesanSukses) {
                    setTimeout(function() {
                        pesanSukses.style.display = 'none';
                    }, 5000);
                }
            });
        </script>
@endsection


