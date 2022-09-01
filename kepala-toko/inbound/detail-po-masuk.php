<?php include '../koneksi.php';
?>
<?php $ambil = $koneksi->query("SELECT * FROM inbound 
        WHERE po_inbound = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<?php if ($tampil['kategori'] == "Produk"): ?>
<h2 class="text-center">LIST DETAIL PRODUK MASUK</h2>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<br>
		<label for="">PO INBOUND :</label>
		<input type="" class="form-control" readonly="" name="" value="<?php echo $tampil['po_inbound'] ?>">
	</div>
	<div class="form-group">
		<br>
		<label for="">TANGGAL MASUK :</label>
		<input style="width: 500px;" type="date" readonly="" class="form-control" value="<?php echo $tampil['in_tanggal'] ?>" name="" required="">
	</div>
	<div class="form-group">
		<br>
		<label for="">KETERANGAN :</label>
		<input style="width: 500px;" type="text" readonly="" class="form-control" value="<?php echo $tampil['in_keterangan'] ?>" name="" required="">
	</div>

	<body>
		<div>
			<table id="example" class="table table-table-bordered" style="width:100%">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">ID INBOUND</th>
						<th class="text-center">ID ITEM</th>
						<th>NAMA ITEM</th>
						<th>KUANTITAS</th>
						<th>KETERANGAN</th>
						<th>KATEGORI</th>
					</tr>
				</thead>
				<?php $nomer = 1; ?>
				<?php $ambil = $koneksi->query("SELECT * FROM inbound 
		        INNER JOIN produk ON inbound.id_item = produk.id_produk 
                WHERE po_inbound = '$_GET[id]'"); ?>
				<?php while ($tampil = $ambil->fetch_assoc()) {
				?>
					<tr>
                    
						<td class="text-center"><?php echo $nomer; ?></td>
						<td class="text-center"><?php echo $tampil['id_inbound'] ?></td>
						<td class="text-center"><?php echo $tampil['id_produk'] ?></td>
						<td><?php echo $tampil['nama_produk'] ?></td>
						<td><?php echo $tampil['in_kuantitas'] ?></td>
						<td><?php echo $tampil['in_keterangan'] ?></td>
						<td><?php echo $tampil['kategori'] ?></td>
                    
					</tr>
					<?php $nomer++; ?>
				<?php } ?>
			</table>
			<a href="menu.php?halaman=list-po-masuk" class="btn btn-warning">KEMBALI</a>
</form>

<?php elseif ($tampil['kategori'] == "Barang Keperluan Toko"): ?>
<h2 class="text-center">LIST DETAIL BARANG MASUK</h2>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<br>
		<label for="">PO INBOUND :</label>
		<input type="" class="form-control" readonly="" name="" value="<?php echo $tampil['po_inbound'] ?>">
	</div>
	<div class="form-group">
		<br>
		<label for="">TANGGAL MASUK :</label>
		<input style="width: 500px;" type="date" readonly="" class="form-control" value="<?php echo $tampil['in_tanggal'] ?>" name="" required="">
	</div>
	<div class="form-group">
		<br>
		<label for="">KETERANGAN :</label>
		<input style="width: 500px;" type="text" readonly="" class="form-control" value="<?php echo $tampil['in_keterangan'] ?>" name="" required="">
	</div>

	<body>
		<div>
			<table id="example" class="table table-table-bordered" style="width:100%">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">ID INBOUND</th>
						<th class="text-center">ID ITEM</th>
						<th>NAMA ITEM</th>
						<th>KUANTITAS</th>
						<th>KETERANGAN</th>
						<th>KATEGORI</th>
					</tr>
				</thead>
				<?php $nomer = 1; ?>
				<?php $ambil = $koneksi->query("SELECT * FROM inbound 
		        INNER JOIN keperluan_toko ON inbound.id_item = keperluan_toko.id_barang
                WHERE po_inbound = '$_GET[id]'"); ?>
				<?php while ($tampil = $ambil->fetch_assoc()) {
				?>
					<tr>
                    
						<td class="text-center"><?php echo $nomer; ?></td>
						<td class="text-center"><?php echo $tampil['id_inbound'] ?></td>
						<td class="text-center"><?php echo $tampil['id_barang'] ?></td>
						<td><?php echo $tampil['nama_barang'] ?></td>
						<td><?php echo $tampil['in_kuantitas'] ?></td>
						<td><?php echo $tampil['in_keterangan'] ?></td>
						<td><?php echo $tampil['kategori'] ?></td>
                    
					</tr>
					<?php $nomer++; ?>
				<?php } ?>
			</table>
			<a href="menu.php?halaman=list-po-masuk" class="btn btn-warning">KEMBALI</a>
</form>
<?php endif ?>
