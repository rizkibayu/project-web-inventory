<?php include '../koneksi.php';

?>
<style type="text/css">
	a {
		color: #8fce00;
	}

	table {
		color: black;
	}

	th .id_sj {
		color: red;
	}
</style>
<h1 class="text-center">LIST PO MASUK</h1>

<body>
	<div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">PO MASUK</th>
					<th>TANGGAL MASUK</th>
					<th>KETERANGAN</th>
					<th class="text-center">OPTIONS</th>
				</tr>
			</thead>
			<?php $nomer = 1; ?>
			<?php $ambil = $koneksi->query("SELECT DISTINCT po_inbound,in_tanggal,in_keterangan FROM inbound 
            ORDER BY po_inbound DESC"); 
			?>
			<?php while ($tampil = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td class="text-center"><?php echo $nomer; ?></td>
					<th class="text-center"><a href=""><?php echo $tampil['po_inbound'] ?></a></th>
					<th><?php echo date('l,d/m/Y', strtotime($tampil['in_tanggal'])); ?></th>
					<th><?php echo $tampil['in_keterangan'] ?></th>
					
					<td class="text-center">
						<a href="menu.php?halaman=detail-po-masuk&id=<?php echo $tampil['po_inbound'] ?>" class="btn btn-info">DETAIL</a>&nbsp;&nbsp;&nbsp;<a href="menu.php?halaman=hapus-all-po&id=<?php echo $tampil['po_inbound'] ?>" class="btn btn-danger">HAPUS</a>
					</td>
				</tr>
				<?php $nomer++; ?>
			<?php } ?>
		</table>
	</div>
</body>