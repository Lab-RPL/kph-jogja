@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('data-tgk.update', $dataTegak->id_tgk) }}" method="post">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA Tegakan</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">

                    <tr>
                        <td height="60px">Nomor PU</td>
                        <td>
                            @foreach ($utama as $utama)
                                @if ($utama->IsDelete == 0 && $utama->id_PU == $dataTegak->id_PU)
                                    <input value=" {{ $utama->no_PU }}" id="edit-tgk" type="text" name="no_PU"
                                        readonly class="bg-secondary opacity-75">
                                    <input value="{{ $utama->id_PU }}" id="edit-tgk" type="hidden" name="id_PU">
                                @break
                            @endif
                        @endforeach


                    </td>
                </tr>

                <tr>
                    <td><label for="potensi-ptk">Potensi Petak</label></td>
                    <td>
                        <select id="potensi-ptk" name="potensi_ptk" required>
                            <option value="" disabled hidden>Pilih Potensi</option>
                            <option value="0" {{ $dataTegak->potensi_ptk == 0 ? 'selected' : '' }}>Hutan Kayu
                            </option>
                            <option value="1" {{ $dataTegak->potensi_ptk == 1 ? 'selected' : '' }}>Hutan Bukan Kayu
                            </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td height="60px"><label for="jenis_tgk">Jenis Tegakan </label></td>
                    <td>
                        <select id="jenis_tgk" name="id_tgk">

                        </select>
                    </td>
                </tr>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <tr>
                    <td height="60px">Nomor Pohon</td>
                    <td>
                        <input type="text" id="tambah-tegakan" name="jenis_tgk" value="{{ $dataTegak->no_pohon }}">
                    </td>
                </tr>
                <tr>
                    <td height="60px">Diameter</td>
                    <td><input type="text" id="tambah-tegakan" name="diameter" value="{{ $dataTegak->diameter }}">
                    </td>
                </tr>
                <tr>
                    <td height="60px">Tinggi</td>
                    <td><input type="text" id="tambah-tegakan" name="tinggi" value="{{ $dataTegak->tinggi }}"></td>
                </tr>
            </table>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div style="display: flex; justify-content: space-between;" class="mt-5">
                <a class="btn btn-warning" onclick="return goBack()"
                    style="color: white; font-weight: bold;">Kembali</a>
                <button class="btn btn-primary"
                    style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                    type="submit">Submit</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        var $jenisTgk = $('#jenis_tgk');

        function fetchJenisTgk(value) {
            var url = '{{ route('data-tgk.getJenisTgk', ':value') }}';
            url = url.replace(':value', value);
            var selectedType = value === '0' ? "{{ $dataTegak->id_hhk }}" : "{{ $dataTegak->id_hhbk }}";

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

                        $jenisTgk.append('<option value="' + optionValue + '" ' + selected + ' >' +
                            optionText + '</option>');
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
<style>
    pre {
        font-weight: bold;
        font-size: 18px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 8px;
        text-align: left;
    }

    .line-table {
        border-bottom: 1px solid;
    }

    select {
        width: 200px;
        padding: 5px;
        border: 2px solid #0CB166;
        border-radius: 5px;
        font-size: 16px;
    }

    option {
        padding: 5px;
    }
</style>
@endsection
