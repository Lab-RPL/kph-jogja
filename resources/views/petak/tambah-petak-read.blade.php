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
                        <td><label for="potensi-ptk">Potensi Petak</label></td>
                        <td>
                            <select id="potensi-ptk" name="potensi_ptk" required>
                                <option value=""disabled selected hidden>Pilih Potensi</option>
                                <option value="0">Hutan Kayu</option>
                                <option value="1">Hutan Bukan Kayu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="jenis_tgk">Jenis Tegakan</label></td>
                        <td>
                            <select id="jenis_tgk" name="id_tgk">
                            </select>
                        </td>
                    </tr>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                </table>
                <div style="display: flex; justify-content: space-between;" class="mt-4">
                    <a href="{{ route('petak.index2') }}" class="btn btn-warning" style="color: white; font-weight:bold;">Kembali</a>
                    <a class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold"
                        type="submit">Submit</a>
                </div>
            </div>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#potensi-ptk").change(function() {
            var type = $(this).val();
            var url = '{{ route('petak.getJenisTgk', ':type') }}';
            url = url.replace(':type', type);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    var $jenisTgk = $('#jenis_tgk');
                    $jenisTgk.empty(); // Kosongkan opsi saat ini

                    for (var i = 0; i < data.length; i++) {
                        if (type === '0') {
                            $jenisTgk.append('<option value=' + data[i].id_hhk + '>' + data[i]
                                .jenis_tgk + '</option>');
                        } else if (type === '1') {
                            $jenisTgk.append('<option value=' + data[i].id_hhbk + '>' + data[i]
                                .jenis_tgk + '</option>');
                        }
                    }
                }
            });
        });

        $(document).ready(function() {
            $('select[name="id_bdh"]').on('change', function() {
                var bdhID = $(this).val();
                if (bdhID) {
                    $.ajax({
                        url: '/rph/get/' + bdhID,
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

        $(document).ready(function() {
            $('select[name="id_bdh"]').on('change', function() {
                var bdhID = $(this).val();
                if (bdhID) {
                    $.ajax({
                        url: '/rph/get/' + bdhID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="id_rph"]').empty();
                            $('select[name="id_rph"]').prop('disabled',
                                false); // Enable select RPH
                            $.each(data, function(key, value) {
                                $('select[name="id_rph"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="id_rph"]').empty();
                    $('select[name="id_rph"]').prop('disabled',
                        true); // Disable select RPH if no BDH selected
                }
            });
        });
    </script>
@endsection
