@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <div class="garis">
        <div class="border-list">
            <h2>DATA BDH</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>BDH</th>
                            <th>Nama Kepala BDH</th>
                            <th>Luas BDH</th>
                            <th>RPH</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->nama_bdh }}</td>
                                    <td>{{ $da->kepala_bdh }}</td>
                                    <td>{{ $da->luas_bdh }} ha</td>
                                    <td> <a href="{{ route('rph.index', ['id_bdh' => $da->id_bdh]) }}" class="btn btn-success">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('bdh.edit', $da->id_bdh) }}" class="btn btn-warning">Edit</a>
                                        <a data-id="{{ $da->id_bdh }}" class="delete-btn btn btn-danger" href="{{ route('bdh.destroy', $da->id_bdh) }}">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
                <div style="display: flex; justify-content: flex-end;">
                    <a class="btn btn-primary me-3" href="/tambah-bdh">Tambah Data</a>
                </div>
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                <script>
                    setTimeout(function() {
                        document.getElementById('pesan-sukses').style.display = 'none';
                    }, 5000); // 5000 milidetik = 5 detik
                </script>
            </form>
        </div>
    </div>
    <script>
        document.querySelectorAll('.delete-btn').forEach(function (deleteButton) {
            deleteButton.addEventListener('click', function (event) {
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
    </script>

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