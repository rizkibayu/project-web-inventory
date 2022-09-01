<?php include '../koneksi.php'; ?>
<style>
	table {
		color: black;
	}
</style>
<h1 class="text-center">STOK KEPERLUAN TOKO</h1>

<body>

	<div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th>NAMA BARANG</th>
					<th class="text-center">STOK</th>
					<th class="text-center">KETERANGAN</th>
				</tr>
			</thead>
			<?php $nomer = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM keperluan_toko "); ?>
			<?php while ($tampil = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td class="text-center"><?php echo $nomer; ?></td>
					<td><?php echo $tampil['nama_barang'] ?></td>
					<td class="text-center"><?php echo $tampil['stok'] ?></td>
					<td class="text-center"><?php echo $tampil['keterangan'] ?></td>
				</tr>
				<?php $nomer++; ?>
			<?php } ?>
		</table>
		<a target="_blank" href="export/export_stok_kep_toko.php" class="btn btn-info">EXPORT KE EXCEL</a>
</body>