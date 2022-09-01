<?php include '../koneksi.php';

$ambil = $koneksi->query("SELECT * FROM retur
INNER JOIN keperluan_toko ON retur.id_item = keperluan_toko.id_barang WHERE id_retur = '$_GET[id]'"); 
$tampil = $ambil->fetch_assoc();

$koneksi->query("UPDATE retur SET status_retur = 'Canceled' WHERE id_retur = '$_GET[id]' ");

echo "<script>alert('Success Update To Canceled')</script>";
echo "<script>location='menu.php?halaman=barang-retur';</script>";
?>