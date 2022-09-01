<?php include '../koneksi.php'; 
?>

<?php $ambil = $koneksi->query("SELECT * FROM retur
		INNER JOIN keperluan_toko ON retur.id_item = keperluan_toko.id_barang WHERE id_retur = '$_GET[id]'"); 
 $tampil = $ambil->fetch_assoc();
?>
<?php
if (isset($_POST['save'])) {
    $id_retur = $_POST['id_retur'];
    $po_retur = $_POST['po_retur'];
    $id_item = $_POST['id_item'];
    $retur_kuantitas = $_POST['retur_kuantitas'];
    $retur_tanggal = $_POST['retur_tanggal'];
    $retur_keterangan = $_POST['retur_keterangan'];
    $kategori = $_POST['kategori'];
    $status_retur = $_POST['status_retur'];
    $stok_before_retur = $_POST['stok_before_retur'];

    $outbound_out = $retur_kuantitas;
    $max = $stok_before_retur;
    if ($retur_kuantitas > $max) {
        echo "<div class='alert alert-danger text-center'>Sorry, Retur goods exceeded the limit!</div>";
    } else {

    $koneksi->query("UPDATE retur SET id_retur = '$id_retur',po_retur = '$po_retur',id_item = '$id_item',retur_kuantitas = '$retur_kuantitas',retur_tanggal = '$retur_tanggal',retur_keterangan = '$retur_keterangan',kategori = '$kategori', status_retur= 'Approve' WHERE id_retur = '$_GET[id]'");
        
    $koneksi->query("UPDATE keperluan_toko SET stok = stok - $retur_kuantitas WHERE id_barang = '$id_item'");
    echo "<div class='alert alert-success text-center'>Success</div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=barang-retur'>";
    }
}
?>
<h2 class="text-center">UPDATE BARANG RETUR</h2>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<form action="" method="POST" enctype="multipart/form-data">
<input type="hidden" class="form-control" required="" value="<?php echo $tampil['id_retur'] ?>" name="id_retur">
<input type="hidden" class="form-control" required="" value="<?php echo $tampil['kategori'] ?>" name="kategori">
    <div class="form-group">
        <br>
        <label for="">PO BARANG RETUR</label>
        <input type="text" class="form-control" name="po_retur" readonly="" value="<?php echo $tampil['po_retur'] ?>">
    </div>
    <div class="form-group">
        <br>
        <label for="">TANGGAL BARANG RETUR</label>
        <input style="width: 500px;" type="date" class="form-control" readonly name="retur_tanggal" required="" value="<?php echo $tampil['retur_tanggal'] ?>">
    </div>
    <div class="form-group">
        <label for="">KETERANGAN RETUR</label>
        <textarea name="retur_keterangan" class="form-control" rows="3" readonly required=""><?php echo $tampil['retur_keterangan'] ?></textarea>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" style="width:100%;">
                <thead>
                    <th>ID BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>JUMLAH BARANG RETUR</th>
                    <th class="text-center">STATUS RETUR</th>
                </thead>
                <tbody id="tbl-barang-body">
                </tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" required="" value="<?php echo $tampil['id_item'] ?>" readonly="" name="id_item">
                    </td>
                    <td>
                        <input type="text" class="form-control" required="" value="<?php echo $tampil['nama_barang'] ?>" readonly="" name="nama_barang">
                    </td>
                    <td>
                    <input type="text" class="form-control" required="" readonly value="<?php echo $tampil['retur_kuantitas'] ?>" name="retur_kuantitas">
                    </td>
                    <input type="hidden" class="form-control" required="" readonly value="<?php echo $tampil['stok'] ?>" name="stok_before_retur">
                    
                    <td>
                    <input type="text" class="form-control text-center" required="" readonly value="<?php echo $tampil['status_retur'] ?>" name="status_retur">
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div>
        <div class="col-lg-12">
            <button class="btn btn-success" type="submit" name="save">APPROVE</button>&nbsp;<a href="menu.php?halaman=barang-retur" class="btn btn-warning">KEMBALI</a>
        </div>
    </div>
</form>
</div>