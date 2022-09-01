<?php include '../koneksi.php';
?>
<?php $ambil = $koneksi->query("SELECT * FROM permintaan 
		INNER JOIN produk ON permintaan.id_item = produk.id_produk WHERE po_item = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<?php if ($tampil['status'] == "Waiting For Approval") : ?>
	<h2 class="text-center">PERMINTAAN PRODUK</h2>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<br>
			<label for="">PO ITEM :</label>
			<input type="" class="form-control" readonly="" name="po_item" value="<?php echo $tampil['po_item'] ?>">
		</div>
		<div class="form-group">
			<br>
			<label for="">TANGGAL PERMINTAAN :</label>
			<input style="width: 500px;" type="date" readonly="" class="form-control" value="<?php echo $tampil['tanggal_permintaan'] ?>" name="outbound_date" required="">
		</div>
		<div class="form-group">
			<br>
			<label for="">STATUS PERMINTAAN :</label>
			<input style="width: 500px;" type="text" readonly="" class="form-control" value="<?php echo $tampil['status'] ?>" name="outbound_date" required="">
		</div>


		<body>
			<div>
				<table id="example" class="table table-table-bordered" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">ID PERMINTAAN</th>
							<th class="text-center">ID PRODUK</th>
							<th>NAMA PRODUK</th>
							<th>KUANTITAS PERMINTAAN</th>
							<th>KETERANGAN</th>
							<th class="text-center">OPTIONS</th>
						</tr>
					</thead>
					<?php $nomer = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM permintaan 
		INNER JOIN produk ON permintaan.id_item = produk.id_produk WHERE po_item = '$_GET[id]'"); ?>
					<?php while ($tampil = $ambil->fetch_assoc()) {
					?>
						<tr>
							<td class="text-center"><?php echo $nomer; ?></td>
							<td class="text-center"><?php echo $tampil['id_permintaan'] ?></td>
							<td class="text-center"><?php echo $tampil['id_produk'] ?></td>
							<td><?php echo $tampil['nama_produk'] ?></td>
							<td><?php echo $tampil['kuantitas'] ?></td>
							<td><?php echo $tampil['keterangan'] ?></td>
							<td class="text-center"><a href="menu.php?halaman=edit-per-produk&id=<?php echo $tampil['id_permintaan'] ?>" class="btn btn-warning">UBAH</a></td>
						</tr>
						<?php $nomer++; ?>
					<?php } ?>
				</table>
				<div class="form-group">
					<label for="status[]">UPDATE STATUS PERMINTAAN</label>
					<select class="form-control" id="level" name="status[]" required="">
						<option value="Canceled">Canceled</option>
						<option value="On Delivery">On Delivery</option>
					</select>
				</div>
				<br>
				<button class="btn btn-success" name="save">SIMPAN</button>
				<a href="menu.php?halaman=per-produk" class="btn btn-warning">KEMBALI</a>
	</form>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#product').select2();
		});
	</script>
	<?php
	if (isset($_POST['save'])) {
		$po_item = $_POST['po_item'];
		$status = $_POST['status'];
		$total = count($status);
		for ($i = 0; $i < $total; $i++) {
			$koneksi->query("UPDATE permintaan SET po_item = '$po_item',status = '$status[$i]' WHERE po_item = '$_GET[id]'");
		}
		echo "<div class='alert alert-success text-center'>Success</div>";
		echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=per-produk'>";
	} ?>

