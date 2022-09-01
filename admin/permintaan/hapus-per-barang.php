<?php include '../koneksi.php'; 

$koneksi->query("DELETE FROM permintaan WHERE po_item = '$_GET[id]'");
	echo "<div class='alert alert-success text-center'>Deleted Successfully</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=per-barang'>";
?>