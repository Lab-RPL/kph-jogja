@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('petak.update', $petak->id_ptk) }}" method="POST">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA PETAK</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">
                    <tr>
                        <td><label for="tambah-rph">NAMA RPH</label></td>
                        <td>
                            @foreach ($rphs as $rph)
                                @if ($rph->IsDelete == 0 && $rph->id_rph == $petak->id_rph)
                                    <input value=" {{ $rph->nama_rph }}" id="tambah-rph" type="text" name="nama_rph"
                                        disabled>
                                    <input value="{{ $rph->id_rph }}" id="tambah-rph" type="hidden" name="id_rph">
                                @break
                            @endif
                        @endforeach
                        {{-- <select name="id_rph" id="tambah-rph" required class="form-select">
                                <option value="">Pilih RPH</option>
                                @foreach ($rphs as $rph)
                                    @if ($rph->IsDelete == 0)
                                        <option value="{{ $rph->id_rph }}">{{ $rph->nama_rph }}</option>
                                    @endif
                                @endforeach
                            </select> --}}
                    </td>
                </tr>
                <tr>
                    <td><label for="nomor-ptk">Nomor Petak</label></td>
                    <td><input type="text" id="nomor-ptk" name="nomor_ptk" value="{{ $petak->nomor_ptk }}"></td>
                </tr>
                <tr>
                    <td><label for="luas-ptk">Luas Petak</label></td>
                    <td><input type="text" id="luas-ptk" name="luas_ptk" value="{{ $petak->luas_ptk }}"></td>
                </tr>
                <tr>
                    <td><label for="potensi-ptk">Potensi Petak</label></td>
                    <td>
                        <select id="potensi-ptk" name="potensi_ptk" required>
                            <option value="" disabled hidden>Pilih Potensi</option>
                            <option value="0" {{ $petak->potensi_ptk == 0 ? 'selected' : '' }}>Hutan Kayu</option>
                            <option value="1" {{ $petak->potensi_ptk == 1 ? 'selected' : '' }}>Hutan Bukan Kayu
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="jenis_tgk">Jenis Tegakan</label></td>
                    <td>
                        <select id="jenis_tgk" name="id_tgk">
                            {{-- <input value="{{ $petak->id_hhk }}" id="edit-tgk" type="hidden" name="id_hhk">
                            <input value="{{ $petak->id_hhbk }}" id="edit-tgk" type="hidden" name="id_hhbk"> --}}
                        </select>
                    </td>
                </tr>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                {{-- <tr>
                    <td><label for="jenis_tgk">Jenis Tegakan</label></td>
                    <td>
                        <select id="jenis_tgk" name="id_tgk">
                            <option value=""></option>
                            @foreach ($petak as $jenisTgkOption)
                                <option value="{{ $jenisTgkOption->id }}"
                                    {{ $jenisTgkOption->id == $petak->id_tgk ? 'selected' : '' }}>
                                    {{ $jenisTgkOption->jenis_tgk }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr> --}}

            </table>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            {{-- <script>
                $("#potensi-ptk").change(function() {
                    var type = $(this).val();
                    var url = '{{ route('petak.getJenisTgk', ':type') }}';
                    url = url.replace(':type', type);

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            var $jenisTgk = $('#jenis_tgk');

                            $jenisTgk.empty(); // Empty current options

                            for (var i = 0; i < data.length; i++) {
                                var idValue = type == 0 ? data[i].id_hhk : data[i].id_hhbk;
                                $jenisTgk.append('<option value=' + idValue + '>' + data[i].jenis_tgk +
                                    '</option>');
                            }
                        }
                    });
                });
            </script> --}}

            <div style="display: flex; justify-content: space-between;" class="mt-4">
                <a class="btn btn-warning" style="color: white; font-weight:bold;" onclick="return goBack()">Kembali</a>
                <button class="btn btn-primary"
                    style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold"
                    type="submit">Submit</button>
            </div>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    var $jenisTgk = $('#jenis_tgk');
    
    function fetchJenisTgk(value) {
        var url = '{{ route('petak.getJenisTgk', ':value') }}';
        url = url.replace(':value', value);
        var selectedType = value === '0' ? "{{ $petak->id_hhk }}" : "{{ $petak->id_hhbk }}";

        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                console.log(data);
                $jenisTgk.empty();

                for (var i = 0; i < data.length; i++) {
                    var optionValue = value === '0' ? data[i].id_hhk : data[i].id_hhbk;
                    var optionText = data[i].jenis_tgk;
                    var selected = (optionValue == selectedType) ? 'selected' : '';

                    $jenisTgk.append('<option value="' + optionValue + '" ' + selected + ' >' + optionText + '</option>');
                }
            }
        });
    }

    $("#potensi-ptk").change(function() {
        fetchJenisTgk($(this).val());
    }).trigger('change');
});



    function goBack() {
        window.history.back();
        return false;
    }
</script>
@endsection
