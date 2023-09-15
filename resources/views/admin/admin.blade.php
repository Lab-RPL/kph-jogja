@extends('layouts.second')
@section('conten')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <div class="garis">
        <div class="border-list">
            <h2>DATA ADMIN</h2>
            <p>Pemantauan Potensi dan Gangguan Sumber Daya Hutan di Yogyakarta</p>
            <form>
              @csrf
              
              <!-- tabel kayu -->

              <table id="tabelData" class="table table-bordered">
                  <thead>
                      <tr>
                          <th valign="middle">Username</th>
                          <th valign="middle">Email</th>
                          <th valign="middle">Password</th>
                          <th valign="middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td> 
                                  <a href=""class="btn btn-danger mb-1 m-l-1">Hapus</a>
                                  <a href=""class="btn btn-warning mb-1 m-l-1 ms-2">Edit</a>
                              </td>
                          </tr>
                  </tbody>
              </table>


              </table>
              <div style="display: flex; justify-content: space-between;">
                  <a class="btn btn-primary" style="color: white" href="/tambah-admin">Tambah Data</a>
              </div>
          </form>
        </div>
    </div>
@endsection
