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
<h1 class="text-center">PRODUK RETUR</h1>

<body>
	<div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">ID PRODUK RETUR</th>
					<th class="text-center">PO RETUR</th>
					<th>NAMA PRODUK</th>
					<th>TANGGAL PRODUK RETUR</th>
					<th>STOK SEBELUM RETUR</th>
					<th class="text-center">KUANTITAS RETUR</th>
					<th>KETERANGAN RETUR</th>
					<th>STATUS</th>
					<th class="text-center">OPTIONS</th>
				</tr>
			</thead>
			<?php $nomer = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM retur 
			INNER JOIN produk ON retur.id_item = produk.id_produk"); ?>

			<?php while ($tampil = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td class="text-center"><?php echo $nomer; ?></td>
					<th class="text-center"><a href=""><?php echo $tampil['id_retur'] ?></a></th>
					<th class="text-center"><a href=""><?php echo $tampil['po_retur'] ?></a></th>
					<th><?php echo $tampil['nama_produk'] ?></th>
					<th><?php echo date('l,d/m/Y', strtotime($tampil['retur_tanggal'])); ?></th>
					<th class="text-center"><?php echo $tampil['stok_before_retur'] ?></th>
					<th class="text-center"><?php echo $tampil['retur_kuantitas'] ?></th>
					<th><?php echo $tampil['retur_keterangan'] ?></th>
					<th><?php echo $tampil['status_retur'] ?></th>
					<td class="text-center">
					<?php if ($tampil['status_retur'] == "Waiting For Approval") : ?>
						<a href="menu.php?halaman=approve-produk-retur&id=<?php echo $tampil['id_retur'] ?>" class="btn btn-warning">Approve</a>
						<a href="menu.php?halaman=cancel-produk-retur&id=<?php echo $tampil['id_retur'] ?>" class="btn btn-danger">Cancel</a>
					<?php endif ?>
					<?php if ($tampil['status_retur'] == "Approve") : ?>
					<a class="btn btn-success">COMPLETED</a>
					<?php endif ?>
					<?php if ($tampil['status_retur'] == "Canceled") : ?>
					<a class="btn btn-danger">CANCELED</a>
					<?php endif ?>
					</td>
				</tr>
				<?php $nomer++; ?>
			<?php } ?>
		</table>
	</div>
</body>
<!--<a href="menu.php?halaman=tambah-produk-retur" class="btn btn-success">+ PRODUK RETUR</a>-->