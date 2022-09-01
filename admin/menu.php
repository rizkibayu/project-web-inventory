<?php include '../admin/header.php'; ?>
<div class="main-content">
	<section class="container-fluid">
		<?php
		if (isset($_GET['halaman'])) {
			if ($_GET['halaman'] == "user") {
				include 'user/user.php';
			} elseif ($_GET['halaman'] == "tambah_user") {
				include 'user/tambah_user.php';
			} elseif ($_GET['halaman'] == "hapus_user") {
				include 'user/hapus_user.php';
			} elseif ($_GET['halaman'] == "edit_user") {
				include 'user/edit_user.php';
			} elseif ($_GET['halaman'] == "produk") {
				include 'produk/produk.php';
			} elseif ($_GET['halaman'] == "hapus_produk") {
				include 'produk/hapus_produk.php';
			} elseif ($_GET['halaman'] == "edit_produk") {
				include 'produk/edit_produk.php';
			} elseif ($_GET['halaman'] == "tambah_produk") {
				include 'produk/tambah_produk.php';
			} elseif ($_GET['halaman'] == "laporan_masuk") {
				include 'laporan/laporan_masuk.php';
			} elseif ($_GET['halaman'] == "laporan_keluar") {
				include 'laporan/laporan_keluar.php';
			} elseif ($_GET['halaman'] == "data-kep-toko") {
				include 'kep_toko/data-kep-toko.php';
			} elseif ($_GET['halaman'] == "edit-kep-toko") {
				include 'kep_toko/edit-kep-toko.php';
			} elseif ($_GET['halaman'] == "tambah-kep-toko") {
				include 'kep_toko/tambah-kep-toko.php';
			} elseif ($_GET['halaman'] == "hapus-kep-toko") {
				include 'kep_toko/hapus-kep-toko.php';
			} elseif ($_GET['halaman'] == "stok-produk") {
				include 'stok/stok-produk.php';
			} elseif ($_GET['halaman'] == "stok-kep-toko") {
				include 'stok/stok-kep-toko.php';
			} elseif ($_GET['halaman'] == "po-barang") {
				include 'permintaan/po-barang.php';
			} elseif ($_GET['halaman'] == "po-produk") {
				include 'permintaan/po-produk.php';
			} elseif ($_GET['halaman'] == "per-produk") {
				include 'permintaan/per-produk.php';
			} elseif ($_GET['halaman'] == "per-barang") {
				include 'permintaan/per-barang.php';
			} elseif ($_GET['halaman'] == "detail-per-barang") {
				include 'permintaan/detail-per-barang.php';
			} elseif ($_GET['halaman'] == "detail-per-produk") {
				include 'permintaan/detail-per-produk.php';
			} elseif ($_GET['halaman'] == "produk-masuk") {
				include 'inbound/produk-masuk.php';
			} elseif ($_GET['halaman'] == "tambah-produk-masuk") {
				include 'inbound/tambah-produk-masuk.php';
			} elseif ($_GET['halaman'] == "hapus-produk-masuk") {
				include 'inbound/hapus-produk-masuk.php';
			} elseif ($_GET['halaman'] == "edit-produk-masuk") {
				include 'inbound/edit-produk-masuk.php';
			} elseif ($_GET['halaman'] == "list-po-masuk") {
				include 'inbound/list-po-masuk.php';
			} elseif ($_GET['halaman'] == "barang-masuk") {
				include 'inbound/barang-masuk.php';
			} elseif ($_GET['halaman'] == "tambah-barang-masuk") {
				include 'inbound/tambah-barang-masuk.php';
			} elseif ($_GET['halaman'] == "hapus-barang-masuk") {
				include 'inbound/hapus-barang-masuk.php';
			} elseif ($_GET['halaman'] == "edit-barang-masuk") {
				include 'inbound/edit-barang-masuk.php';
			} elseif ($_GET['halaman'] == "detail-po-masuk") {
				include 'inbound/detail-po-masuk.php';
			} elseif ($_GET['halaman'] == "hapus-all-po") {
				include 'inbound/hapus-all-po.php';
			} elseif ($_GET['halaman'] == "hapus-per-produk") {
				include 'permintaan/hapus-per-produk.php';
			} elseif ($_GET['halaman'] == "hapus-per-barang") {
				include 'permintaan/hapus-per-barang.php';					
			} elseif ($_GET['halaman'] == "produk-keluar") {
				include 'outbound/produk-keluar.php';					
			} elseif ($_GET['halaman'] == "tambah-produk-keluar") {
				include 'outbound/tambah-produk-keluar.php';					
			} elseif ($_GET['halaman'] == "edit-produk-keluar") {
				include 'outbound/edit-produk-keluar.php';					
			} elseif ($_GET['halaman'] == "hapus-produk-keluar") {
				include 'outbound/hapus-produk-keluar.php';					
			} elseif ($_GET['halaman'] == "barang-keluar") {
				include 'outbound/barang-keluar.php';					
			} elseif ($_GET['halaman'] == "tambah-barang-keluar") {
				include 'outbound/tambah-barang-keluar.php';					
			} elseif ($_GET['halaman'] == "edit-barang-keluar") {
				include 'outbound/edit-barang-keluar.php';					
			} elseif ($_GET['halaman'] == "hapus-barang-keluar") {
				include 'outbound/hapus-barang-keluar.php';					
			} elseif ($_GET['halaman'] == "tambah-barang-retur") {
				include 'retur/tambah-barang-retur.php';					
			} elseif ($_GET['halaman'] == "tambah-produk-retur") {
				include 'retur/tambah-produk-retur.php';					
			} elseif ($_GET['halaman'] == "retur") {
				include 'retur/retur.php';					
			} elseif ($_GET['halaman'] == "detail-retur-barang") {
				include 'retur/detail-retur-barang.php';					
			} elseif ($_GET['halaman'] == "detail-retur-produk") {
				include 'retur/detail-retur-produk.php';					
			} elseif ($_GET['halaman'] == "edit-per-barang") {
				include 'permintaan/edit-per-barang.php';					
			} elseif ($_GET['halaman'] == "edit-per-produk") {
				include 'permintaan/edit-per-produk.php';					
			} elseif ($_GET['halaman'] == "barang-retur") {
				include 'retur/barang-retur.php';					
			} elseif ($_GET['halaman'] == "edit-barang-retur") {
				include 'retur/edit-barang-retur.php';					
			} elseif ($_GET['halaman'] == "hapus-barang-retur") {
				include 'retur/hapus-barang-retur.php';					
			} elseif ($_GET['halaman'] == "tambah-barang-retur") {
				include 'retur/tambah-barang-retur.php';					
			} elseif ($_GET['halaman'] == "produk-retur") {
				include 'retur/produk-retur.php';					
			} elseif ($_GET['halaman'] == "edit-produk-retur") {
				include 'retur/edit-produk-retur.php';					
			} elseif ($_GET['halaman'] == "hapus-produk-retur") {
				include 'retur/hapus-produk-retur.php';					
			} elseif ($_GET['halaman'] == "tambah-produk-retur") {
				include 'retur/tambah-produk-retur.php';					
			} elseif ($_GET['halaman'] == "laporan-inbound") {
				include 'laporan/produk/laporan-inbound.php';					
			} elseif ($_GET['halaman'] == "laporan-outbound") {
				include 'laporan/produk/laporan-outbound.php';					
			} elseif ($_GET['halaman'] == "laporan-retur") {
				include 'laporan/produk/laporan-retur.php';					
			} elseif ($_GET['halaman'] == "laporan-inbound-barang-keperluan-toko") {
				include 'laporan/barang/laporan-inbound-barang-keperluan-toko.php';					
			} elseif ($_GET['halaman'] == "laporan-outbound-barang-keperluan-toko") {
				include 'laporan/barang/laporan-outbound-barang-keperluan-toko.php';					
			} elseif ($_GET['halaman'] == "laporan-retur-barang-keperluan-toko") {
				include 'laporan/barang/laporan-retur-barang-keperluan-toko.php';					
			} 
		} else {
			include 'dashboard.php';
		}
		?>
	</section>
</div>