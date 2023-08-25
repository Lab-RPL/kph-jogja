@extends('layouts.main')
@section('content')

<div class="garis">
    <div class="border-list">
      <h2>DATA BDH</h2>
      <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
      <form>
        <table id="tabelData">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
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
      </form>
    </div>
  </div>

  
@endsection