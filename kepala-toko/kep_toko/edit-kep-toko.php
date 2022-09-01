<?php include '../koneksi.php';
?>

<h2 class="text-center">UBAH BARANG</h2>
<?php $ambil = $koneksi->query("SELECT * FROM keperluan_toko WHERE id_barang = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="ID BARANG">ID PRODUK</label>
		<input type="text" class="form-control" readonly="" name="id_barang" value="<?php echo $tampil['id_barang'] ?>">
	</div>
	<div class="form-group">
		<label for="NAMA BARANG">NAMA BARANG</label>
		<input type="text" class="form-control" name="nama_barang" value="<?php echo $tampil['nama_barang'] ?>" required="">
	</div>
	<div class="form-group">
		<label for="keterangan">KETERANGAN</label>
		<select class="form-control" id="keterangan" name="keterangan" required="">
			<option value="PCS" <?php if ($tampil['keterangan'] == "PCS") {
									echo "selected";
								} ?>>PCS</option>
			<option value="PACK" <?php if ($tampil['keterangan'] == "PACK") {
										echo "selected";
									} ?>>PACK</option>
			<option value="DUS" <?php if ($tampil['keterangan'] == "DUS") {
									echo "selected";
								} ?>>DUS</option>
			<option value="RIM" <?php if ($tampil['keterangan'] == "RIM") {
									echo "selected";
								} ?>>RIM</option>
			<option value="ROLL" <?php if ($tampil['keterangan'] == "ROLL") {
										echo "selected";
									} ?>>ROLL</option>
		</select>
	</div>
	<div class="form-group">
		<img width="250px" src="../admin/kep_toko/foto_barang/<?php echo $tampil['foto_barang'] ?>">
		<br>
		<br>
		<div class="form-group">
			<label>GANTI FOTO BARANG</label>
			<input type="file" name="foto_barang" class="form-control" value="<?php echo $tampil['foto_barang']; ?>">
			<input type="hidden" name="stok" class="form-control" value="<?php echo $tampil['stok']; ?>">
		</div>
		<button class="btn btn-primary" name="save">Simpan</button>
		<a href="menu.php?halaman=data-kep-toko" class="btn btn-warning">Kembali</a>

</form>
<?php
if (isset($_POST['save'])) {
	$photoname = $_FILES['foto_barang']['name'];
	$location = $_FILES['foto_barang']['tmp_name'];

	if (!empty($location)) {
		move_uploaded_file($location, "../admin/kep_toko/foto_barang/$photoname");

		$koneksi->query("UPDATE keperluan_toko SET nama_barang = '$_POST[nama_barang]',keterangan = '$_POST[keterangan]',foto_barang = '$photoname',stok = '$_POST[stok]' WHERE id_barang = '$_GET[id]'");
	} else {
		$koneksi->query("UPDATE keperluan_toko SET nama_barang = '$_POST[nama_barang]',keterangan = '$_POST[keterangan]',stok = '$_POST[stok]' WHERE id_barang = '$_GET[id]'");
	}

	echo "<div class='alert alert-success text-center'>Success</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=data-kep-toko'>";
}


?>