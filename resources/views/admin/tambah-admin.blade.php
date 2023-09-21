@extends('layouts.second')
@section('conten')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('admin.store') }}" method="post">
        
        @csrf
        <div class="garis">
            <div class="border-list">
                <h2>ADMIN</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

                <table id="tabelData">
                    <tr></tr>
                    <td><label for="name">Username</label></td>
                    <td><input type="text" id="name" name="name" required></td>
                    </tr>
                    <tr>
                        <td><label for="pass">Password</label></td>
                        <td><input type="text" id="pass" name="password" required></td>
                    </tr>
                    {{-- <tr>
                        <td><label for="kon-pass">Konfirmasi Password</label></td>
                        <td><input type="text" id="kon-pass" name="kon_password" required></td>
                    </tr> --}}
                    <!-- <tr>
                                <td><label for="luas-tanah">Keterangan Lain</label></td>
                                <td><input type="text" id="luas-rph" name="luas_tanah" required></td>
                            </tr> -->
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="{{ route('admin.index') }}">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
