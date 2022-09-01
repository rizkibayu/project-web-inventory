<?php include '../koneksi.php'; 

$ambil = $koneksi->query("SELECT * FROM keperluan_toko WHERE id_barang = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM keperluan_toko WHERE id_barang = '$_GET[id]'");
	echo "<div class='alert alert-success text-center'>Success</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=data-kep-toko'>";
