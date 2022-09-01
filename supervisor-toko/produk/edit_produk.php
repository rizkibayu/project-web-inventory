<?php include '../koneksi.php';
?>

<h2 class="text-center">UBAH PRODUK</h2>
<?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="ID PRODUK">ID PRODUK</label>
		<input type="text" class="form-control" readonly="" name="id_produk" value="<?php echo $tampil['id_produk'] ?>">
	</div>
	<div class="form-group">
		<label for="NAMA PRODUK">NAMA PRODUK</label>
		<input type="text" class="form-control" name="nama_produk" value="<?php echo $tampil['nama_produk'] ?>" required="">
	</div>
	<div class="form-group">
		<label for="keterangan">KETERANGAN</label>
		<select class="form-control" id="keterangan" name="keterangan" required="">
			<option value="PCS" <?php if ($tampil['keterangan'] == "PCS") {
									echo "selected";
								} ?>>PCS</option>
			<option value="KARTON" <?php if ($tampil['keterangan'] == "KARTON") {
										echo "selected";
									} ?>>KARTON</option>
			<option value="RENCENG" <?php if ($tampil['keterangan'] == "RENCENG") {
										echo "selected";
									} ?>>RENCENG</option>
			<option value="PACK" <?php if ($tampil['keterangan'] == "PACK") {
										echo "selected";
									} ?>>PACK</option>
			<option value="KILOGRAM" <?php if ($tampil['keterangan'] == "KILOGRAM") {
										echo "selected";
									} ?>>KILOGRAM</option>
			<option value="LITER" <?php if ($tampil['keterangan'] == "LITER") {
										echo "selected";
									} ?>>LITER</option>

		</select>
	</div>
	<div class="form-group">
		<img width="250px" src="../admin/produk/foto_produk/<?php echo $tampil['foto_produk'] ?>">
		<br>
		<br>
		<div class="form-group">
			<label>GANTI FOTO PRODUK</label>
			<input type="file" name="foto_produk" class="form-control" value="<?php echo $tampil['foto_produk']; ?>">
			<input type="hidden" name="stok" class="form-control" value="<?php echo $tampil['stok']; ?>">
		</div>
		<button class="btn btn-primary" name="save">Simpan</button>
		<a href="menu.php?halaman=produk" class="btn btn-warning">Kembali</a>

</form>
<?php
if (isset($_POST['save'])) {
	$photoname = $_FILES['foto_produk']['name'];
	$location = $_FILES['foto_produk']['tmp_name'];

	if (!empty($location)) {
		move_uploaded_file($location, "../admin/produk/foto_produk/$photoname");

		$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',keterangan = '$_POST[keterangan]',foto_produk = '$photoname',stok = '$_POST[stok]' WHERE id_produk = '$_GET[id]'");
	} else {
		$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',keterangan = '$_POST[keterangan]',stok = '$_POST[stok]' WHERE id_produk = '$_GET[id]'");
	}

	echo "<div class='alert alert-success text-center'>Success</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=produk'>";
}


?>