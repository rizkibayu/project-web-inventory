<?php include '../koneksi.php'; ?>
<h1 class="text-center">LAPORAN PRODUK RETUR</h1> <br>
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
    <form action="print/produk/cetak-produk-retur.php" method="post" class="form-inline" target="_blank">
                <input style="width: 550px" id="tgl_mulai" placeholder="masukkan tanggal Awal" type="date" class="form-control datepicker" name="tgl_awal"  value="<?php if (isset($_POST['tgl_awal'])) echo $_POST['tgl_awal'];?>" >
            <h5>&nbsp;-&nbsp;</h5>
                <input style="width: 550px" id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="date" class="form-control datepicker" name="tgl_akhir" value="<?php if (isset($_POST['tgl_akhir'])) echo $_POST['tgl_akhir'];?>">
        &nbsp;&nbsp;
        <input type="submit" name="date" class="btn btn-warning" value="PRINT">
    </form>
    <br>
    <a href="menu.php?halaman=laporan-inbound" class="btn btn-info btn-sm">PRODUK MASUK</a>
	<a href="menu.php?halaman=laporan-outbound" class="btn btn-warning btn-sm">PRODUK KELUAR</a>
	<a href="menu.php?halaman=laporan-retur" class="btn btn-danger btn-sm">PRODUK RETUR</a>
    <a target="_blank" href="export/laporan-retur.php" class="btn btn-success btn-sm"><i class="ti-export">&nbsp;EXPORT EXCEL</i></a>
    <br>
    <br>
<body>
<div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>ID RETUR</th>
            <th>PO RETUR</th>
            <th>ID PRODUK</th>
            <th>NAMA PRODUK</th>
            <th>KUANTITAS</th>
            <th>KETERANGAN PRODUK</th>
            <th>KETERANGAN</th>
            <th>STATUS RETUR</th>
            <th class="text-center">TANGGAL PRODUK RETUR</th>
        </tr>
    </thead>
     <?php
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {
            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sql="select * from retur 
        INNER JOIN produk ON retur.id_item = produk.id_produk WHERE kategori = 'Produk' and retur_tanggal between '".$tgl_awal."' and '".$tgl_akhir."'";

                }else {
            $sql="select * from retur 
            INNER JOIN produk ON retur.id_item = produk.id_produk WHERE kategori = 'Produk'";
            }
        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
        <tr>
            <td class="text-center"><?php echo $no; ?></td>
            <td><?php echo $data['id_retur'] ?></td>
            <td><?php echo $data['po_retur'] ?></td>
            <td><?php echo $data['id_produk'] ?></td>
            <td><?php echo $data['nama_produk'] ?></td>
            <td><?php echo $data['retur_kuantitas'] ?></td>
            <td><?php echo $data['keterangan'] ?></td>
            <td><?php echo $data['retur_keterangan'] ?></td>
            <td><?php echo $data['status_retur'] ?></td>
            <td class="text-center"><?php echo $data['retur_tanggal'] ?></td>
        </tr>
    <?php } ?>
</table>

</div>
</body>