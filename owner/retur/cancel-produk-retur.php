<?php include '../koneksi.php';

$ambil = $koneksi->query("SELECT * FROM retur
		INNER JOIN produk ON retur.id_item = produk.id_produk WHERE id_retur = '$_GET[id]'"); 
 $tampil = $ambil->fetch_assoc();

$koneksi->query("UPDATE retur SET status_retur = 'Canceled' WHERE id_retur = '$_GET[id]' ");

echo "<script>alert('Success Update To Canceled')</script>";
echo "<script>location='menu.php?halaman=produk-retur';</script>";
?>