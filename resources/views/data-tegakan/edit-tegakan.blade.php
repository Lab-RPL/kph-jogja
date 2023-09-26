@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="" method="post">
        @csrf
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA Tegakan</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <table id="tabelData">
                    
                    <tr>
                        <td><label for="">Nomor PU</label></td>
                        <td>
                            <select></select>
                            {{-- <select name="id_bdh" id="tambah-bdh" required class="form-control" disabled>
                                @foreach ($bdh as $bdh)
                                    @if ($bdh->IsDelete == 0)
                                        <option value="{{ $bdh->id_bdh }}"
                                        @if($selectedBdh != null && $selectedBdh == $bdh->id_bdh) selected @endif
                                        >{{ $bdh->nama_bdh }}</option>
                                    @endif
                                @endforeach
                            </select> --}}
                            
                            <!-- Use a hidden input to submit the selected value from the disabled select -->
                            {{-- <input type="hidden" name="id_bdh" value="{{ $selectedBdh }}" /> --}}
                            
                            
                        </td>
                    </tr>
                    
                    <tr>
                        <td><label for="tambah-tegakan" >Jenis Tegakan</label></td>
                        <td><input type="text" id="tambah-tegakan" name="jenis_tegakan" value=""></td>
                    </tr>
                    <tr>
                        <td><label>Nomor Pohon</label></td>
                        <td><input type="text" id="tambah-tegakan" name="nomor_pohon" value=""></td>
                    </tr>
                    <tr>
                        <td><label>Diameter</label></td>
                        <td><input type="text" id="tambah-tegakan" name="diameter" value="" ></td>
                    </tr>
                    <tr>
                        <td><label>Tinggi</label></td>
                        <td><input type="text" id="tambah-tegakan" name="tinggi" value=""></td>
                    </tr>
                </table>
                
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <button onclick="goBack()" class="btn btn-warning" style="color: white">Kembali</button>

                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                    <button class="btn btn-primary" style="color: white" type="submit">Tambah Data</button>
                </div>
            </div>
        </div>
    </form>
    
    
@endsection
