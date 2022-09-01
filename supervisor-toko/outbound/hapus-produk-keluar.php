<?php include '../koneksi.php'; 

$ambil = $koneksi->query("SELECT * FROM outbound
INNER JOIN produk ON outbound.id_item = produk.id_produk = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM outbound WHERE id_outbound = '$_GET[id]'");
	echo "<div class='alert alert-success text-center'>Deleted Successfully</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=produk-keluar'>";
?>