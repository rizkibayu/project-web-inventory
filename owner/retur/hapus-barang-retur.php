<?php include '../koneksi.php'; 

$ambil = $koneksi->query("SELECT * FROM retur
INNER JOIN keperluan_toko ON retur.id_item = keperluan_toko.id_barang = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM retur WHERE id_retur = '$_GET[id]'");
	echo "<div class='alert alert-success text-center'>Deleted Successfully</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=barang-retur'>";
?>