<?php elseif ($tampil['status'] == "On Delivery") : ?>
	<h2 class="text-center">PERMINTAAN PRODUK</h2>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<br>
			<label for="">PO ITEM :</label>
			<input type="" class="form-control" readonly="" name="po_item" value="<?php echo $tampil['po_item'] ?>">
		</div>
		<div class="form-group">
			<br>
			<label for="">TANGGAL PERMINTAAN :</label>
			<input style="width: 500px;" type="" readonly="" class="form-control" value="<?php echo $tampil['tanggal_permintaan'] ?>" name="tanggal_permintaan" required="">
		</div>
		<div class="form-group">
			<br>
			<label for="">STATUS PERMINTAAN :</label>
			<input style="width: 500px;" type="" readonly="" class="form-control" value="<?php echo $tampil['status'] ?>" name="status_permintaan" required="">
		</div>
		<div class="form-group">
			<br>
			<label for="">TANGGAL DITERIMA :</label>
			<input style="width: 500px;" type="date" readonly class="form-control" name="in_tanggal" required="">
		</div>

		<body>
			<div>
				<table id="example" class="table table-table-bordered" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">ID PERMINTAAN</th>
							<th class="text-center">ID PRODUK</th>
							<th>NAMA PRODUK</th>
							<th>KUANTITAS PERMINTAAN</th>
							<th>KETERANGAN</th>
							<th>KUANTITAS DITERIMA</th>
						</tr>
					</thead>
					<?php $nomer = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM permintaan 
		INNER JOIN produk ON permintaan.id_item = produk.id_produk WHERE po_item = '$_GET[id]'"); ?>
					<?php while ($tampil = $ambil->fetch_assoc()) {
					?>
						<input type="hidden" class="form-control" readonly="" name="po_inbound" value="<?php echo $tampil['po_item'] ?>">
						<input type="hidden" class="form-control" readonly="" name="id_permintaan[]" value="<?php echo $tampil['id_permintaan'] ?>">
						<input type="hidden" class="form-control" readonly="" name="id_item[]" value="<?php echo $tampil['id_item'] ?>">
						<input type="hidden" class="form-control" readonly="" name="kuantitas" value="<?php echo $tampil['kuantitas'] ?>">
						<input type="hidden" class="form-control" readonly="" name="in_keterangan" value="barang dari owner">
						<input type="hidden" class="form-control" readonly="" name="kategori" value="Produk">
						<tr>
							<td class="text-center"><?php echo $nomer; ?></td>
							<td class="text-center"><?php echo $tampil['id_permintaan'] ?></td>
							<td class="text-center"><?php echo $tampil['id_produk'] ?></td>
							<td><?php echo $tampil['nama_produk'] ?></td>
							<td><?php echo $tampil['kuantitas'] ?></td>
							<td><?php echo $tampil['keterangan'] ?></td>
							<td>-</td>
							<!--<td class="text-center"><a href="menu.php?halaman=edit-per-produk&id=<?php echo $tampil['id_permintaan'] ?>" class="btn btn-warning">UBAH</a></td>
					-->
						</tr>
						<?php $nomer++; ?>
					<?php } ?>
				</table>
				<br>
				<!--<button class="btn btn-success" name="save">SIMPAN</button>-->
				<a href="menu.php?halaman=per-produk" class="btn btn-warning">KEMBALI</a>
	</form>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#product').select2();
		});
	</script>
	<?php
	if (isset($_POST['save'])) {
		$po_inbound = $_POST['po_inbound'];
		$id_permintaan = $_POST['id_permintaan'];
		$id_item = $_POST['id_item'];
		$in_kuantitas = $_POST['in_kuantitas'];
		$in_tanggal = $_POST['in_tanggal'];
		$in_keterangan = $_POST['in_keterangan'];
		$po_item = $_POST['po_item'];
		$status = $_POST['status'];
		$total = count($id_item);
		for ($i = 0; $i < $total; $i++) {

			$koneksi->query("INSERT INTO inbound (po_inbound,id_permintaan,id_item, in_kuantitas, in_tanggal, in_keterangan, kategori) VALUES ('$po_inbound','$id_permintaan[$i]','$id_item[$i]','$in_kuantitas[$i]','$in_tanggal','$in_keterangan','Produk')");
			$koneksi->query("UPDATE produk SET stok = stok + $in_kuantitas[$i] WHERE id_produk = '$id_item[$i]'");
			$koneksi->query("UPDATE permintaan SET po_item = '$po_item',status = '$status' WHERE po_item = '$_GET[id]'");
		}
		echo "<div class='alert alert-success text-center'>Success</div>";
		echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=per-produk'>";
	} ?>

<?php elseif ($tampil['status'] == "Canceled") : ?>
	<h2 class="text-center">PERMINTAAN PRODUK</h2>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<br>
			<label for="">PO ITEM :</label>
			<input type="" class="form-control" readonly="" name="po_item" value="<?php echo $tampil['po_item'] ?>">
		</div>
		<div class="form-group">
			<br>
			<label for="">TANGGAL PERMINTAAN :</label>
			<input style="width: 500px;" type="date" readonly="" class="form-control" value="<?php echo $tampil['tanggal_permintaan'] ?>" name="outbound_date" required="">
		</div>
		<div class="form-group">
			<br>
			<label for="">STATUS PERMINTAAN :</label>
			<input style="width: 500px;" type="text" readonly="" class="form-control" value="<?php echo $tampil['status'] ?>" name="outbound_date" required="">
		</div>


		<body>
			<div>
				<table id="example" class="table table-table-bordered" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">ID PERMINTAAN</th>
							<th class="text-center">ID PRODUK</th>
							<th>NAMA PRODUK</th>
							<th>KUANTITAS PERMINTAAN</th>
							<th>KETERANGAN</th>
						</tr>
					</thead>
					<?php $nomer = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM permintaan 
		INNER JOIN produk ON permintaan.id_item = produk.id_produk WHERE po_item = '$_GET[id]'"); ?>
					<?php while ($tampil = $ambil->fetch_assoc()) {
					?>
						<tr>
							<td class="text-center"><?php echo $nomer; ?></td>
							<td class="text-center"><?php echo $tampil['id_permintaan'] ?></td>
							<td class="text-center"><?php echo $tampil['id_produk'] ?></td>
							<td><?php echo $tampil['nama_produk'] ?></td>
							<td><?php echo $tampil['kuantitas'] ?></td>
							<td><?php echo $tampil['keterangan'] ?></td>
							<!--<td class="text-center"><a href="menu.php?halaman=edit-per-produk&id=<?php echo $tampil['id_permintaan'] ?>" class="btn btn-warning">UBAH</a></td>
					-->
						</tr>
						<?php $nomer++; ?>
					<?php } ?>
				</table>
				<!--<button class="btn btn-success" name="save">SIMPAN</button>-->
				<a href="menu.php?halaman=per-produk" class="btn btn-warning">KEMBALI</a>
	</form>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#product').select2();
		});
	</script>
	<?php
	if (isset($_POST['save'])) {
		$po_item = $_POST['po_item'];
		$status = $_POST['status'];
		$total = count($status);
		for ($i = 0; $i < $total; $i++) {
			$koneksi->query("UPDATE permintaan SET po_item = '$po_item',status = '$status[$i]' WHERE po_item = '$_GET[id]'");
		}
		echo "<div class='alert alert-success text-center'>Success</div>";
		echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=per-produk'>";
	} ?>

