<?php include '../koneksi.php';
$date = date("YmdHis");
$batch = "OUT-PDK-OMI$date";
$newID = $batch;
?>
<?php
if (isset($_POST['save'])) {
    $po_outbound = $_POST['po_outbound'];
    $id_item = $_POST['id_item'];
    $out_kuantitas = $_POST['out_kuantitas'];
    $out_tanggal = $_POST['out_tanggal'];
    $out_keterangan = $_POST['out_keterangan'];
    $stok = $_POST['stok'];

    $outbound_out = $out_kuantitas;
    $max = $stok;
    if ($out_kuantitas > $max) {
        echo "<div class='alert alert-danger text-center'>Sorry, Outbound goods exceeded the limit!</div>";
    } else {
        $koneksi->query("INSERT INTO outbound (po_outbound,id_item, out_kuantitas, out_tanggal, out_keterangan, kategori) VALUES ('$po_outbound','$id_item','$out_kuantitas','$out_tanggal','$out_keterangan','Produk')");

        $koneksi->query("UPDATE produk SET stok = stok - $out_kuantitas WHERE id_produk = '$id_item'");

        echo "<div class='alert alert-success text-center'>Success</div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=produk-keluar'>";
    }
}
?>
<h2 class="text-center">FORM PRODUK KELUAR</h2>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <br>
        <label for="">PO PRODUK KELUAR</label>
        <input type="text" class="form-control" value="<?php echo $newID ?>" readonly="" name="po_outbound">
    </div>
    <div class="form-group">
        <br>
        <label for="">TANGGAL PRODUK KELUAR</label>
        <input style="width: 500px;" type="date" class="form-control" value="<?php echo date('d/m/Y'); ?>" name="out_tanggal" required="">
    </div>
    <div class="form-group">
        <label for="">KETERANGAN</label>
        <textarea name="out_keterangan" class="form-control" rows="3" required=""></textarea>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" style="width:100%;">
                <thead>
                    <th>NAMA PRODUK</th>
                    <th>STOK</th>
                    <th>JUMLAH PRODUK KELUAR</th>
                    <th></th>
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
                        <input type="number" name="stok" type="text" id="prd_name" readonly="" class="form-control" />
                        <script type="text/javascript">
                            <?php echo $jsArray; ?>
                        </script>
                    </td>
                    <td>
                        <input type="number" min="1" name="out_kuantitas" class="form-control" required="">
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div>
        <div class="col-lg-12">
            <button class="btn btn-success" type="submit" name="save">SIMPAN</button>&nbsp;<a href="menu.php?halaman=produk-keluar" class="btn btn-warning">KEMBALI</a>
        </div>
    </div>
</form>
</div>