<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Panel</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.410.min.css')}}" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style4.css')}}">
    

    <!-- Font Awesome JS -->
    <script defer src="{{asset('js/solid.js')}}" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="{{asset('js/fontawesome.js')}}" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
        .btn-custom{color:#fff;background-color:#19AA8D;border-color:#19AA8D}
        .thead-custom th{color:#fff;background-color:#19AA8D;border-color:#32383e}
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>SiTokoo</h3>
                <strong>ST</strong>
            </div>

            <ul class="list-unstyled components">
                <li >
                    <a href="/admin">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#tugasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-plus"></i>
                        Tambah
                    </a>
                    <ul class="collapse list-unstyled" id="tugasSubmenu">
                        <li>
                            <a href="/admin/tambah">Barang</a>
                        </li>
                        <li>
                            <a href="/admin/tambah_kategori">Kategori</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/admin/edit">
                    <i class="fas fa-user-edit"></i>
                        Edit
                    </a>
                </li>
                <li class="active">
                    <a href="/admin/laporan">
                        <i class="fas fa-download"></i>
                        Laporan
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="fas fa-power-off"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-custom">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>
            <h1 style="text-align: Center;">Laporan Pendapatan Keuangan</h1>
            <h1 style="text-align: Center;">Aplikasi Sitokoo</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                <?php use Illuminate\Support\Facades\DB; $total = 0;$n = 0 ?>
                    @foreach($date as $tgl)
                        <?php
                            $biaya = DB::table("transaksi") 
                            -> where("status","=","Telah Dikirimkan")
                            -> where("tanggal","=",$tgl -> tanggal)
                            -> sum("biaya");
                            $total += $biaya;
                            $n++;
                        ?>
                        <tr>
                            <th>{{$n}}</th>
                            <th>{{$tgl -> tanggal}}</th>
                            <th>Rp {{number_format($biaya,"0","",".")}}</th>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Total</th>
                        <th>Rp {{number_format($total,"0","",".")}}</th>
                    </tr>
                </tfoot>
            </table>
    </div>
   





    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="{{asset('js/popper.min.js')}}" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('js/bootstrap.410.min.js')}}" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
 

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>