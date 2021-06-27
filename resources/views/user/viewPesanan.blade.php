<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SiTokoo Hompeage</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <style>
            .bg-custom{background-color:#19aa8d!important}
            .text-right{text-align:right!important}
            .font-weight-light{font-weight:300!important}
            .thead-dark{color:#fff;background-color:#212529;border-color:#32383e}
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <?php
            use Illuminate\Support\Facades\DB;
            ?>
            @foreach($user as $usr)
            <?php
            $idUser = $usr -> id;
            ?>
            @endforeach
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-white"  href="/user/{{$idUser}}/dashboard/">SiTokoo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item "><a class="nav-link text-white" aria-current="page" href="/user/{{$idUser}}/dashboard/">Home</a></li>
                     
                        <li class="nav-item "><a class="nav-link active text-white" aria-current="page" href="/user/pesanan/{{$idUser}}">Pesanan</a></li>
                    </ul>
                    <form class="d-flex">
                        <?php
                            $data = DB::table("transaksi") -> where('id_pembeli',"=",$idUser) -> get();
                            $nCart = DB::table("cart") -> where("id_user","=",$idUser)->count();
                        ?>
                         <a href="/user/viewcart/{{$idUser}}" class="btn btn-outline-light" name="cart" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">{{$nCart}}</span>
                        </a>
                    </form>
                    
                    <form action="{{ route('logout') }}" style="right:-2%;position:relative" class="d-flex">
                        <button class="btn btn-outline-danger" name="logout" type="submit">
                            <i class="bi bi-power"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-custom py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Barang</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                    <th>Biaya</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;$total=0;?>
                @foreach($data as $db)
                <tr>
                    <th>{{$i}}</th>
                    <th>{{$db -> nama_pembeli}}</th>
                    <th>{{$db -> barang}}</th>
                    <th>{{$db -> alamat}}</th>
                    <th>{{$db -> tanggal}}</th>
                    <th>Rp{{number_format($db -> biaya,"0","",".")}}</th>
                    <th>{{$db -> status}}</th>
                    <?php
                        $i++;
                    ?>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>