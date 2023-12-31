@extends('layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <div class="garis">

        <style>
            div.dataTables_wrapper div.dataTables_filter {
                text-align: right;
                margin-right: 50px;
            }
        </style>
        <div class="border-lists">
            <h2 class="mt-2 middletext">DATA BDH</h2>
            <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <div style="display: flex; justify-content: flex-start;">
                <a class="btn btn-primary"
                    style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold"
                    href="{{ route('bdh.create') }}">Tambah Data</a>
            </div>
            <form>
                @csrf
                @if (Session::has('error'))
                    <div id="pesan-error" data-error="{{ Session::get('error') }}" style="display: none;"></div>
                @endif

                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <table id="tabelData" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="background-color: #9CC589;" class="text-center">BDH</th>
                            <th style="background-color: #9CC589;" class="text-center">Nama Kepala BDH</th>
                            <th style="background-color: #9CC589;" class="text-center">Luas BDH</th>
                            <th style="background-color: #9CC589;" class="text-center">RPH</th>
                            <th style="background-color: #9CC589;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->nama_bdh }}</td>
                                    <td>{{ $da->kepala_bdh }}</td>
                                    <td>{{ $da->luas_bdh }} Ha</td>
                                    <td> <a href="{{ route('rph.index', ['id_bdh' => $da->id_bdh]) }}"
                                            class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('bdh.edit', $da->id_bdh) }}" class="btn btn-warning"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a data-id="{{ $da->id_bdh }}" class="delete-btn btn btn-danger"
                                            href="{{ route('bdh.destroy', $da->id_bdh) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                {{-- {{ $data->links() }} --}}
                {{-- <div style="display: flex; justify-content: flex-end;" class="mt-4">
                    <a class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold"
                        href="{{ route('bdh.create') }}">Tambah Data</a>
                </div> --}}
            </form>
        </div>
    </div>
    {{-- CDN Dan Script DataTable --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        setTimeout(function() {
            document.getElementById('pesan-sukses').style.display = 'none';
        }, 5000);

        $('#tabelData').DataTable({
            lengthMenu: [
                [5, 10, 25, -1],
                [5, 10, 25, "All"]
            ],

            pageLength: 5 // Menampilkan 5 data per halaman
        });

        document.addEventListener('DOMContentLoaded', function() {
            const pesanSukses = document.getElementById('pesan-sukses');
            if (pesanSukses) {
                setTimeout(function() {
                    pesanSukses.style.display = 'none';
                }, 5000);
            }
        });

        document.querySelectorAll('.delete-btn').forEach(function(deleteButton) {
            deleteButton.addEventListener('click', function(event) {
                event.preventDefault();
                const id_bdh = this.dataset.id;
                const deleteUrl = this.getAttribute('href');

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

        document.addEventListener('DOMContentLoaded', function() {
            const pesanError = document.getElementById('pesan-error');
            if (pesanError) {
                Swal.fire({
                    title: 'Error!',
                    text: pesanError.dataset.error,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }

            const pesanSukses = document.getElementById('pesan-sukses');
            if (pesanSukses) {
                setTimeout(function() {
                    pesanSukses.style.display = 'none';
                }, 5000);
            }
        });
    </script>

    {{-- cdn non data tables --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
