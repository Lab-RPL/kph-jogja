@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    {{-- Style search datatable --}}
    <style>
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-right: 50px;
        }
    </style>
    <div class="garis">
        <div class="border-lists">
            <h2 class="middletext" class="mt-2">DATA PETAK UKUR</h2>

            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                @csrf

                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif

                <table id="tabelData" class="table table-bordered">
                    <div style="display: flex;">
                        <a class="btn btn-primary mt-2"
                            style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                            href="{{ route('data-utama.create') }}">Tambah Data</a> {{--  sementara --}}
                    </div>
                    <thead>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div class="sub-table-inventaris">NO.PU</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div class="sub-table-inventaris ">TANGGAL</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div class="sub-table-inventaris">BDH</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div class="sub-table-inventaris">RPH</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div class="sub-table-inventaris">PETAK</div>
                            </th>
                            <th colspan="2" style="background-color: #9CC589;">
                                <div class="text-center" style="font-size: 13px;">KOORDINAT</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div class="sub-table-inventaris">DATA TEGAK</div>
                            </th>
                            <th rowspan="2" style="background-color: #9CC589;">
                                <div class="sub-table-inventaris">OPTION</div>
                            </th>

                        </tr>
                        <style>
                            table {
                                border-radius: 200px;
                            }

                            th {
                                background-color: #C9EFBC
                            }

                            .txt {
                                text-align: center;
                                margin-top: 0.5rem;
                            }
                        </style>
                        <tr>
                            <th style="background-color: #9CC589;">
                                <div class="text-center">X</div>
                            </th>
                            <th style="background-color: #9CC589;">
                                <div class="text-center">Y</div>
                            </th>
                        </tr>
                    </thead>

                    @foreach ($data as $da)
                        <tr>
                            {{-- @if (count($data) == 0)
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum Ada Data</td>
                            </tr>
                        @endif --}}

                            <td>
                                <div class="txt">{{ $da->no_PU }}</div>
                            </td>
                            <td>
                                <div class="txt">{{ $da->tanggal }}</div>
                            </td>
                            <td>
                                <div class="txt">{{ $da->nama_bdh }}</div>
                            </td>
                            <td>
                                <div class="txt">{{ $da->nama_rph }}</div>
                            </td>
                            <td>
                                <div class="txt">{{ $da->nomor_ptk }}</div>
                            </td>
                            <td>
                                <div class="txt">{{ $da->koor_x }}</div>
                            </td>
                            <td>
                                <div class="txt">{{ $da->koor_y }}</div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-primary" href="{{ route('data-tgk.index', ['id_PU' => $da->id_PU]) }}"><i class="fas fa-eye"></i></a>
                                </div>
                            </td>
                            <td>
                                <div class="container">
                                    <div class="container">
                                        <div class="text-center">
                                            <div class="button-container">
                                                {{-- <a class="btn btn-info" href="{{ route('data-utama.detail',['id_PU' => $da->id_PU]) }}">
                                                    <i class="fa fa-info-circle"></i>
                                                </a>
                                                <div class="additional-buttons above mt-1">
                                                    <a class="btn btn-warning" href="{{route('data-utama.edit',['id_PU'=> $da->id_PU])}}"><i class="fas fa-pencil-alt"></i></a>
                                                    
                                                </div>
                                                <div class="additional-buttons below mt-1">
                                                    <a data-id="{{ $da->id_PU }}" class="btn btn-danger" href="{{ route('data-utama.destroy', $da->id_PU) }}"><i class="fa fa-trash"></i></a>
                                                   
                                                </div> --}}

                                                <span style="background-color: #16349d" class="form-control action toggleButton"><i style="color: white;" class="fa fa-arrow-down"></i></span>
                                                <div class="buttonContainer" style="display: none;">
                                                    <a id="button1" class="btn btn-primary mt-1" href="{{ route('data-utama.detail',['id_PU' => $da->id_PU]) }}"><i class="fa fa-info-circle"></i></a>
                                                    <a id="button2" class="btn btn-warning mt-1" href="{{route('data-utama.edit',['id_PU'=> $da->id_PU])}}"><i class="fas fa-pencil-alt"></i></a>
                                                    <a id="button3" class="btn btn-danger mt-1" data-id="{{ $da->id_PU }}" href="{{ route('data-utama.destroy', $da->id_PU) }}"><i class="fa fa-trash"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <style>
        .action{
            cursor: pointer;
        }
    </style>
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
    </script>
    <script>
            const toggleButtons = document.querySelectorAll(".toggleButton");

            toggleButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const buttonContainer = this.nextElementSibling;
                    if (buttonContainer.style.display === "none" || buttonContainer.style.display === "") {
                        buttonContainer.style.display = "block";
                    } else {
                        buttonContainer.style.display = "none";
                    }
                });
            });

    </script>
     <style>
        .button-container {
            margin-top: 1.9rem;
            margin-left: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .additional-buttons {
            display: none;
            left: 0;
            top: -45px; 
            bottom: -45px; 
        }

        .button-container:hover .additional-buttons {
            display: block;
        }

        .additional-buttons.above {
            top: -75px;
            bottom: auto;
        }

        .button-container:hover .additional-buttons.above {
            top: -37px;
            transition: 0.5s;
        }

        .additional-buttons.below {
            top: auto;
            bottom: -75px;
        }

        .button-container:hover .additional-buttons.below {
            bottom: -37px;
            transition: 0.5s;
        }

    </style>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
