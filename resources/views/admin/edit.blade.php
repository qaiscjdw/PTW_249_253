
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Panel</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.410.min.css') }}" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style4.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="{{asset('js/solid.js')}}" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="{{asset('js/fontawesome.js')}}" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
@if (\Session::has('sukses'))
        <div class="alert alert-success alert-dismissible fade show">
            <ul>
                <li>{!! \Session::get('sukses') !!}</li>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </ul>
        </div>
    @endif
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>SiTokoo</h3>
                <strong>ST</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="/admin">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li >
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
                <li class="active">
                    <a href="/admin/edit">
                    <i class="fas fa-user-edit"></i>
                        Edit
                    </a>
                </li>
                <li>
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
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>
            <form action="{{route('getData')}}" method="post" enctype='multipart/form-data'>
            @csrf
                <div class="form-group">
                    <label>Data</label>
                    <select class="form-control" name="name">
                        @foreach($data as $list)
                        <option>{{ $list -> nama }}</option>
                        @endforeach
                    </select>
                    <button style="top: +10px;position:relative" type="submit" class="btn btn-primary">Get Data</button>
                </div>
            </form>
            @if(Session() -> get('barang'))
            <?php
                $barang = Session() -> get('barang');
                foreach($barang as $brg){
                    $nama = $brg -> nama;
                    $harga = $brg -> harga;
                    $stok = $brg -> stok;
                    $id = $brg -> id_barang;
                }
            ?>
            <form action="{{route('process_edit')}}" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <input type="hidden" name="idBarang" class="form-control" value="{{$id}}">
                    <label>Nama barang</label>
                    <input type="text" name="namaBarang" class="form-control" value="{{$nama}}" placeholder="Nama" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="number" name="hargaBarang" class="form-control" value="{{$harga}}" placeholder="Harga">
                </div>
                <div class="form-group">
                    <label>Stok Barang</label>
                    <input type="number" name="stokBarang" class="form-control" value="{{$stok}}" placeholder="Stok">
                </div>
                <div class="form-group" style="top: +5px;position:relative">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            @endif
           
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