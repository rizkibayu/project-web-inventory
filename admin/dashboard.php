<?php include '../koneksi.php';

$user = mysqli_query($koneksi, "SELECT * FROM user");
$produk = mysqli_query($koneksi, "SELECT * FROM produk");
$keperluan_toko = mysqli_query($koneksi, "SELECT * FROM keperluan_toko");

// menghitung data 
$a = mysqli_num_rows($user);
$b = mysqli_num_rows($produk);
$c = mysqli_num_rows($keperluan_toko);
?>

<div class="main-content-inner">
    <!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-user"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">User</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2><?php echo $a; ?></h2>
                        </div>
                    </div>
                    <canvas id="coin_sales1" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="ti-shopping-cart-full "></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Produk</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2><?php echo $b; ?></h2>
                        </div>
                    </div>
                    <canvas id="coin_sales2" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="ti-agenda"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Barang Toko</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2><?php echo $c; ?></h2>
                        </div>
                    </div>
                    <canvas id="coin_sales3" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>