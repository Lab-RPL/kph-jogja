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
                            <select name="id_PU" id="tambah-dataUtama" required class="form-control" disabled >
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
                        <td >Jenis Tegakan</td>
                        <td><input type="text" id="tambah-tegakan" name="jenis_tgk" required></td>
                    </tr>
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
