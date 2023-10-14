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
                <div class="all">
                    <div class="cards">
                        <div class="cardBox">
                            <div class="card">
                                <div>
                                    <div class="numbers">{{ $totalinven }} <span style="font-size: 20px">Data</span></div>
                                    <div class="cardName">
                                        <a href="{{ route('data-utama.index') }}">Inventaris</a>
                                    </div>
                                </div>
                                <div class="iconBx" style="margin-top: 10px;">
                                    <a href="{{ route('data-utama.index') }}"><ion-icon
                                            name="stats-chart-outline"></ion-icon></a>
                                </div>
                                {{-- <div class="iconBx">
                            <ion-icon name="eye-outline"></ion-icon>
                            </div> --}}
                            </div>

                            <div class="card">
                                <div>
                                    <div class="numbers">{{ $totalbdh }} <span style="font-size: 20px">Data</span></div>
                                    <div class="cardName">
                                        <a href="/data-bdh">BDH</a>
                                    </div>
                                </div>
                                <span class="iconBx" style="margin-top: 10px;">
                                    <a href="/data-bdh"><ion-icon name="logo-ionic"></ion-icon></a>
                                </span>
                                {{-- <div class="iconBx">
                            <ion-icon name="cart-outline"></ion-icon>
                            </div> --}}
                            </div>
                        </div>
                        <div class="cardBox">
                            <div class="card">
                                <div>
                                    <div class="numbers">{{ $totalrph }} <span style="font-size: 20px">Data</span></div>
                                    <div class="cardName">
                                        <a href="{{ route('rph.index2') }}">RPH</a>
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
                                    <div class="numbers">{{ $totalptk }} <span style="font-size: 20px"> Data</span>
                                    </div>
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
                                    <div class="numbers">{{ $totalPerizinan }} <span style="font-size: 20px">Data</span>
                                    </div>
                                    <div class="cardName">
                                        <a href="{{ route('izin.index') }}">Perizinan Berusaha</a>
                                    </div>
                                </div>
                                <span class="iconBx" style="margin-top: 10px;">
                                    <a href="{{ route('izin.index') }}"><ion-icon
                                            name="shield-checkmark-outline"></ion-icon></a>
                                </span>
                                {{-- <div class="iconBx">
                            <ion-icon name="eye-outline"></ion-icon>
                        </div> --}}
                            </div>

                            <div class="card">
                                <div>
                                    <div class="numbers">{{ $totalPotensi }} <span style="font-size: 20px">Data</span>
                                    </div>
                                    <div class="cardName">
                                        <a href="{{ route('potensi.index') }}">Potensi Hasil Hutan</a>
                                    </div>
                                </div>
                                <span class="iconBx" style="margin-top: 10px;">
                                    <a href="{{ route('potensi.index') }}"><ion-icon name="medal-outline"></ion-icon></a>
                                </span>
                                {{-- <div class="iconBx">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div> --}}
                            </div>
                        </div>
                        <div class="cardBox">
                            <div class="card">
                                <div>
                                    <div class="numbers">{{ $totalProduksi }} <span style="font-size: 20px">Data</span>
                                    </div>
                                    <div class="cardName"><a href="/data-produksi">Produksi Hasil Hutan</a></div>
                                </div>
                                <span class="iconBx" style="margin-top: 10px;">
                                    <a href="/data-produksi"><ion-icon name="cube-outline"></ion-icon></a>
                                </span>
                                {{-- <div class="iconBx">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </div> --}}
                            </div>

                            <div class="card">
                                <div>
                                    <div class="numbers">{{ $totalPajak }} <span style="font-size: 20px"> Data</span>
                                    </div>
                                    <div class="cardName">
                                        <a href="{{ route('pnbp.index') }}">Penerimaan Pajak</a>
                                    </div>
                                </div>
                                <span class="iconBx" style="margin-top: 10px;">
                                    <a href="{{ route('pnbp.index') }}"><ion-icon name="cash-outline"></ion-icon></a>
                                </span>
                                {{-- <div class="iconBx">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div> --}}
                            </div>
                        </div>
                    </div>


                    <div class="chart-container">
                        <div class="bawah">
                            <div class="potensi">
                                <p>Potensi Hasil Hutan</p>
                                <canvas id="hasilHutanChart" class="chart1"></canvas>
                            </div>
                            <div class="bdh">
                                <p>BDH</p>
                                <canvas id="bdh" class="chart1"></canvas>
                            </div>
                            <div class="produksi">
                                <p>Produksi Hasil Hutan</p>
                                <canvas id="produksiHutanChart" class="chart1"></canvas>
                            </div>
                        </div>
                            <canvas id="pnbp" class="chart2"></canvas>
                    </div>
                </div>
<style>
    .produksi p, .bdh p, .potensi p{
        text-align: center;
        font-size: 22px;
        margin-bottom: -20px;
        margin-top: 5px;
    }
</style>
                {{-- </div> --}}
                <!-- =========== Scripts =========  -->
                <script src="/js/main.js"></script>

                <!-- ====== ionicons ======= -->
                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    < script type = "module"
                    src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" >
                </script>
                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var ctx1 = document.getElementById('bdh');
                    var bdh = new Chart(ctx1, {
                        type: 'pie',
                        data: {
                            labels: ['Bdh 1', 'Bdh 2', 'Bdh3', 'Bdh 4', 'Bdh 5'],
                            datasets: [{
                                data: [35, 60, 20, 20, 36],
                                backgroundColor: ["#438A70", "#215B63", "#5FCC9C","#AAFFC7"],

                            }]
                        },
                        options: {
                            // responsive: true,
                            // maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                    var ctx1 = document.getElementById('hasilHutanChart');
                    var hasilHutanChart = new Chart(ctx1, {
                        type: 'pie',
                        data: {
                            labels: ['Potensi 1', 'Potensi 2', 'Potensi 3'],
                            datasets: [{
                                data: [35, 60, 5],
                                backgroundColor: ["#438A70", "#215B63", "#5FCC9C","#AAFFC7"],
                            }]
                        },
                        options: {
                            // responsive: true,
                            // maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });

                    var ctx3 = document.getElementById('produksiHutanChart');
                    var produksiHutanChart = new Chart(ctx3, {
                        type: 'pie',
                        data: {
                            labels: ['Produksi 1', 'Produksi 2', 'Produksi 3'],
                            datasets: [{
                                data: [50, 45, 5],
                                backgroundColor: ["#438A70", "#215B63", "#5FCC9C","#AAFFC7"],
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                    
                    $.ajax({
                        url: '/chart-data',
                        method: 'GET',
                        success: function(data) {

                            // Konversi data ke bentuk yang diinginkan
                            var labels = [];
                            var chartData = [];
                            for (var i = 0; i < data.length; i++) {
                                labels.push(data[i].tahun_pnbp);
                                chartData.push(data[i].nominal_pnbp);
                            }

                            // Buat chart dengan data baru
                            var ctx2 = document.getElementById('pnbp');
                            var pnbp = new Chart(ctx2, {
                                type: 'bar',
                                data: {
                                    labels: labels.sort(),
                                    datasets: [
                                        {
                                            data: chartData,
                                            borderColor: "#006C9A",
                                            backgroundColor: "#006C9A",
                                            borderWidth: 2,
                                            type: 'line',
                                        },
                                        {
                                            data: chartData,
                                            backgroundColor: ["#5FCC9C"],
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            display: false
                                        }
                                    }
                                }
                            });
                        }
                    });


                </script>
            @endsection