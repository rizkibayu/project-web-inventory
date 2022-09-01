<?php include '../koneksi.php';

?>
<style type="text/css">
	a {
		color: blue;
	}

	table {
		color: black;
	}

	th .id_sj {
		color: red;
	}
</style>
<h1 class="text-center">PRODUK MASUK</h1>

<body>
	<div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">ID PRODUK MASUK</th>
					<th>NAMA PRODUK</th>
					<th>TANGGAL PRODUK MASUK</th>
					<th class="text-center">KUANTITAS</th>
					<th class="text-center">OPTIONS</th>
				</tr>
			</thead>
			<?php $nomer = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM inbound 
			INNER JOIN produk ON inbound.id_item = produk.id_produk"); ?>

			<?php while ($tampil = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td class="text-center"><?php echo $nomer; ?></td>
					<th class="text-center"><a href=""><?php echo $tampil['id_inbound'] ?></a></th>
					<th><?php echo $tampil['nama_produk'] ?></th>
					<th><?php echo date('l,d/m/Y', strtotime($tampil['in_tanggal'])); ?></th>
					<th class="text-center"><?php echo $tampil['in_kuantitas'] ?></th>
					</th>
					<td class="text-center">
						<a href="menu.php?halaman=edit-produk-masuk&id=<?php echo $tampil['id_inbound'] ?>" class="btn btn-info">UBAH</a>&nbsp;&nbsp;&nbsp;<a href="menu.php?halaman=hapus-produk-masuk&id=<?php echo $tampil['id_inbound'] ?>" class="btn btn-danger">HAPUS</a>
					</td>
				</tr>
				<?php $nomer++; ?>
			<?php } ?>
		</table>
	</div>
</body>
<a href="menu.php?halaman=tambah-produk-masuk" class="btn btn-success">+ PRODUK MASUK</a>