@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ Route('rosak.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="garis">
            <div class="border-lists">
                <h2 class="mt-2 middletext">DATA KERUSAKAN / KEHILANGAN</h2>
                <p class="undertext">Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table>
                    <tbody>
                        <style>
                            span {
                                color: white;
                            }
                        </style>

                        <tr>
                            <td>Jenis</td>
                            <td height="50px"><span>X</span>
                                <select id="jenis-rosak" name="jns_rusak" required>
                                    <option value="" disabled selected hidden>Pilih Jenis</option>
                                    <option value="0">Rusak</option>
                                    <option value="1">Hilang</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="300px">Tanggal Input</td>
                            <td height="50px"><span>X</span> <input type="date" name="tgl_input" required></td>
                        </tr>
                        <tr>
                            <td width="300px">Tanggal Kejadian</td>
                            <td height="50px"><span>X</span> <input type="date" name="tgl_rusak" required></td>
                        </tr>
                        <tr>
                            <td>Nomor PU</td>
                            <td>
                                <span>X</span>
                                <select name="id_PU" required>
                                    <option value="" disabled selected hidden>Pilih Nomor PU</option>
                                    @foreach ($data as $p)
                                        <option value="{{ $p->id_PU }}">
                                            {{ $p->no_PU }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Koordinat PU</td>
                            <td height="50px">X <input placeholder="Koordinat X" type="text" name="koor_x" required>
                            </td>
                        </tr>
                        <tr>
                            <td height="50px">Y <input placeholder="Koordinat Y" type="text" name="koor_y" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td height="50px"><span>X</span> <input type="file" name="foto"></td>
                        </tr>
                        <tr id="dimtung" style="display: none;">
                            <td>Diameter Tunggak</td>
                            <td height="50px"><span>X</span> <input type="text" name="diameter"></td>
                        </tr>
                    </tbody>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white" href="/data-rusak">Kembali</a>
                    <button class="btn btn-primary" style="color: white" type="submit">Tambah Data</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('jenis-rosak').addEventListener('change', function() {
            var hilangInput = document.getElementById('dimtung');
            if (this.value === '1') {
                hilangInput.style.display =
                    'table-row'; // Menggunakan 'table-row' untuk mengembalikan tampilan baris tabel
            } else {
                hilangInput.style.display = 'none';
            }
        });
    </script>
@endsection
