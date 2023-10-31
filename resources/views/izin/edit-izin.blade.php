@extends('layouts.main')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('izin.update', [$data->id_izin]) }}" method="POST">
        @csrf
        @method('put')
        <div class="garis">
            <div class="border-list">
                <h2>Hasil Hutan Bukan Kayu</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
                <input type="hidden" name="id_izin" value="{{ $data->id_izin }}">
                <table id="tabelData">
                    <tr>
                        <td height="60px">Nama Kelompok Tani Hutan</td>
                        <td><input type="text" id="nama-kel" name="nama_kelompok" value="{{ $data->nama_kelompok }}">
                        </td>
                    </tr>
                    <tr>
                        <td height="60px">Nomor SK</td>
                        <td><input type="text" id="nomor-sk" name="no_SK" value="{{ $data->no_SK }}"></td>
                    </tr>
                    <tr>
                        <td height="60px">Nomor Petak</td>
                        <td>
                            <select name="petak_izin" required>
                                <option value="" selected disabled hidden>Pilih Nomor Petak</option>
                                @foreach ($petak as $ptk)
                                    @if ($ptk->IsDelete == 0)
                                        @php
                                            $selected_petak = $data->id_ptk == $ptk->id_ptk ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $ptk->id_ptk }}" {{ $selected_petak }}>
                                            {{ $ptk->nomor_ptk }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Tegakan</td>
                        <td>
                            <select name="jenis_tgk" id="jenis_tgk">


                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td height="60px">Luas Izin</td>
                        <td><input type="text" id="luas-izin" name="luas_izin" value="{{ $data->luas_izin }}"></td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: space-between;" class="mt-5">
                    <a class="btn btn-warning" style="font-weight: bold; color: white" href="/data-izin">Kembali</a>
                    <button class="btn btn-primary" style="color: #ffffff; font-weight: bold;" type="submit">Edit
                        Data</button>
                </div>
            </div>
        </div>
    </form>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const petakSelect = document.querySelector('select[name="petak_izin"]');
    const jenisTgkSelect = document.querySelector('select[name="jenis_tgk"]');

    function petakSelectChangeHandler() {
        const selectedPetakId = this.value;

        // Kirim permintaan AJAX atau fetch ke server untuk mendapatkan data "Jenis Tegakan" berdasarkan "Nomor Petak".
        fetch(`/get-jenis-tegakan/${selectedPetakId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);

                jenisTgkSelect.innerHTML = '';

                data.forEach(option => {
                    const newOption = document.createElement('option');
                    newOption.value = option.id_hhk || option.id_hhbk;

                    // sesuaikan dengan struktur data baru
                    newOption.text = option.jenis_tgk_hhk || option.jenis_tgk_hhbk;

                    jenisTgkSelect.appendChild(newOption);
                });
            })
            .catch(error => {
                console.error('Terjadi kesalahan saat mengambil data jenis tegakan:', error);
            });
    }

    petakSelect.addEventListener("change", petakSelectChangeHandler);

    // Jika ada nilai awal yang diset, sesuaikan opsi 'Jenis Tegakan'
    if (petakSelect.value) {
        petakSelectChangeHandler.call(petakSelect);
    }
});



    </script>

    <style>
        pre {
            font-weight: bold;
            font-size: 18px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
        }

        .line-table {
            border-bottom: 1px solid;
        }

        select {
            width: 200px;
            padding: 5px;
            border: 2px solid #0CB166;
            border-radius: 5px;
            font-size: 16px;
        }

        option {
            padding: 5px;
        }
    </style>
@endsection
