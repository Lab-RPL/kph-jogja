@extends('layouts.main')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<div class="garis">
    <div class="border-list">
        <h2 class="mt-2">DATA BDH</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
                @csrf
                <table id="tabelData" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>BDH</th>
                            <th>Nama Kepala BDH</th>
                            <th>Luas BDH</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $da)
                            @if ($da->IsDelete == 0)
                                <tr>
                                    <td>{{ $da->nama_bdh }}</td>
                                    <td>{{ $da->kepala_bdh }}</td>
                                    <td>{{ $da->luas_bdh }} ha</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $data->links() }} --}}
            </form>
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

        
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
