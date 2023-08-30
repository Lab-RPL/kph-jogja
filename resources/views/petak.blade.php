@extends('layouts.main')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <div class="garis">
    <div class="border-list">
      <h2>DATA PETAK</h2>
      <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>

      <div class="wrapper">
        <div class="bdh">
            <h3>BDH.4688</h3>
          </div>
          <div class="rph">
            <h3>RPH.7888</h3>
          </div>
      </div>

      <form>
        <table id="tabelData">
          <thead>
            <tr>
              <th>Nama Petak</th>
              <th>Luas RPH</th>
              <th>Potensi</th>
              <th>Keterangan lain</th>
            </tr>
          </thead>
          <tbody>
            <!-- Isi data dinamis di sini -->
          </tbody>
        </table>
        <div id="pagination" class="pagination">
          <!-- Pagination dinamis di sini -->
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