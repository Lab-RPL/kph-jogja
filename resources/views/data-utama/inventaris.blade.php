@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <div class="garis" style="margin-top: -8rem;">
        <div class="border-list" style="border: 1px solid white;">
            <h2 style="font-size: 20px; font-weight: bold;">KESATUAN PENGELOLAAN HUTAN (KPH)</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div style="text-align: center; margin-top: -3rem;">NOMOR PU</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div style="text-align: center; margin-top: -3rem;">TANGGAL</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div style="text-align: center; margin-top: -3rem;">KPH</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div style="text-align: center; margin-top: -3rem;">BDH</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div style="text-align: center; margin-top: -3rem;">RPH</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div style="text-align: center; margin-top: -3rem;">PETAK</div>
                            </th>
                            <th colspan="2" style="background-color: #9CC589;">
                                <div style="text-align: center;">KOORDINAT</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div style="text-align: center; margin-top: -3rem;">OPTION</div>
                            </th>
                        </tr>
                        <style>
                            th {
                                background-color: #C9EFBC
                            }
                        </style>
                        <tr>
                            <th>
                                <div style="text-align: center;">X</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Y</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div style="display: flex; justify-content: flex-end;">
                                <a class="btn btn-primary" href="#"><img src="{{ asset('images/options.jpg') }}"></a>
                            </div>
                        </td>
                    </tbody>
                </table>

                <div style="display: flex; justify-content: flex-end;">
                    <a class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                        href="/data-option">Tambah Data</a>
                </div>

            </form>
        </div>
    </div>
@endsection
