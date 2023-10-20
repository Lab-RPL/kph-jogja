@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <div class="garis">
        <div class="border-lists">
            <h2 class="mt-2 middletext">DATA KERUSAKAN / KEHILANGAN</h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <style>
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
                        <a class="nav-link active " data-bs-toggle="tab" href="#rusak">Kerusakan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#hilang">Kehilangan</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="rusak" class="container tab-pane active">
                        <div style="display: flex; justify-content: flex-start;">
                            <a class="btn btn-primary mt-4"
                                style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                                href="/tambah-rosak">Tambah Data</a>
                        </div>
                        <table id="tabelData" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">
                                        Tanggal Input</th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">
                                        Tanggal Rusak</th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">Nomor
                                        Petak</th>
                                    <th colspan="2" style="background-color: #9CC589;" class="text-center">Koordinat
                                        Rusak</th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">
                                        Keterangan
                                    </th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">Foto
                                    </th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">Aksi
                                    </th>
                                </tr>
                                <tr>
                                    <th style="background-color: #9CC589;">
                                        <div style="text-align: center">X</div>
                                    </th>
                                    <th style="background-color: #9CC589;">
                                        <div style="text-align: center;">Y</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $ros)
                                    @if ($ros->jns_rusak == 0)
                                        @if ($ros->IsDelete == 0)
                                            <tr>
                                                <td>{{ $ros->tgl_input }}</td>
                                                <td>{{ $ros->tgl_rusak }}</td>
                                                <td>{{ $ros->nomor_ptk }}</td>
                                                <td>{{ $ros->koor_x }}</td>
                                                <td>{{ $ros->koor_y }}</td>
                                                <td>{{ $ros->keterangan }}</td>
                                                <td>
                                                    <a href="#" class="open-popup"
                                                        data-src="/upload/{{ $ros->foto }}"
                                                        data-caption="Foto Kerusakan">
                                                        <img class="" style="width:100%;max-width:50px"
                                                            src="/upload/{{ $ros->foto }}" alt="Foto Kerusakan">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('rosak.edit', $ros->id_rusak) }}"
                                                        class="btn btn-warning mb-1 m-l-1 ms-2"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('rosak.destroy', $ros->id_rusak) }}"
                                                        class="btn btn-danger mb-1 m-l-1"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div id="hilang" class="container tab-pane fade">
                        <div style="display: flex; justify-content: flex-start;">
                            <a class="btn btn-primary mt-4"
                                style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                                href="/tambah-rosak">Tambah Data</a>
                        </div>
                        <table id="tabelData2" class="table table-bordered" width="915px">
                            <thead>
                                <tr>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">
                                        Tanggal Input</th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">
                                        Tanggal Kehilangan</th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">Nomor
                                        Petak</th>
                                    <th colspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">
                                        Koordinat Kehilangan</th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">
                                        Diameter Tunggak</th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">
                                        Keterangan</th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">Foto
                                    </th>
                                    <th rowspan="2" valign="middle" style="background-color: #9CC589;"
                                        class="text-center">Aksi
                                    </th>
                                </tr>
                                <tr>
                                    <th style="background-color: #9CC589;">
                                        <div style="text-align: center;">X</div>
                                    </th>
                                    <th style="background-color: #9CC589;">
                                        <div style="text-align: center;">Y</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $ros)
                                    @if ($ros->jns_rusak == 1)
                                        @if ($ros->IsDelete == 0)
                                            <tr>
                                                <td>{{ $ros->tgl_input }}</td>
                                                <td>{{ $ros->tgl_rusak }}</td>
                                                <td>{{ $ros->nomor_ptk }}</td>
                                                <td>{{ $ros->koor_x }}</td>
                                                <td>{{ $ros->koor_y }}</td>
                                                <td style="width: 30px">{{ $ros->diameter }}</td>
                                                <td>{{ $ros->keterangan }}</td>
                                                <td>
                                                    <a href="#" class="open-popup"
                                                        data-src="/upload/{{ $ros->foto }}"
                                                        data-caption="Foto Kehilangan">
                                                        <img class="" style="width:100%;max-width:50px"
                                                            src="/upload/{{ $ros->foto }}" alt="Foto Kehilangan">
                                                    </a>
                                                </td>
                                                <td style="width: 100px">
                                                    <a href="{{ route('rosak.edit', $ros->id_rusak) }}"
                                                        class="btn btn-warning mb-1 m-l-1 ms-2"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('rosak.destroy', $ros->id_rusak) }}"
                                                        data-id="{{ $ros->id_rusak }}"
                                                        class="btn btn-danger mb-1 m-l-1"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>



                <div class="popup " id="imagePopup">
                </div>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- The Close Button -->
                    <span class="close">&times;</span>

                    <!-- Modal Content (The Image) -->
                    <img class="modal-content" id="img01">

                    <!-- Modal Caption (Image Text) -->
                    <div id="caption"></div>
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
                </script>
                
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <style>
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-right: 50px;
        }

        .table-image {
            max-width: 50px;
            /* Lebar maksimum gambar */
            max-height: 100px;
            /* Tinggi maksimum gambar */
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        .active {
            transform: translateY(0);
        }

        x

        /* Style untuk tombol tutup */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Style untuk gambar dalam popup */
        .popup-img {
            max-width: 100%;
            max-height: 50px;
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

            const openPopupButtons = document.querySelectorAll('.open-popup');
            const modal = document.getElementById('myModal');
            const modalImg = document.getElementById('img01');
            const captionText = document.getElementById('caption');

            openPopupButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const imageUrl = button.getAttribute('data-src');
                    const caption = button.getAttribute('data-caption');

                    modal.style.display = 'block';
                    modalImg.src = imageUrl;
                    captionText.innerHTML = caption;
                });
            });

            // Get the <span> element that closes the modal
            const span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            };
        });
    </script>
@endsection