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
<h1 class="text-center">PRODUK KELUAR</h1>

<body>
	<div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">PO OUTBOUND</th>
					<th>NAMA PRODUK</th>
					<th>TANGGAL PRODUK KELUAR</th>
					<th class="text-center">KUANTITAS</th>
					<th class="text-center">KETERANGAN</th>
					<th class="text-center">OPTIONS</th>
				</tr>
			</thead>
			<?php $nomer = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM outbound 
			INNER JOIN produk ON outbound.id_item = produk.id_produk"); ?>

			<?php while ($tampil = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td class="text-center"><?php echo $nomer; ?></td>
					<th class="text-center"><a href=""><?php echo $tampil['po_outbound'] ?></a></th>
					<th><?php echo $tampil['nama_produk'] ?></th>
					<th><?php echo date('l,d/m/Y', strtotime($tampil['out_tanggal'])); ?></th>
					<th class="text-center"><?php echo $tampil['out_kuantitas'] ?></th>
					<th class="text-center"><?php echo $tampil['out_keterangan'] ?></th>
					</th>
					<td class="text-center">
					<!--<a href="menu.php?halaman=tambah-produk-retur&id=<?php echo $tampil['id_outbound'] ?>" class="btn btn-warning">RETUR</a>&nbsp;&nbsp;&nbsp;--><a href="menu.php?halaman=edit-produk-keluar&id=<?php echo $tampil['id_outbound'] ?>" class="btn btn-info">UBAH</a>&nbsp;&nbsp;&nbsp;<a href="menu.php?halaman=hapus-produk-keluar&id=<?php echo $tampil['id_outbound'] ?>" class="btn btn-danger">HAPUS</a>
					</td>
				</tr>
				<?php $nomer++; ?>
			<?php } ?>
		</table>
	</div>
</body>
<a href="menu.php?halaman=tambah-produk-keluar" class="btn btn-success">+ PRODUK KELUAR</a>