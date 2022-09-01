<?php include '../../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data Laporan Produk Keluar Ke Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan Produk Keluar.xls");
	?>
	<table border="1">
		<tr>
			<th width=150>No</th>
            <th width=150>Id Outbound</th>
            <th width=200>PO Outbound</th>
            <th width=150>Id Produk</th>
			<th width=200>Nama Produk</th>
            <th width=150>Kuantitas</th>
			<th width=150>Keterangan Produk</th>
			<th width=150>Keterangan</th>
            <th width=150>Tanggal Produk Keluar</th>
            <th width=150>Kategori</th>
		</tr>
        <?php $nomer = 1; ?>
      <?php $ambil = $koneksi->query("SELECT * FROM outbound 
            INNER JOIN produk ON outbound.id_item = produk.id_produk WHERE kategori = 'Produk'"); ?>
      <?php while ($tampil = $ambil->fetch_assoc()) {
      ?>
		<tr>
        <td class="text-center"><?php echo $nomer; ?></td>
		<td><?php echo $tampil['id_outbound'] ?></td>
        <td><?php echo $tampil['po_outbound'] ?></td>
        <td><?php echo $tampil['id_item'] ?></td>
        <td><?php echo $tampil['nama_produk'] ?></td>
        <td><?php echo $tampil['out_kuantitas'] ?></td>
        <td><?php echo $tampil['keterangan'] ?></td>
        <td><?php echo $tampil['out_keterangan'] ?></td>
        <td><?php echo $tampil['out_tanggal'] ?></td>
        <td><?php echo $tampil['kategori'] ?></td>
		</tr>
        <?php $nomer++; ?>
      <?php } ?>
	</table>
</body>
</html>