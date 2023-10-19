@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('data-tgk.store') }}" method="post">
        @csrf
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA TEGAKAN</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">
                    
                    <tr>
                        <td>Nomor PU</td>
                        <td>
                            <select style="width: 400px;" name="id_PU" id="tambah-dataUtama" required class="form-control" disabled >
                                @foreach ($dataUtama as $dataUtama)
                                    @if ($dataUtama->IsDelete == 0)
                                        <option value="{{ $dataUtama->id_PU }}"
                                            @if ($selectedDataUtama != null && $selectedDataUtama == $dataUtama->id_PU) selected @endif>{{ $dataUtama->no_PU }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <!-- Use a hidden input to submit the selected value from the disabled select -->
                            <input type="hidden" name="id_PU" value="{{ $selectedDataUtama }}" />
                        </td>
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
                        <td><label for="jenis_tgk"> Tegakan</label></td>
                        <td>
                            <select id="jenis_tgk" name="id_tgk">

                            </select>
                        </td>
                    </tr>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script>
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
                    </script>

                    <tr>
                        <td>Nomor Pohon</td>
                        <td><input type="text" id="tambah-tegakan" name="no_pohon" required></td>
                    </tr>
                    <tr>
                        <td>Diameter</td>
                        <td><input type="text" id="tambah-tegakan" name="diameter" required></td>
                    </tr>
                    <tr>
                        <td>Tinggi</td>
                        <td><input type="text" id="tambah-tegakan" name="tinggi" required></td>
                    </tr>
                </table>

                <div style="display: flex; justify-content: space-between;" class="mt-5">
                    <button onclick="goBack()" class="btn btn-warning"
                        style="color: white; font-weight: bold;">Kembali</button>

                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                    <button class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                        type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>

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
