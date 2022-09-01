<?php include '../koneksi.php';
?>

<h2 class="text-center">Tambah User</h2>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="Nama">NAMA LENGKAP</label>
		<input type="text" class="form-control" name="nama" required="">
	</div>
	<div class="form-group">
		<label for="Email">Email</label>
		<input type="email" class="form-control" name="email" required="">
	</div>
	<div class="form-group">
		<label for="Password">Password</label>
		<input type="password" class="form-control" name="password" required="">
	</div>
	<div class="form-group">
		<label for="level">Level</label>
		<select class="form-control" id="level" name="level" required="">
			<option value="Owner">Owner</option>
			<option value="Kepala toko">Kepala toko</option>
			<option value="Supervisor toko">Supervisor toko</option>
		</select>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
	<a href="menu.php?halaman=user" class="btn btn-warning">Kembali</a>

</form>
<?php
if (isset($_POST['save'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$level = $_POST['level'];

	$user_cek = mysqli_num_rows(
		$koneksi->query("SELECT * FROM user WHERE email = '$email'")
	);
	if ($user_cek > 0) {
		echo "<div class='alert alert-danger text-center'>Data already exists</div>";
	} else {
		$koneksi->query("INSERT INTO user (nama, email, password, level) VALUES ('$nama','$email','$password','$level')");

		echo "<div class='alert alert-success text-center'>Success</div>";
		echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=user'>";
	}
}
?>