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
            <h2 class="mt-4 middletext">DATA RPH{{-- Agar Tidak Terjadi Perulangan Hanya Ditampilkan Satu Kali --}}
                <?php
                $previous_bdh_name = '';
                ?>
                @foreach ($rph_data as $item)
                    <?php
                    $current_bdh_name = $item->bdh->nama_bdh;
                    ?>
                    @if ($current_bdh_name != $previous_bdh_name)
                        {{ $current_bdh_name }}
                    @endif
                    <?php
                    $previous_bdh_name = $current_bdh_name;
                    ?>
                @endforeach
            </h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                <div class="wrapper">
                    <div class="bdh">

                    </div>
                </div>
                @csrf
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="background-color: #9CC589;">Nama RPH</th>
                            <th style="background-color: #9CC589;">Nama Kepala RPH</th>
                            <th style="background-color: #9CC589;">Luas RPH</th>
                            <th style="background-color: #9CC589;">Petak</th>
                            <th style="background-color: #9CC589;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->nama_rph }}</td>
                                    <td>{{ $da->kepala_rph }}</td>
                                    <td>{{ $da->luas_rph }} Ha</td>
                                    <td><a href="{{ route('petak.index', ['id_rph' => $da->id_rph]) }}"
                                            class="btn btn-success">Lihat</a></td>
                                    <td class="center-align">
                                        <a href="{{ route('rph.edit', $da->id_rph) }}"
                                            class="btn btn-warning mb-1 m-l-1">Edit</a>
                                        <a href="{{ route('rph.destroy', $da->id_rph) }}" data-id="{{ $da->id_rph }}"
                                            class="btn btn-danger mb-1 m-l-1 delete-btn">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
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

                {{-- {{ $data->links() }} --}}
                <div style="display: flex; justify-content: space-between;" class="mt-4">
                    <a class="btn btn-warning mt-3" style="color: white" href="/data-bdh">Kembali</a>
                    <!-- Redirect ke halaman tambah dengan query "bdh" (Cth: ?bdh=1) -->
                    <a class="btn btn-primary mt-3" style="color: white"
                        href="{{ route('rph.create', ['bdh' => $id_bdh]) }}">Tambah Data</a>
                </div>
            </form>
        </div>
    </div>
    {{-- <!-- <script>
        document.querySelectorAll('.delete-btn').forEach(function (deleteButton) {
            deleteButton.addEventListener('click', function (event) {
                event.preventDefault();
                const id_bdh = this.dataset.id;
                const deleteUrl = '{{ route("rph.destroy", $da->id_rph) }}';
    
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Buat elemen form dengan CSRF-token dan metode DELETE
                        const deleteForm = document.createElement('form');
                        deleteForm.method = 'GET';
                        deleteForm.action = deleteUrl;
    
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                        const csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = '_token';
                        csrfInput.value = csrfToken;
                        deleteForm.appendChild(csrfInput);
    
                        const deleteMethodInput = document.createElement('input');
                        deleteMethodInput.type = 'hidden';
                        deleteMethodInput.name = '_method';
                        deleteMethodInput.value = 'DELETE';
                        deleteForm.appendChild(deleteMethodInput);
    
                        // Tambahkan form ke DOM dan kirim form untuk menghapus entri
                        document.body.appendChild(deleteForm);
                        deleteForm.submit();
                    }
                });
            });
        });
    </script> --> --}}
    {{-- CDN BS5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
