<?php include '../koneksi.php';

?>
<style type="text/css">
	a {
		color: red;
	}

	table {
		color: black;
	}

	th .id_sj {
		color: red;
	}
</style>
<h1 class="text-center">BARANG RETUR</h1>

<body>
	<div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">PO RETUR</th>
					<th>NAMA BARANG</th>
					<th>TANGGAL BARANG RETUR</th>
					<th>STOK SEBELUM RETUR</th>
					<th class="text-center">KUANTITAS RETUR</th>
					<th>KETERANGAN RETUR</th>
					<th>KATEGORI</th>
					<th>STATUS</th>
				</tr>
			</thead>
			<?php $nomer = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM retur 
			INNER JOIN keperluan_toko ON retur.id_item = keperluan_toko.id_barang"); ?>

			<?php while ($tampil = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td class="text-center"><?php echo $nomer; ?></td>
					<th class="text-center"><a href=""><?php echo $tampil['po_retur'] ?></a></th>
					<th><?php echo $tampil['nama_barang'] ?></th>
					<th><?php echo date('l,d/m/Y', strtotime($tampil['retur_tanggal'])); ?></th>
					<th class="text-center"><?php echo $tampil['stok_before_retur'] ?></th>
					<th class="text-center"><?php echo $tampil['retur_kuantitas'] ?></th>
					<th><?php echo $tampil['retur_keterangan'] ?></th>
					<th><?php echo $tampil['kategori'] ?></th>
					<th><?php echo $tampil['status_retur'] ?></th>
				</tr>
				<?php $nomer++; ?>
			<?php } ?>
		</table>
	</div>
</body>
<a href="menu.php?halaman=tambah-barang-retur" class="btn btn-success">+ BARANG RETUR</a>