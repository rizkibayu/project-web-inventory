<?php include '../koneksi.php';

?>
<style type="text/css">
	a {
		color: #008844;
	}

	table {
		color: black;
	}

	th .id_sj {
		color: red;
	}
</style>
<h1 class="text-center">BARANG MASUK</h1>

<body>
	<div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">ID BARANG MASUK</th>
					<th class="text-center">PO BARANG MASUK</th>
					<th>NAMA BARANG</th>
					<th>TANGGAL BARANG MASUK</th>
					<th class="text-center">KUANTITAS</th>
					<th>KETERANGAN</th>
					<th>KATEGORI</th>
				</tr>
			</thead>
			<?php $nomer = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM inbound 
			INNER JOIN keperluan_toko ON inbound.id_item = keperluan_toko.id_barang"); ?>

			<?php while ($tampil = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td class="text-center"><?php echo $nomer; ?></td>
					<th class="text-center"><a href=""><?php echo $tampil['id_inbound'] ?></a></th>
					<th class="text-center"><a href=""><?php echo $tampil['po_inbound'] ?></a></th>
					<th><?php echo $tampil['nama_barang'] ?></th>
					<th><?php echo date('l,d/m/Y', strtotime($tampil['in_tanggal'])); ?></th>
					<th class="text-center"><?php echo $tampil['in_kuantitas'] ?></th>
					<th class="text-center"><?php echo $tampil['in_keterangan'] ?></th>
					<th class="text-center"><?php echo $tampil['kategori'] ?></th>

				</tr>
				<?php $nomer++; ?>
			<?php } ?>
		</table>
	</div>
</body>
<a href="menu.php?halaman=tambah-barang-masuk" class="btn btn-success">+ BARANG MASUK</a>