@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <div class="garis">
        <div class="border-lists">
            <h2 class="middletext">POTENSI HASIL HUTAN</h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>


            {{-- <div class="form-group">
                <select class="form-control" id="tableSelect">
                    <option value="hasil-hutan-kayu">Hasil Hutan Kayu</option>
                    <option value="hasil-hutan-bukan-kayu">Hasil Hutan Bukan Kayu</option>
                </select>
            </div> --}}



            <style>
                div.dataTables_wrapper div.dataTables_filter {
                    text-align: right;
                    margin-right: 50px;
                }

                
                .nav-tabs .nav-item .nav-link {
                    background-color: #F5F5F5;
                    color: #000;
                }

                .nav-tabs .nav-item .nav-link.active {
                    color: #000000;
                    background-color: #CDFAD5;
                }

                .tab-content {
                    border: 1px solid #dee2e6;
                    border-top: transparent;
                    padding: 15px;
                }

                .tab-content .tab-pane {
                    background-color: #FFF;
                    min-height: 200px;
                    height: auto;
                }
            </style>

            <form>

                @csrf
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active " data-bs-toggle="tab" href="#hhk">Hasil Hutan Kayu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#hhbk">Hasil Hutan Bukan Kayu</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="hhk" class="container tab-pane active">
                        <div id="wrapper-hasil-hutan-kayu">
                            {{-- <div class="wrapper">
                                <div class="hhbk">
                                    <h3>Hasil Hutan Kayu</h3>
                                </div>
                            </div> --}}
                            <div style="display: flex; justify-content: flex-start;" class="nav-item mt-4">
                                <a class="btn btn-primary"
                                    style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                                    href="{{ route('potensi.create_hhk') }}">Tambah Data</a>
                            </div>
                            <!-- tabel potensi -->

                            <table id="tabelData" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color: #9CC589;" class="text-center">Jenis Tegakan</th>
                                        <th style="background-color: #9CC589;" class="text-center">Faktor Koreksi</th>
                                        <th style="background-color: #9CC589;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data1 as $da)
                                        @if ($da->IsDelete == 0)
                                            <tr>
                                                <td>{{ $da->jenis_tgk }}</td>
                                                <td>{{ $da->koreksi }}</td>
                                                <td style="justify-content: space-between; align-items:center">
                                                    <a href="{{ route('potensi.edit_hhk', $da->id_hhk) }}"
                                                        class="btn btn-warning mb-1 m-l-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('potensi.destroy_hhk', ['id_hhk' => $da->id_hhk]) }}"
                                                        class="btn btn-danger mb-1 m-l-2">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div id="hhbk" class="container tab-pane fade">
                        <div id="wrapper-hasil-hutan-bukan-kayu">
                            {{-- <div class="wrapper">
                                <div class="hhbk">
                                    <h3>Hasil Hutan Bukan Kayu</h3>
                                </div>
                            </div> --}}
                            <div style="display: flex; justify-content: flex-start;" class="nav-item mt-4">
                                <a class="btn btn-primary"
                                    style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                                    href="{{ route('potensi.create_hhbk') }}">Tambah Data</a>
                            </div>
                            <table id="tabelData2" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color: #9CC589;" class="text-center">Jenis Tegakan</th>
                                        <th style="background-color: #9CC589;" class="text-center">Faktor Koreksi</th>
                                        <th style="background-color: #9CC589;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $da)
                                        @if ($da->IsDelete == 0)
                                            <tr>
                                                <td>{{ $da->jenis_tgk }}</td>
                                                <td>{{ $da->koreksi }}</td>
                                                <td style="justify-content: space-between; align-items:center">
                                                    <a href="{{ route('potensi.edit_hhbk', $da->id_hhbk) }}"
                                                        class="btn btn-warning mb-1 m-l-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('potensi.destroy_hhbk', ['id_hhbk' => $da->id_hhbk]) }}"
                                                        class="btn btn-danger mb-1 m-l-2">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $('#tabelData').DataTable({
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],

                pageLength: 5 // Menampilkan 5 data per halaman
            });
            $('#tabelData2').DataTable({
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],

                pageLength: 5 // Menampilkan 5 data per halaman
            });

            // document.getElementById('tableSelect').addEventListener('change', function() {
            //     var tableKayu = document.getElementById('wrapper-hasil-hutan-kayu');
            //     var tableBukanKayu = document.getElementById('wrapper-hasil-hutan-bukan-kayu');
            //     if (this.value === 'hasil-hutan-kayu') {
            //         tableKayu.style.display = 'block';
            //         tableBukanKayu.style.display = 'none';
            //     } else {
            //         tableBukanKayu.style.display = 'block';
            //         tableKayu.style.display = 'none';
            //     }
            // });
        </script>
        </form>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- SweetAlert2 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


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