<?php elseif ($tampil['status'] == "Received") : ?>
	<h2 class="text-center">PERMINTAAN PRODUK</h2>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<br>
			<label for="">PO ITEM :</label>
			<input type="" class="form-control" readonly="" name="po_item" value="<?php echo $tampil['po_item'] ?>">
		</div>
		<div class="form-group">
			<br>
			<label for="">TANGGAL PERMINTAAN :</label>
			<input style="width: 500px;" type="date" readonly="" class="form-control" value="<?php echo $tampil['tanggal_permintaan'] ?>" name="outbound_date" required="">
		</div>
		<div class="form-group">
			<br>
			<label for="">STATUS PERMINTAAN :</label>
			<input style="width: 500px;" type="text" readonly="" class="form-control" value="<?php echo $tampil['status'] ?>" name="outbound_date" required="">
		</div>


		<body>
			<div>
				<table id="example" class="table table-table-bordered" style="width:100%">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">ID PERMINTAAN</th>
							<th class="text-center">ID PRODUK MASUK</th>
							<th class="text-center">ID PRODUK</th>
							<th>NAMA PRODUK</th>
							<th class="text-center">KUANTITAS PERMINTAAN</th>
							<th class="text-center">KUANTITAS DITERIMA</th>
							<th>KETERANGAN</th>
							<th class="text-center">TANGGAL DITERIMA</th>
						</tr>
					</thead>
					<?php $nomer = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM inbound 
		INNER JOIN permintaan ON inbound.id_permintaan = permintaan.id_permintaan
		INNER JOIN produk ON inbound.id_item = produk.id_produk WHERE po_inbound = '$_GET[id]'"); ?>
					<?php while ($tampil = $ambil->fetch_assoc()) {
					?>
						<tr>
							<td class="text-center"><?php echo $nomer; ?></td>
							<td class="text-center"><?php echo $tampil['id_permintaan'] ?></td>
							<td class="text-center"><?php echo $tampil['id_inbound'] ?></td>
							<td class="text-center"><?php echo $tampil['id_produk'] ?></td>
							<td><?php echo $tampil['nama_produk'] ?></td>
							<td class="text-center"><?php echo $tampil['kuantitas'] ?></td>
							<td class="text-center"><?php echo $tampil['in_kuantitas'] ?></td>
							<td><?php echo $tampil['keterangan'] ?></td>
							<td class="text-center"><?php echo date('l,d/m/Y', strtotime($tampil['in_tanggal'])); ?></td>
							<!--<td class="text-center"><a href="menu.php?halaman=edit-per-produk&id=<?php echo $tampil['id_permintaan'] ?>" class="btn btn-warning">UBAH</a></td>
					-->
						</tr>
						<?php $nomer++; ?>
					<?php } ?>
				</table>
				<br>
				<a href="menu.php?halaman=per-produk" class="btn btn-warning">KEMBALI</a>
	</form>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#product').select2();
		});
	</script>
	<?php
	if (isset($_POST['save'])) {
		$po_item = $_POST['po_item'];
		$status = $_POST['status'];
		$total = count($status);
		for ($i = 0; $i < $total; $i++) {
			$koneksi->query("UPDATE permintaan SET po_item = '$po_item',status = '$status[$i]' WHERE po_item = '$_GET[id]'");
		}
		echo "<div class='alert alert-success text-center'>Success</div>";
		echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=per-produk'>";
	} ?>
<?php endif ?>