@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('produksi.store') }}" method="post">
        @csrf
        <div class="garis">
            <div class="border-list">
                <h2>PERIZINAN BERUSAHA PENGOLAHAN HUTAN</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

                <table id="tabelData">
                    <tr>
                        <td height="60px">Nomor Petak</td>
                        <td>
                            <select name="id_ptk" required>
                                <option value="" disabled selected hidden>Pilih Nomor Petak</option>
                                @foreach ($petak as $petak)
                                    @if ($petak->IsDelete == 0)
                                        <option value="{{ $petak->id_ptk }}">{{ $petak->nomor_ptk }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td height="60px">Jenis Tegakan</td>
                        <td>
                            <select name="jenis_tgk" id="jenis_tgk">
                            </select>
                        </td>
                    </tr>
                    <tr id="berat">
                        <td id="berat_or_volume_label" height="60px">Berat</td>
                        <td><input type="text" id="berat" name="berat_volume" required></td>
                    </tr>
                    
                </table>
                <div style="display: flex; justify-content: space-between;" class="mt-5">
                    <a class="btn btn-warning" style="font-weight: bold; color: white" href="/data-produksi">Kembali</a>
                    <button class="btn btn-primary"
                        style="background-color: #9CC589; border: 1px solid #9CC589; color: #ffffff; font-weight: bold;"
                        type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const petakSelect = document.querySelector('select[name="id_ptk"]');
            const jenisTgkSelect = document.querySelector('select[name="jenis_tgk"]');

            petakSelect.addEventListener("change", function() {
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
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
    const petakSelect = document.querySelector('select[name="id_ptk"]');
    const beratOrVolumeLabel = document.getElementById('berat_or_volume_label');

    petakSelect.addEventListener('change', function() {
        fetch(`/get-petak-data/${this.value}`)
            .then(response => response.json())
            .then(data => {
                console.log(data); // this will help in debugging
                
                if ("id_hhk" in data) {
                    beratOrVolumeLabel.textContent = "Volume";
                } else if ("id_hhbk" in data) {
                    beratOrVolumeLabel.textContent = "Berat";
                }
            })
            .catch(error => console.error('Terjadi kesalahan saat mengambil data petak:', error));
    });
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
