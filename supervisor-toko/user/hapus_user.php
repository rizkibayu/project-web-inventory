<?php include '../koneksi.php'; 

$ambil = $koneksi->query("SELECT * FROM user WHERE id_user = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM user WHERE id_user = '$_GET[id]'");
echo "<div class='alert alert-success text-center'>Success</div>";
echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=user'>";
