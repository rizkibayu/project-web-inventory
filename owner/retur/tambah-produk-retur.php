<?php include '../koneksi.php';
$date = date("YmdHis");
$batch = "RETUR-PDK-OMI$date";
$newID = $batch;
?>
<?php
if (isset($_POST['save'])) {
    $po_retur = $_POST['po_retur'];
    $id_item = $_POST['id_item'];
    $retur_kuantitas = $_POST['retur_kuantitas'];
    $retur_tanggal = $_POST['retur_tanggal'];
    $retur_keterangan = $_POST['retur_keterangan'];
    $stok_before_retur = $_POST['stok_before_retur'];

    $outbound_out = $retur_kuantitas;
    $max = $stok_before_retur;
    if ($retur_kuantitas > $max) {
        echo "<div class='alert alert-danger text-center'>Sorry, Retur goods exceeded the limit!</div>";
    } else {
        $koneksi->query("INSERT INTO retur (po_retur,id_item, stok_before_retur, retur_kuantitas, retur_tanggal, retur_keterangan, kategori, status_retur) VALUES ('$po_retur','$id_item','$stok_before_retur','$retur_kuantitas','$retur_tanggal','$retur_keterangan','Produk','Waiting For Approval')");

       // $koneksi->query("UPDATE produk SET stok = stok - $retur_kuantitas WHERE id_produk = '$id_item'");

        echo "<div class='alert alert-success text-center'>Success</div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=produk-retur'>";
    }
}
?>
<h2 class="text-center">FORM PRODUK RETUR</h2>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <br>
        <label for="">PO PRODUK RETUR</label>
        <input type="text" class="form-control" value="<?php echo $newID ?>" readonly="" name="po_retur">
    </div>
    <div class="form-group">
        <br>
        <label for="">TANGGAL PRODUK RETUR</label>
        <input style="width: 500px;" type="date" class="form-control" value="<?php echo date('d/m/Y'); ?>" name="retur_tanggal" required="">
    </div>
    <div class="form-group">
        <label for="">KETERANGAN RETUR</label>
        <textarea name="retur_keterangan" class="form-control" rows="3" required=""></textarea>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" style="width:100%;">
                <thead>
                    <th>NAMA PRODUK</th>
                    <th>STOK</th>
                    <th>JUMLAH PRODUK RETUR</th>
                </thead>
                <tbody id="tbl-barang-body">
                </tbody>
                <tr>
                    <td>
                        <?php
                        $result = mysqli_query($koneksi, "select * from produk order by id_produk asc");
                        $jsArray = "var prdName = new Array();\n";
                        echo '<select class="form-control" id="produk" name="id_item" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">';
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row['id_produk'] . '" required="">' . $row['id_produk'] . ' - ' . $row['nama_produk'] . '</option>';
                            $jsArray .= "prdName['" . $row['id_produk'] . "'] = '" . addslashes($row['stok']) . "';\n";
                        }
                        echo '</select>';
                        ?>
                    </td>
                    <td>
                        <input type="number" name="stok_before_retur" type="text" id="prd_name" readonly="" class="form-control" />
                        <script type="text/javascript">
                            <?php echo $jsArray; ?>
                        </script>
                    </td>
                    <td>
                        <input type="number" min="1" name="retur_kuantitas" class="form-control" required="">
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div>
        <div class="col-lg-12">
            <button class="btn btn-success" type="submit" name="save">SIMPAN</button>&nbsp;<a href="menu.php?halaman=produk-retur" class="btn btn-warning">KEMBALI</a>
        </div>
    </div>
</form>
</div>