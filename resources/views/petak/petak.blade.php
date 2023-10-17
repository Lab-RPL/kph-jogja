@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <style>
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-right: 50px;
        }
    </style>
    <div class="garis">
        <div class="border-lists">
            <h2 class="mt-2 middletext">DATA PETAK
                <?php
                $previous_rph_name = '';
                ?>
                @foreach ($ptk_data as $item)
                    <?php
                    $current_rph_name = $item->rph->nama_rph;
                    ?>
                    @if ($current_rph_name != $previous_rph_name)
                        {{ $current_rph_name }}
                    @endif
                    <?php
                    $previous_rph_name = $current_rph_name;
                    ?>
                @endforeach
            </h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                <div class="wrapper">
                    <div class="bdh">

                    </div>
                    <div class="rph">

                    </div>
                </div>

                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <table id="tabelData" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="background-color: #9CC589;" class="text-center">Nomor Petak</th>
                            <th style="background-color: #9CC589;" class="text-center">Luas Petak</th>
                            <th style="background-color: #9CC589;" class="text-center">Potensi Petak</th>
                            <th style="background-color: #9CC589;" class="text-center">Jenis Tegak</th>
                            <th style="background-color: #9CC589;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            <tr>
                                <td style="text-align: center">{{ $da->nomor_ptk }}</td>
                                <td>{{ $da->luas_ptk }} Ha</td>
                                <td>
                                    @if($da->potensi_ptk == 0)
                                        Hutan Kayu
                                    @elseif($da->potensi_ptk == 1)
                                         Hutan Bukan Kayu
                                    @else
                                        Data Tidak Tersedia
                                    @endif
                                </td>
                                                                @if ($da->hhbk_jenis_tgk)
                                    <td>{{ $da->hhbk_jenis_tgk }}</td>
                                @else
                                    <td>{{ $da->hhk_jenis_tgk }}</td>
                                @endif

                                <td class="center-align">

                                    <a href="{{ route('petak.edit', $da->id_ptk) }}"class="btn btn-warning mb-1 m-l-1"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('petak.destroy', $da->id_ptk) }}" data-id="{{ $da->id_ptk }}"
                                        class="btn btn-danger mb-1 m-l-1"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- {{ $data->links() }} --}}
                <div style="display: flex; justify-content: space-between;" class="mt-4">
                    <a class="btn btn-warning" style="color: white" onclick="goBack();">Kembali</a>
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                    <a class="btn btn-primary" style="color: white"
                        href="{{ route('petak.create', ['rph' => $id_rph]) }}">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>
    {{-- CDN Dan Script DataTable --}}
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
