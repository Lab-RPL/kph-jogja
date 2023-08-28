@extends('layouts.main')
@section('content')
<div class="garis">
    <div class="border-list">
      <h2>DATA BDH</h2>
      <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
      <form>
        @csrf
        <table id="tabelData" class="table table-bordered">
            <thead>
              <tr>
                <th>BDH</th>  
                <th>Nama Kepala BDH</th>
                <th>Luas BDH</th>
                <th>RPH</th>
              </tr>
            </thead>
            <tbody>
                <td>enak</td>
                <td>enak</td>
                <td>enak</td>
            </tbody>
          </table>
          <div id="pagination" class="pagination">
          </div>
        <div class="button-container">
            <button type="submit">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
@endsection