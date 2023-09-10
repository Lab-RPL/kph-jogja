@extends('layouts.main2')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Input Petak Ukur</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">PEH PEH</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Dalam Areal yang Diwakili PU</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Tegakan</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="d(m)">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="d²(m)" disabled>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="lbds(m²)" disabled>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="tinggi(m)">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="volume(m³)" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanaman Sela</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="d(m)">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="d²(m)" disabled>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="lbds(m²)" disabled>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="tinggi(m)">
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="volume(m³)" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tahun Tanam</label>
                                <div class="col-5">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jarak Tanaman Awal</label>
                                <div class="col-5">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck2">
                      <label class="form-check-label" for="exampleCheck2">Remember me</label>
                    </div>
                  </div>
                </div> --}}
                        </div>
                </div>
                {{-- <div class="card-footer">
                <button type="submit" class="btn btn-info">Sign in</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
              </div> --}}
                <!-- /.card-footer -->
                </form>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Risalah Tegakan</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Umur</label>
                                <div class="col-2">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keadaan Kesehatan</label>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kerataan</label>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Derajat Kesempurnaan</label>
                                <div class="col-2">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div> {{-- Risalah Tegakan --}}

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Risalah Lapangan</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bentuk Lapangan</label>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Derajat Lereng</label>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kerataan</label>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Risalah Tanah</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Tanah</label>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kedalaman</label>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tumbuhan Bawah</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis</label>
                                <div class="col-2">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kerapatan</label>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
