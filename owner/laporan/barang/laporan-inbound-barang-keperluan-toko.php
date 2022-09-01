<?php include '../koneksi.php'; ?>
<h1 class="text-center">LAPORAN BARANG MASUK</h1> <br>
    <br>
    <!-- SEACRH -->
    <form action="" method="post" class="form-inline">
                <input style="width: 550px" id="tgl_mulai" placeholder="masukkan tanggal Awal" type="date" class="form-control datepicker" name="tgl_awal"  value="<?php if (isset($_POST['tgl_awal'])) echo $_POST['tgl_awal'];?>" >
            <h5>&nbsp;-&nbsp;</h5>
                <input style="width: 550px" id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="date" class="form-control datepicker" name="tgl_akhir" value="<?php if (isset($_POST['tgl_akhir'])) echo $_POST['tgl_akhir'];?>">
        <script type="text/javascript">
            $(function(){
                $(".datepicker").datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: false,
                });
                $("#tgl_mulai").on('changeDate', function(selected) {
                    var startDate = new Date(selected.date.valueOf());
                    $("#tgl_akhir").datepicker('setStartDate', startDate);
                    if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
                        $("#tgl_akhir").val($("#tgl_mulai").val());
                    }
                });
            });
        </script>
        &nbsp;&nbsp;
        <input type="submit" class="btn btn-info" value="SEACRH">
    </form>
    <br>
    <br>
    <!-- CETAK -->
    <form action="print/barang/cetak-barang-masuk.php" method="post" class="form-inline" target="_blank">
                <input style="width: 550px" id="tgl_mulai" placeholder="masukkan tanggal Awal" type="date" class="form-control datepicker" name="tgl_awal"  value="<?php if (isset($_POST['tgl_awal'])) echo $_POST['tgl_awal'];?>" >
            <h5>&nbsp;-&nbsp;</h5>
                <input style="width: 550px" id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="date" class="form-control datepicker" name="tgl_akhir" value="<?php if (isset($_POST['tgl_akhir'])) echo $_POST['tgl_akhir'];?>">
        &nbsp;&nbsp;
        <input type="submit" name="date" class="btn btn-warning" value="PRINT">
    </form>
    <br>
    <a href="menu.php?halaman=laporan-inbound-barang-keperluan-toko" class="btn btn-info btn-sm">BARANG MASUK</a>
	<a href="menu.php?halaman=laporan-outbound-barang-keperluan-toko" class="btn btn-warning btn-sm">BARANG KELUAR</a>
	<a href="menu.php?halaman=laporan-retur-barang-keperluan-toko" class="btn btn-danger btn-sm">BARANG RETUR</a>
    <a target="_blank" href="export/barang-inbound.php" class="btn btn-success btn-sm"><i class="ti-export">&nbsp;EXPORT EXCEL</i></a>
    <br>
    <br>
<body>
<div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>ID INBOUND</th>
            <th>PO INBOUND</th>
            <th>ID BARANG</th>
            <th>NAMA BARANG</th>
            <th>KUANTITAS</th>
            <th>KETERANGAN BARANG</th>
            <th>KETERANGAN</th>
            <th class="text-center">TANGGAL BARANG MASUK</th>
        </tr>
    </thead>
     <?php
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {
            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sql="select * from inbound 
        INNER JOIN keperluan_toko ON inbound.id_item = keperluan_toko.id_barang WHERE kategori = 'Barang Keperluan Toko' and in_tanggal between '".$tgl_awal."' and '".$tgl_akhir."'";

                }else {
            $sql="select * from inbound 
            INNER JOIN keperluan_toko ON inbound.id_item = keperluan_toko.id_barang WHERE kategori = 'Barang Keperluan Toko'";
            }
        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
        <tr>
            <td class="text-center"><?php echo $no; ?></td>
            <td><?php echo $data['id_inbound'] ?></td>
            <td><?php echo $data['po_inbound'] ?></td>
            <td><?php echo $data['id_barang'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo $data['in_kuantitas'] ?></td>
            <td><?php echo $data['keterangan'] ?></td>
            <td><?php echo $data['in_keterangan'] ?></td>
            <td class="text-center"><?php echo $data['in_tanggal'] ?></td>
        </tr>
    <?php } ?>
</table>

</div>
</body>