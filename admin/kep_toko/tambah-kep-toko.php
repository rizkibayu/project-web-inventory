<?php include '../koneksi.php'; ?>
<?php $ambil = $koneksi->query("SELECT max(id_barang) as id_barangTerbesar FROM keperluan_toko"); ?>
<?php while ($tampil = $ambil->fetch_array()) {
	$kodeBarang = $tampil['id_barangTerbesar'];
	$urutan = (int) substr($kodeBarang, 3, 3);
	$urutan++;
	$huruf = "BRG";
	$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
	<h2 class="text-center">TAMBAH BARANG</h2>

	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="ID BARANG">ID BARANG</label>
			<input type="text" class="form-control" name="id_barang" required="required" value="<?php echo $kodeBarang ?>" readonly>
		</div>
		<div class="form-group">
			<label for="NAMA BARANG">NAMA BARANG</label>
			<input type="text" class="form-control" name="nama_barang" required="">
		</div>
		<div class="form-group">
			<label for="keterangan">KETERANGAN</label>
			<select class="form-control" id="level" name="keterangan" required="">
				<option value="PCS">PCS</option>
				<option value="PACK">PACK</option>
				<option value="DUS">DUS</option>
				<option value="RIM">RIM</option>
				<option value="ROLL">ROLL</option>
			</select>
		</div>
		<div class="form-group">
			<label for="foto barang">UPLOAD FOTO BARANG</label>
			<input type="file" class="form-control" name="foto_barang" required="">
		</div>
	<?php } ?>
	<button class="btn btn-primary" name="save">Simpan</button>
	<a href="menu.php?halaman=data-kep-toko" class="btn btn-warning">Kembali</a>

	</form>
	<?php
	if (isset($_POST['save'])) {
		$id_barang = $_POST['id_barang'];
		$nama_barang = $_POST['nama_barang'];
		$keterangan = $_POST['keterangan'];
		$productname = $_FILES["foto_barang"]["name"];
		$location = $_FILES["foto_barang"]["tmp_name"];
		$productname = date("YmdHis") . $productname;
		move_uploaded_file($location, "../admin/kep_toko/foto_barang/" . $productname);
		$barang_cek = mysqli_num_rows(
			$koneksi->query("SELECT * FROM keperluan_toko WHERE nama_barang = '$nama_barang'")
		);
		if ($barang_cek > 0) {
			echo "<div class='alert alert-danger text-center'>Data already exists</div>";
		} else {
		$koneksi->query("INSERT INTO keperluan_toko (id_barang,nama_barang, keterangan, stok, foto_barang) VALUES ('$id_barang','$nama_barang','$keterangan','0','$productname')");

		echo "<div class='alert alert-success text-center'>Success</div>";
		echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=data-kep-toko'>";
	}
}
	?>