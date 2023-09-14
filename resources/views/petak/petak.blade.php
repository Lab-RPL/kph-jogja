@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <div class="garis">
        <div class="border-list">
            <h2 class="mt-2">DATA PETAK
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
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                <div class="wrapper">
                    <div class="bdh">

                    </div>
                    <div class="rph">

                    </div>
                </div>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor Petak</th>
                            <th>Luas Petak</th>
                            <th>Potensi Petak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) == 0)
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum Ada Data</td>
                            </tr>
                        @endif
                        @foreach ($data as $da)
                            <tr>
                                <td style="text-align: center">{{ $da->nomor_ptk }}</td>
                                <td>{{ $da->luas_ptk }} Ha</td>
                                <td>{{ $da->potensi_ptk }}</td>
                                <td class="center-align">
                                    
                                    <a href="{{ route('petak.edit', $da->id_ptk) }}"class="btn btn-warning mb-1 m-l-1">Edit</a>
                                    <a href="{{ route('petak.destroy', $da->id_ptk) }}" data-id="{{ $da->id_ptk }}"
                                        class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                {{ $data->links() }}
                <div style="display: flex; justify-content: space-between;">
                    <a class="btn btn-warning" style="color: white" href="#" onclick="goBack();">Kembali</a>
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script> 
                    <a class="btn btn-primary" style="color: white" href="/tambah-petak">TambahData</a>
                </div>
            </form>
        </div>
    </div>
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
