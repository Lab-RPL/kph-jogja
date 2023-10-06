@extends('layouts.main')
<link rel="stylesheet" href="/css/style.css">
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <div class="garis1">
        <div class="border-liste">

            <form>
                <!-- ======================= Cards ================== -->
                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalinven }} <span style="font-size: 25px">Data</span></div>
                            <div class="cardName">
                                <a href="{{ route('data-utama.index') }}">Inventaris</a>
                            </div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <a href="{{ route('data-utama.index') }}"><ion-icon name="stats-chart-outline"></ion-icon></a>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div> --}}
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalbdh }} <span style="font-size: 25px">Data</span></div>
                            <div class="cardName">
                                <a href="/data-bdh">Badan Daerah Hutan</a>
                            </div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <a href="/data-bdh"><ion-icon name="logo-ionic"></ion-icon></a>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div> --}}
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalrph }} <span style="font-size: 25px">Data</span></div>
                            <div class="cardName">
                                <a href="{{ route('rph.index2') }}">Rencana Pengelolaan Hutan</a>
                            </div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <a href="{{ route('rph.index2') }}"><ion-icon name="leaf-outline"></ion-icon></a>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div> --}}
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalptk }} <span style="font-size: 25px"> Data</span></div>
                            <div class="cardName">
                                <a href="{{ route('petak.index2') }}">Petak</a>
                            </div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <a href="{{ route('petak.index2') }}"><ion-icon name="analytics-outline"></ion-icon></a>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div> --}}
                    </div>
                </div>

                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalPerizinan }} <span style="font-size: 25px">Data</span></div>
                            <div class="cardName">
                                <a href="{{ route('izin.index') }}">Perizinan Berusaha</a>
                            </div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <a href="{{ route('izin.index') }}"><ion-icon name="shield-checkmark-outline"></ion-icon></a>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div> --}}
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalPotensi }} <span style="font-size: 25px">Data</span></div>
                            <div class="cardName">
                                <a href="{{ route('potensi.index') }}">Potensi Hasil Hutan</a>
                            </div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                           <a href="{{ route('potensi.index') }}"><ion-icon name="leaf-outline"></ion-icon></a>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div> --}}
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalProduksi }} <span style="font-size: 25px">Data</span></div>
                            <div class="cardName"><a href="/data-produksi">Produksi Hasil Hutan</a></div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <a href="/data-produksi"><ion-icon name="settings-outline"></ion-icon></a>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div> --}}
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalPajak }} <span style="font-size: 25px"> Data</span></div>
                            <div class="cardName">
                                <a href="{{ route('pnbp.index') }}">Penerimaan Pajak</a>
                            </div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <a href="{{ route('pnbp.index') }}"><ion-icon name="stats-chart-outline"></ion-icon></a>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div> --}}
                    </div>
                </div>

                <div class="chart-container">
                    <canvas id="luasBdhChart"></canvas>
                    <canvas id="hasilHutanChart"></canvas>
                    <canvas id="produksiHutanChart"></canvas>
                </div>


    {{-- </div> --}}
    <!-- =========== Scripts =========  -->
    <script src="/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
                <!-- ====== ionicons ======= -->
                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    // Chart 1
                    var ctx1 = document.getElementById('hasilHutanChart');
                    var hasilHutanChart = new Chart(ctx1, {
                        type: 'pie',
                        data: {
                            labels: ['LuasBDH', 'Produksi', 'Potensi'],
                            datasets: [{
                                data: [35, 60, 5],
                                backgroundColor: ["#3cba9f", "#e8c3b9", "#c45850"],
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });


                    // Chart 2
                    var ctx2 = document.getElementById('luasBdhChart');
                    var luasBdhChart = new Chart(ctx2, {
                        type: 'pie',
                        data: {
                            labels: ['luasbdh 1', 'luasbdh 2', 'luasbdh 3'],
                            datasets: [{
                                data: [35, 30, 53],
                                backgroundColor: ["#3cba9f", "#e8c3b9", "#c45850"],
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });

                    // Chart 3
                    var ctx3 = document.getElementById('produksiHutanChart');
                    var produksiHutanChart = new Chart(ctx3, {
                        type: 'pie',
                        data: {
                            labels: ['Produksi 1', 'Produksi 2', 'Produksi 3'],
                            datasets: [{
                                data: [50, 45, 5],
                                backgroundColor: ["#c45850", "#e8c3b9", "#3cba9f"],
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });
                </script>

//                 {{-- <div class="garis">
// >>>>>>> Stashed changes
//         <div class="border-list">
//             <h2>Dashboard</h2>
//         </div>
//     </div> --}}
@endsection

