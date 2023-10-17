@extends('layouts.main')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <form action="{{ route('petak.store') }}" method="post">
        @csrf
        <div class="garis">
            <div class="border-list">
                <h2 class="mt-2">DATA PETAK</h2>
                <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

                <table id="tabelData">
                    <tr>
                        <td><label for="tambah-rph">NAMA RPH</label></td>
                        <td>
                            <select name="id_rph" id="tambah-rph" required class="form-control" disabled>
                                @foreach ($rph as $rph)
                                    @if ($rph->IsDelete == 0)
                                        {{-- <option value="{{ $rph->id_rph }}">{{ $rph->nama_rph }}</option> --}}
                                        <option value="{{ $rph->id_rph }}"
                                            @if ($selectedRph != null && $selectedRph == $rph->id_rph) selected @endif>{{ $rph->nama_rph }}</option>
                                    @endif
                                @endforeach
                            </select>

                            <input type="hidden" name="id_rph" value="{{ $selectedRph }}" />


                        </td>
                    </tr>
                    <tr></tr>
                    <td><label for="nomor-ptk">Nomor Petak</label></td>
                    <td><input type="text" id="nomor-ptk" name="nomor_ptk" required></td>
                    </tr>
                    <tr>
                        <td><label for="luas-ptk">Luas Petak</label></td>
                        <td><input type="text" id="luas-ptk" name="luas_ptk" required></td>
                    </tr>
                    <tr>
                        <td><label for="potensi-ptk">Potensi Petak</label></td>
                        <td>
                            <select id="potensi-ptk" name="potensi_ptk" required>
                                <option value=""disabled selected hidden>Pilih Potensi</option>
                                <option value="0">Hutan Kayu</option>
                                <option value="1">Hutan Bukan Kayu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="jenis_tgk">Jenis Tegakan</label></td>
                        <td>
                            <select id="jenis_tgk" name="id_tgk">

                            </select>

                        </td>
                    </tr>



                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script>
                        $("#potensi-ptk").change(function() {
                            var type = $(this).val();
                            var url = '{{ route('petak.getJenisTgk', ':type') }}';
                            url = url.replace(':type', type);

                            $.ajax({
                                url: url,
                                type: 'GET',
                                success: function(data) {
                                    var $jenisTgk = $('#jenis_tgk');
                                    $jenisTgk.empty(); // Kosongkan opsi saat ini

                                    for (var i = 0; i < data.length; i++) {
                                        if (type === '0') {
                                            $jenisTgk.append('<option value=' + data[i].id_hhk + '>' + data[i]
                                                .jenis_tgk + '</option>');
                                        } else if (type === '1') {
                                            $jenisTgk.append('<option value=' + data[i].id_hhbk + '>' + data[i]
                                                .jenis_tgk + '</option>');
                                        }
                                    }
                                }
                            });
                        });
                    </script>


                    {{-- <script>
                        var jenisTgkData = {
                          "0": [ // For potensi-ptk = 0
                            {"id_hhk":"1", "jenis_tgk":"Jenis 1"},
                            {"id_hhk":"2", "jenis_tgk":"Jenis 2"},
                            // more data...
                          ],
                          "1": [ // For potensi-ptk = 1
                            {"id_hhbk":"3", "jenis_tgk":"Jenis 3"},
                            {"id_hhbk":"4", "jenis_tgk":"Jenis 4"},
                            // more data...
                          ]
                        }; 
                        
                        function changeDropdownOptions() {
                          const potensiPtk = document.getElementById("potensi-ptk").value;
                          const jenisTgk = document.getElementById("jenis_tgk");
                        
                          // Clear the existing options
                          jenisTgk.innerHTML = "";
                        
                          jenisTgkData[potensiPtk].forEach(item => {
                            let option = document.createElement("option");
                            option.value = potensiPtk === "0" ? item.id_hhk : item.id_hhbk; 
                            option.text = item.jenis_tgk;
                            jenisTgk.add(option);
                          });
                        }
                        </script> --}}


                    <!-- <tr>
                                                            <td><label for="luas-tanah">Keterangan Lain</label></td>
                                                            <td><input type="text" id="luas-rph" name="luas_tanah" required></td>
                                                        </tr> -->
                </table>
                <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                    <button class="btn btn-warning" style="color: white" onclick="return goBack();">Kembali</button>

                    <script>
                        function goBack() {
                            window.history.back();
                            return false;
                        }
                    </script>
                    <button class="btn btn-primary" style="color: white" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
