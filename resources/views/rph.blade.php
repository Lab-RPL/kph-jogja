@extends('layouts.main')
@section('content')
<div class="garis">
    <div class="border-list">
      <h2>DATA RPH</h2>
      <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
      <form>
        <div class="wrapper">
            <div class="bdh">
                <h3>BDH.(data)</h3>
              </div>
          </div>
        @csrf
        <table id="tabelData" class="table table-bordered">
            <thead>
              <tr>
                <th>Nama RPH</th>  
                <th>Nama Kepala RPH</th>
                <th>Luas RPH</th>
                <th>Petak</th>
              </tr>
            </thead>
            <tbody>
                <td>enak</td>
                <td>enak</td>
                <td>enak</td>
                <td><a href="/petak" class="btn btn-success">Petak</a></td>
            </tbody>
          </table>
          <div id="pagination" class="pagination">
          </div>
        <div>
            <a class="btn btn-warning" href="/data-bdh">Kembali</a>
            <a class="btn btn-primary">Tambah Data</a>
        </div>
      </form>
    </div>
  </div>
@endsection