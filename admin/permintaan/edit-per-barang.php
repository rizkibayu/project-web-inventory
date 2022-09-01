<?php include '../koneksi.php';
?>
<?php $ambil = $koneksi->query("SELECT * FROM permintaan
INNER JOIN keperluan_toko ON permintaan.id_item = keperluan_toko.id_barang
WHERE id_permintaan = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<?php
if (isset($_POST['save'])) {
	$id_permintaan = $_POST['id_permintaan'];
	$id_item = $_POST['id_item'];
	$kuantitas = $_POST['kuantitas'];

	$koneksi->query("UPDATE permintaan SET id_permintaan = '$id_permintaan', id_item = '$id_item', kuantitas = '$kuantitas' WHERE id_permintaan = '$_GET[id]'");

	echo "<div class='alert alert-success text-center'>Success</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=per-barang'>";
}
?>
<h2 class="text-center">EDIT PERMINTAAN</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
		<label for="">PO PERMINTAAN</label>
		<input type="text" class="form-control" name="po_item" value="<?php echo $tampil['po_item'] ?>" required="" readonly>
	</div>
    <div class="form-group">
		<label for="">ID PERMINTAAN</label>
		<input type="text" class="form-control" name="id_permintaan" value="<?php echo $tampil['id_permintaan'] ?>" required="" readonly>
	</div>
    <div class="form-group">
		<label for="">ID ITEM</label>
		<input type="text" class="form-control" name="id_item" value="<?php echo $tampil['id_item'] ?>" required="" readonly>
	</div>
	<div class="form-group">
		<label for="">NAMA ITEM</label>
		<input type="text" class="form-control" name="nama_barang" value="<?php echo $tampil['nama_barang'] ?>" required="" readonly>
	</div>
    <div class="form-group">
		<label for="">KUANTITAS PERMINTAAN</label>
		<input type="number" min="1" class="form-control" name="kuantitas" value="<?php echo $tampil['kuantitas'] ?>" required="">
	</div>
	<button class="btn btn-primary" name="save">SIMPAN PERUBAHAN</button>
	<a href="menu.php?halaman=detail-per-barang&id=<?php echo $tampil['po_item'] ?>" class="btn btn-warning">KEMBALI</a>