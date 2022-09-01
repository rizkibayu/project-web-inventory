<?php include '../koneksi.php';

?>
<style type="text/css">
	a {
		color: green;
	}

	table {
		color: black;
	}

	th .id_sj {
		color: red;
	}
</style>
<h1 class="text-center">DATA PERMINTAAN PRODUK</h1>

<body>
	<div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">PO PERMINTAAN</th>
					<th>TANGGAL PERMINTAAN</th>
					<th>STATUS</th>
					<th class="text-center">OPTIONS</th>
				</tr>
			</thead>
			<?php $nomer = 1; ?>
			<?php $ambil = $koneksi->query("SELECT DISTINCT po_item,tanggal_permintaan,status FROM permintaan INNER JOIN produk ON permintaan.id_item = produk.id_produk order by po_item DESC"); ?>

			<?php while ($tampil = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td class="text-center"><?php echo $nomer; ?></td>
					<th class="text-center"><a href=""><?php echo $tampil['po_item'] ?></a></th>
					<th><?php echo date('l,d/m/Y', strtotime($tampil['tanggal_permintaan'])); ?></th>
					<th><?php echo $tampil['status'] ?></th>
					</th>
					<td class="text-center">
						<a href="menu.php?halaman=detail-per-produk&id=<?php echo $tampil['po_item'] ?>" class="btn btn-info">UPDATE</a><!--&nbsp;&nbsp;&nbsp;<a href="menu.php?halaman=hapus-per-produk&id=<?php echo $tampil['po_item'] ?>" class="btn btn-danger">HAPUS</a>-->
					</td>
				</tr>
				<?php $nomer++; ?>
			<?php } ?>
		</table>
	</div>
</body>
<!--<a href="menu.php?halaman=po-produk" class="btn btn-success">+ BUAT PERMINTAAN BARU</a>-->