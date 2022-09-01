<?php include '../../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data Laporan Barang Masuk Ke Excel</title>
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
	header("Content-Disposition: attachment; filename=Laporan Barang Masuk.xls");
	?>
	<table border="1">
		<tr>
			<th width=150>No</th>
            <th width=150>Id Inbound</th>
            <th width=200>PO Inbound</th>
            <th width=150>Id Barang</th>
			<th width=200>Nama Barang</th>
            <th width=150>Kuantitas</th>
			<th width=150>Keterangan Barang</th>
			<th width=150>Keterangan</th>
            <th width=150>Tanggal Barang Masuk</th>
            <th width=150>Kategori</th>
		</tr>
        <?php $nomer = 1; ?>
      <?php $ambil = $koneksi->query("SELECT * FROM inbound 
            INNER JOIN keperluan_toko ON inbound.id_item = keperluan_toko.id_barang WHERE kategori = 'Barang Keperluan Toko'"); ?>
      <?php while ($tampil = $ambil->fetch_assoc()) {
      ?>
		<tr>
        <td class="text-center"><?php echo $nomer; ?></td>
		<td><?php echo $tampil['id_inbound'] ?></td>
        <td><?php echo $tampil['po_inbound'] ?></td>
        <td><?php echo $tampil['id_item'] ?></td>
        <td><?php echo $tampil['nama_barang'] ?></td>
        <td><?php echo $tampil['in_kuantitas'] ?></td>
        <td><?php echo $tampil['keterangan'] ?></td>
        <td><?php echo $tampil['in_keterangan'] ?></td>
        <td><?php echo $tampil['in_tanggal'] ?></td>
        <td><?php echo $tampil['kategori'] ?></td>
		</tr>
        <?php $nomer++; ?>
      <?php } ?>
	</table>
</body>
</html>