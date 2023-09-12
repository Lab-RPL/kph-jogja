@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="garis">
        <div class="border-list">
            <h2 class="mt-4">DATA RPH{{-- Agar Tidak Terjadi Perulangan Hanya Ditampilkan Satu Kali --}}
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
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                <div class="wrapper">
                    <div class="bdh">

                    </div>
                </div>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama RPH</th>
                            <th>Nama Kepala RPH</th>
                            <th>Luas RPH</th>
                            <th>Petak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                        @if (count($data) == 0)
                            <tr>
                                <td colspan="5" style="text-align: center">Belum Ada Data</td>
                            </tr>
                        @endif
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->nama_rph }}</td>
                                    <td>{{ $da->kepala_rph }}</td>
                                    <td>{{ $da->luas_rph }} Ha</td>
                                    <td><a href="{{ route('petak.index', ['id_rph' => $da->id_rph]) }}"
                                            class="btn btn-success">Lihat</a></td>
                                    <td class="center-align">
                                        <a href="{{ route('rph.edit', $da->id_rph) }}" class="btn btn-warning mb-1 m-l-1">Edit</a>
                                        <a href="{{ route('rph.destroy', $da->id_rph) }}" data-id="{{ $da->id_rph }}"
                                            class="btn btn-danger mb-1 m-l-1 delete-btn">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                @if (Session::has('pesan'))
                    <div id="pesan-sukses" class="alert alert-success mt-4">{{ Session::get('pesan') }}</div>
                @endif
                {{ $data->links() }}
                <div style="display: flex; justify-content: space-between;">
                    <a class="btn btn-warning" style="color: white" href="/data-bdh">Kembali</a>
                    <a class="btn btn-primary" style="color: white" href="/tambah-rph">Tambah Data</a>
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
