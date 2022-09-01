<?php include '../koneksi.php';
?>

<h2 class="text-center">Edit User</h2>
<?php $ambil = $koneksi->query("SELECT * FROM user WHERE id_user = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="Nama">NAMA LENGKAP</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama'] ?>" required="">
	</div>
	<div class="form-group">
		<label for="Email">Email</label>
		<input type="text" class="form-control" name="email" value="<?php echo $tampil['email'] ?>" required="">
	</div>
	<div class="form-group">
		<label for="Password">Password</label>
		<input type="password" class="form-control" name="password" value="<?php echo $tampil['password'] ?>" required="">
	</div>
	<div class="form-group">
		<label for="level">Level</label>
		<select class="form-control" id="level" name="level" required="">
			<option value="admin" <?php if ($tampil['level'] == "Admin") {
										echo "selected";
									} ?>>Admin</option>
			<option value="Owner" <?php if ($tampil['level'] == "Owner") {
												echo "selected";
											} ?>>Owner</option>
			<option value="Kepala toko" <?php if ($tampil['level'] == "Kepala toko") {
										echo "selected";
									} ?>>Kepala toko</option>
			<option value="Supervisor Toko" <?php if ($tampil['level'] == "Supervisor toko") {
										echo "selected";
									} ?>>Supervisor Toko</option>

		</select>
	</div>
	<button class="btn btn-primary" name="save">Save</button>
	<a href="menu.php?halaman=user" class="btn btn-warning">Back</a>

</form>
<?php
if (isset($_POST['save'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$level = $_POST['level'];

	$koneksi->query("UPDATE user SET nama = '$nama', email = '$email',  password = '$password', level = '$level' WHERE id_user = '$_GET[id]'");

	echo "<div class='alert alert-success text-center'>Success</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=user'>";
}
?>