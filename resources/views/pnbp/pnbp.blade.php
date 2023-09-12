@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-list">
            <h2>PENERIIMAAN NEGARA BUKAN PAJAK</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr class="kolom">
                            <th class="w-25">Tahun</th> <!-- Adjust the width as needed -->
                            <th class="w-25">Nominal</th> <!-- Adjust the width as needed -->
                            <th class="w-25">Aksi</th> <!-- Adjust the width as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <td>xxxx</td>
                        <td>xxxx</td>
                        <td  style="justify-content: space-between; align-items:center">
                            <a href="" class="btn btn-danger mb-1 m-l-1">Hapus</a>
                            <a href="" class="btn btn-warning mb-1 m-l-2">Edit</a>
                        </td>
                    </tbody>
                </table>
                <div style="display: flex; justify-content: space-between;">
                    <a class="btn btn-primary" style="color: white" href="/tambah-pajak">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>
@endsection
