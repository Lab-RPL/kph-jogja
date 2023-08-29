@extends('layouts.main')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


  <div class="garis">
    <div class="border-list">
      <h2>DATA BDH</h2>
      <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

      <div>
        <label for="tambah-bdh">NAMA BDH</label>
        <input type="text" id="tambah-bdh" name="tambah-bdh">
      </div>
      <div>
        <label for="tambah-bdh">NAMA KEPALA BDH</label>
        <input type="text" id="tambah-bdh" name="tambah-bdh">
      </div>
      <div>
        <label for="luas-tanah">LUAS TANAH</label>
        <input type="text" id="luas-tanah" name="luas-tanah">
      </div>
        <div class="button-container">
          <button type="submit">Tambah Data</button>
        </div>
        <div class="button-kembali">
          <button type="submit">Kembali</button>
        </div>
      </form>
    </div>
  </div>

@endsection