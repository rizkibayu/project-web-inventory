<?php include '../koneksi.php'; 

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");
	echo "<div class='alert alert-success text-center'>Success</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=produk'>";
?>