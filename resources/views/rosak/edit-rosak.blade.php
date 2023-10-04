@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('admin.update', $data->id_rusak) }}" method="post">
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
                                <input type="text" id="jenis-rosak" name="jenis_rusak" value="{{ $rosak->jns_rusak == 0 ? 'Rusak' : 'Hilang' }}" readonly >
                            </td>   
                        </tr>

                        <tr>
                            <td width="300px">Tanggal Input</td>
                            <td height="50px"><span>X</span> <input type="date" name="tgl_input" value="{{ $rosak->tgl_input  }}"></td>
                        </tr>
                        <tr>
                            <td width="300px">Tanggal Kejadian</td>
                            <td height="50px"><span>X</span> <input type="date" name="tgl_rusak" value="{{ $rosak->tgl_rusak }}"></td>
                        </tr>
                        
                        {{-- <tr>
                            <td>Nomor PU</td>
                            <td>
                                <span>X</span>
                                <select name="id_PU">
                                    @foreach ($rosak as $pu)
                                        @if ($pu->IsDelete == 0)
                                            @php
                                                $selected_petak = $data->id_PU == $ptk->id_PU ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $pu->id_PU }}" {{ $selected_petak }}>
                                                {{ $pu->no_PU }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr> --}}

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
                            <td>Foto</td>
                            <td height="50px"><span>X</span> <input type="file" name="foto" value="{{ $rosak->foto }}"></td>
                        </tr>
                        <tr id="dimtung" style="display: none;">
                            <td>Diameter Tunggak</td>
                            <td height="50px"><span>X</span> <input type="text" name="diameter" value="{{ $rosak->diameter }}"></td>
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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check value of "jenis-rosak" input
            var jenisRusakValue = $('#jenis-rosak').val();
            // If the value is 'Hilang', show the "dimtung" row
            if (jenisRusakValue == 'Hilang') {
                $('#dimtung').show();
            } else {
                // Otherwise hide it
                $('#dimtung').hide();
            }
        });
    </script>
    
@endsection
