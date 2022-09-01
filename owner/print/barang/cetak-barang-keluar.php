<?php include '../../../koneksi.php'; ?>
<html>
<head>
  <link rel="shortcut icon" href="../../assets/images/omi-logo.png">
  <title>LAPORAN BARANG KELUAR OMI TOKO KEMUNING</title>
 <style>
    img.kanan {
    float: right;
    margin: 5px;
    }

    img.kiri {
        float: left;
        margin: 5px;
    }
    h5 {
        float: right;
        margin: 5px;
    }
 </style>
    <br>

    <img class="kiri" src="../../../assets/images/omi-logo.png" width="90">
    <img class="kanan" src="../../../assets/images/omi-logo.png" width="90">
  <font face="Arial" color="black" size="5"> <p align="center">OMI TOKO KEMUNING</p></font>
  <font face="Arial" color="blue" size="3"> <p align="center"> Perumahan Kemuning Permai Kelurahan Jeungjing Kecamatan Cisoka, Kabupaten Tangerang, Banten. </p></font>
  <hr>
 </head>
<body>
  <font face="Arial" color="black" size="4"> <p align="center"> <u> <b>LAPORAN BARANG KELUAR</b></u></font><br>
   
<br>
<body>
    <table border="1" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>ID OUTBOUND</th>
            <th>PO OUTBOUND</th>
            <th>ID BARANG</th>
            <th>NAMA BARANG</th>
            <th>KUANTITAS</th>
            <th>KETERANGAN BARANG</th>
            <th>KETERANGAN</th>
            <th class="text-center">TANGGAL BARANG KELUAR</th>
        </tr>
    </thead>
     <?php
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {
            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sql="select * from outbound 
        INNER JOIN keperluan_toko ON outbound.id_item = keperluan_toko.id_barang WHERE kategori = 'Barang Keperluan Toko' and out_tanggal between '".$tgl_awal."' and '".$tgl_akhir."'";

                }else {
            $sql="select * from outbound 
            INNER JOIN keperluan_toko ON outbound.id_item = keperluan_toko.id_barang WHERE kategori = 'Barang Keperluan Toko'";
            }
        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
        <tr>
            <td class="text-center"><?php echo $no; ?></td>
            <td><?php echo $data['id_outbound'] ?></td>
            <td><?php echo $data['po_outbound'] ?></td>
            <td><?php echo $data['id_barang'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo $data['out_kuantitas'] ?></td>
            <td><?php echo $data['keterangan'] ?></td>
            <td><?php echo $data['out_keterangan'] ?></td>
            <td class="text-center"><?php echo $data['out_tanggal'] ?></td>
        </tr>
    <?php } ?>
</table>
        <h5>Date : <?php echo date('l,d/m/Y', strtotime($tgl_awal)); ?> - <?php echo date('l,d/m/Y', strtotime($tgl_akhir)); ?></h5>
        <br>
    </body>
</html>
<script>
	window.print();
</script>