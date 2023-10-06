@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('petak.store_read') }}" method="post">
        @csrf
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA Petak</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">
                    <tr>
                        <td><label for="tambah-bdh">NAMA BDH</label></td>
                        <td>
                            <select name="id_bdh" id="tambah-bdh" required class="form-select">
                                <option value="">Pilih BDH</option>
                                @foreach ($bdh as $bdh)
                                    @if ($bdh->IsDelete == 0)
                                        <option value="{{ $bdh->id_bdh }}">{{ $bdh->nama_bdh }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td><label for="tambah-rph">NAMA RPH</label></td>
                        <td>
                            <select name="id_rph" id="tambah-rph" required class="form-select" disabled>
                                <option value="">Pilih RPH</option>
                                @foreach ($rph as $rph)
                                    @if ($rph->IsDelete == 0)
                                        <option value="{{ $rph->id_rph }}">{{ $rph->nama_rph }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tambah-rph">Nomor Petak</label></td>
                        <td><input type="text" id="tambah-rph" name="nomor_ptk" required></td>
                    </tr>
                    <tr>
                        <td><label for="luas-rph">Luas Petak</label></td>
                        <td><input type="text" id="luas-rph" name="luas_ptk" required></td>
                    </tr>
                    <tr>
                        <td><label for="luas-rph">Potensi</label></td>
                        <td><input type="text" id="luas-rph" name="potensi_ptk" required></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <button onclick="goBack()" class="btn btn-warning" style="color: white">Kembali</button>

                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                    <button class="btn btn-primary" style="color: white" type="submit">Tambah Data</button>
                </div>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="id_bdh"]').on('change', function() {
                var bdhID = $(this).val();
                if (bdhID) {
                    $.ajax({
                        url: '/rph/get/'+bdhID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="id_rph"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="id_rph"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="id_rph"]').empty();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
    $('select[name="id_bdh"]').on('change', function() {
        var bdhID = $(this).val();
        if (bdhID) {
            $.ajax({
                url: '/rph/get/'+bdhID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="id_rph"]').empty();
                    $('select[name="id_rph"]').prop('disabled', false); // Enable select RPH
                    $.each(data, function(key, value) {
                        $('select[name="id_rph"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="id_rph"]').empty();
            $('select[name="id_rph"]').prop('disabled', true); // Disable select RPH if no BDH selected
        }
    });
});

    </script>
@endsection
