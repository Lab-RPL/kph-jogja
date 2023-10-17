@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('rosak.update', $rosak->id_rusak) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

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
                                    <option value="" disabled hidden>Pilih Jenis</option>
                                    <option value="0" {{ $rosak->jns_rusak == 0 ? 'selected' : '' }}>Rusak</option>
                                    <option value="1" {{ $rosak->jns_rusak == 1 ? 'selected' : '' }}>Hilang</option>
                                </select>
                                
                            </td>
                        </tr>

                        <tr>
                            <td width="300px">Tanggal Input</td>
                            <td height="50px"><span>X</span> <input type="date" name="tgl_input"
                                    value="{{ $rosak->tgl_input }}"></td>
                        </tr>
                        <tr>
                            <td width="300px">Tanggal Kejadian</td>
                            <td height="50px"><span>X</span> <input type="date" name="tgl_rusak"
                                    value="{{ $rosak->tgl_rusak }}"></td>
                        </tr>

                        <tr>
                            <td>Nomor PU</td>
                            <td>
                                <span>X</span>
                                <select name="id_PU" required>
                                    <option value="" disabled selected hidden>Pilih Nomor PU</option>
                                    @foreach ($data_utama as $p)
                                        @if ($p->IsDelete == 0)
                                            @php
                                                $selected_pu = $rosak->id_PU ? 'selected' :'';
                                            @endphp
                                            <option value="{{ $p->id_PU }}" {{ $selected_pu }}>{{ $p->no_PU }}
                                            </option>
                                        @endif
                                    @endforeach



                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td rowspan="2">Koordinat PU</td>
                            <td height="50px">X <input placeholder="Koordinat X" type="text" name="koor_x"
                                    value="{{ $rosak->koor_x }}">
                            </td>
                        </tr>
                        <tr>
                            <td height="50px">Y <input placeholder="Koordinat Y" type="text" name="koor_y"
                                    value="{{ $rosak->koor_y }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td height="50px"><span>X</span> <input type="text" name="keterangan" value="{{$rosak->keterangan}}"></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td height="50px"><span>X</span> <input type="file" name="foto"
                                    value="{{ $rosak->foto }}"></td>
                        </tr>
                        <tr id="dimtung" style="display: none;">
                            <td>Diameter Tunggak</td>
                            <td height="50px"><span>X</span> <input type="text" name="diameter"
                                    value="{{ $rosak->diameter }}"></td>
                        </tr>

                    </tbody>
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <a class="btn btn-warning" style="color: white;font-weight:bolder" href="/data-rusak">Kembali</a>
                    <button class="btn btn-primary" style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold type="submit">Tambah Data</button>
                </div>
            </div>
        </div>
    </form>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script>
    document.getElementById('jenis-rosak').addEventListener('change', function() {
        var hilangInput = document.getElementById('dimtung');
        if (this.value === '1') {
            hilangInput.style.display = 'table-row'; // Menampilkan elemen 'dimtung' jika jenis adalah 'Hilang'
        } else {
            hilangInput.style.display = 'none'; // Menyembunyikan elemen 'dimtung' jika jenis adalah 'Rusak' atau tidak dipilih
        }
    });

    // Panggil event change saat halaman dimuat untuk menentukan apakah 'dimtung' harus ditampilkan
    document.addEventListener('DOMContentLoaded', function() {
        var hilangInput = document.getElementById('dimtung');
        var jenisRosak = document.getElementById('jenis-rosak');

        if (jenisRosak.value === '1') {
            hilangInput.style.display = 'table-row'; // Menampilkan elemen 'dimtung' jika jenis awalnya adalah 'Hilang'
        }
    });
</script>

@endsection
