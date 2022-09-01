<?php include '../koneksi.php'; ?>
<h1 class="text-center">DATA USER</h1>

<body>
	<div>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th class="text-center"> NO </th>
					<th>FULL NAME</th>
					<th>EMAIL</th>
					<th class="text-center">LEVEL</th>
					<th>OPTIONS</th>
				</tr>
			</thead>
			<?php $nomer = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM user "); ?>
			<?php while ($tampil = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td class="text-center"><?php echo $nomer; ?></td>
					<td><?php echo $tampil['nama'] ?></td>
					<td><?php echo $tampil['email'] ?></td>
					<td class="text-center"><?php echo $tampil['level'] ?></td>
					<td><a href="menu.php?halaman=edit_user&id=<?php echo $tampil['id_user'] ?>" class="btn btn-info">EDIT</a> <a href="menu.php?halaman=hapus_user&id=<?php echo $tampil['id_user'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"> Hapus </a></td>
				</tr>
				<?php $nomer++; ?>
			<?php } ?>
		</table>
	</div>
</body>
<a href="menu.php?halaman=tambah_user" class="btn btn-success">+ TAMBAH USER</a>