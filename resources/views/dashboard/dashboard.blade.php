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
                            <div class="cardName">Data Inventaris</div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <ion-icon name="stats-chart-outline"></ion-icon>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div> --}}
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalbdh }} <span style="font-size: 25px">Data</span></div>
                            <div class="cardName">Badan Daerah Hutan</div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <ion-icon name="logo-ionic"></ion-icon>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div> --}}
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalrph }} <span style="font-size: 25px">Data</span></div>
                            <div class="cardName">Rencana Pengelolaan Hutan</div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <ion-icon name="leaf-outline"></ion-icon>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div> --}}  
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">42 <span style="font-size: 25px"> Data</span></div>
                            <div class="cardName">Data Petak</div>
                        </div>
                        <span class="iconBx" style="margin-top: 10px;">
                            <ion-icon name="analytics-outline"></ion-icon>
                        </span>
                        {{-- <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div> --}}
                    </div>
                </div>

                <!-- ================ Order Details List ================= -->
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Aktivitas Terbaru</h2>
                            <a href="#" class="btn">View All</a>
                        </div>

                        <table style="margin-top: -200px">
                            <thead>
                                <tr>
                                    <td>Jenis</td>
                                    <td>Tanggal</td>
                                    <td>ID</td>
                                    <td>Aktivitas</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Data Inventaris</td>
                                    <td>10-06-2023</td>
                                    <td>229</td>
                                    <td><span class="status inProgress">Tambah Data</span></td>
                                </tr>

                                <tr>
                                    <td>RPH</td>
                                    <td>23-06-2023</td>
                                    <td>228</td>
                                    <td><span class="status pending">Update Data</span></td>
                                </tr>

                                <tr>
                                    <td>Perizinan Berusaha</td>
                                    <td>29-12-2022</td>
                                    <td>190</td>
                                    <td><span class="status return">Delete Data</span></td>
                                </tr>

                                <tr>
                                    <td>Data Inventaris</td>
                                    <td>14-03-2023</td>
                                    <td>89</td>
                                    <td><span class="status inProgress">Tambah Data</span></td>
                                </tr>

                                <tr>
                                    <td>Perizinan Berusaha</td>
                                    <td>11-02-2021</td>
                                    <td>87</td>
                                    <td><span class="status inProgress">Tambah Data</span></td>
                                </tr>

                                <tr>
                                    <td>RPH</td>
                                    <td>10-05-2023</td>
                                    <td>86</td>
                                    <td><span class="status return">Delete Data</span></td>
                                </tr>

                                <tr>
                                    <td>BDH</td>
                                    <td>01-03-2023</td>
                                    <td>83</td>
                                    <td><span class="status delivered">Tambah Data</span></td>
                                </tr>

                                <tr>
                                    <td>Perizinan Berusaha</td>
                                    <td>10-07-2023</td>
                                    <td>82</td>
                                    <td><span class="status inProgress">Tambah Data</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- ================= New Customers ================ -->
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Histori Investor</h2>
                        </div>

                        <table>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img
                                            src="https://www.kjpl.or.id/wp-content/uploads/2009/02/hutan-6.png"
                                            alt=""></div>
                                </td>
                                <td>
                                    <h4>Hutan Jati <br> <span>Yogyakarta</span></h4>
                                </td>
                            </tr>

                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img
                                            src="https://cdnwpedutorenews.gramedia.net/wp-content/uploads/2022/11/23153209/bakao.jpg"
                                            alt=""></div>
                                </td>
                                <td>
                                    <h4>Hutan Mangrove <br> <span>Parangtritis</span></h4>
                                </td>
                            </tr>

                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img
                                            src="https://images.theconversation.com/files/489852/original/file-20221015-18-rwn1yt.JPG?ixlib=rb-1.1.0&q=45&auto=format&w=754&fit=clip"
                                            alt=""></div>
                                </td>
                                <td>
                                    <h4>Hutan Kerangas <br> <span>Sleman</span></h4>
                                </td>
                            </tr>

                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img
                                            src="https://asset.kompas.com/crops/0ZL1-n4qbAJbRTXfn86vWgDQzXQ=/0x0:618x412/750x500/data/photo/2022/09/23/632d0d5e9a332.jpg"
                                            alt=""></div>
                                </td>
                                <td>
                                    <h4>Hutan Rawa <br> <span>Yogyakarta</span></h4>
                                </td>
                            </tr>

                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="https://www.aprilasia.com/id/images/media/RER.jpg"
                                            alt=""></div>
                                </td>
                                <td>
                                    <h4>Hutan Rawa Gambut <br> <span>Bantul</span></h4>
                                </td>
                            </tr>

                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img
                                            src="https://rimbakita.com/wp-content/uploads/2018/10/suhu-hutan-sabana.jpg"
                                            alt=""></div>
                                </td>
                                <td>
                                    <h4>Hutan Sabana <br> <span>Parangtritis</span></h4>
                                </td>
                            </tr>

                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img
                                            src="https://awsimages.detik.net.id/community/media/visual/2019/04/22/34582657-e080-42fd-9526-aea7d6a21f9f_43.jpeg?w=1200"
                                            alt=""></div>
                                </td>
                                <td>
                                    <h4>Hutan Pinus <br> <span>Kaliurang</span></h4>
                                </td>
                            </tr>

                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img
                                            src="https://asset-2.tstatic.net/tribunnews/foto/bank/images/hutan-pinus_20160216_132347.jpg"
                                            alt=""></div>
                                </td>
                                <td>
                                    <h4>Hutan Kota Jogja<br> <span>Yogyakarta</span></h4>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- </div> --}}
    <!-- =========== Scripts =========  -->
    <script src="/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    {{-- <div class="garis">
>>>>>>> Stashed changes
        <div class="border-list">
            <h2>Dashboard</h2>
        </div>
    </div> --}}
@endsection
