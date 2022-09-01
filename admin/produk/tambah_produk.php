<?php include '../koneksi.php'; ?>
<?php $ambil = $koneksi->query("SELECT max(id_produk) as id_produkTerbesar FROM produk"); ?>
<?php while ($tampil = $ambil->fetch_array()) {
	$kodeBarang = $tampil['id_produkTerbesar'];
	$urutan = (int) substr($kodeBarang, 3, 3);
	$urutan++;
	$huruf = "PDK";
	$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
	<h2 class="text-center">TAMBAH PRODUK</h2>

	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="ID PRODUK">ID PRODUK</label>
			<input type="text" class="form-control" name="id_produk" required="required" value="<?php echo $kodeBarang ?>" readonly>
		</div>
		<div class="form-group">
			<label for="Product Name">NAMA PRODUK</label>
			<input type="text" class="form-control" name="nama_produk" required="">
		</div>
		<div class="form-group">
			<label for="keterangan">KETERANGAN</label>
			<select class="form-control" id="level" name="keterangan" required="">
				<option value="PCS">PCS</option>
				<option value="KARTON">KARTON</option>
				<option value="RENCENG">RENCENG</option>
				<option value="PACK">PACK</option>
				<option value="KILOGRAM">KILOGRAM</option>
				<option value="LITER">LITER</option>
			</select>
		</div>
		<div class="form-group">
			<label for="foto produk">UPLOAD FOTO PRODUK</label>
			<input type="file" class="form-control" name="foto_produk" required="">
		</div>
	<?php } ?>
	<button class="btn btn-primary" name="save">Simpan</button>
	<a href="menu.php?halaman=produk" class="btn btn-warning">Kembali</a>

	</form>
	<?php
	if (isset($_POST['save'])) {
		$id_produk = $_POST['id_produk'];
		$nama_produk = $_POST['nama_produk'];
		$keterangan = $_POST['keterangan'];
		$productname = $_FILES["foto_produk"]["name"];
		$location = $_FILES["foto_produk"]["tmp_name"];
		$productname = date("YmdHis") . $productname;
		move_uploaded_file($location, "../admin/produk/foto_produk/" . $productname);

		$produk_cek = mysqli_num_rows(
			$koneksi->query("SELECT * FROM produk WHERE nama_produk = '$nama_produk'")
		);
		if ($produk_cek > 0) {
			echo "<div class='alert alert-danger text-center'>Data already exists</div>";
		} else {
		$koneksi->query("INSERT INTO produk (id_produk, nama_produk, keterangan, stok, foto_produk) VALUES ('$id_produk','$nama_produk','$keterangan','0','$productname')");
		echo "<div class='alert alert-success text-center'>Success</div>";
		echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=produk'>";
	}
}
	?>