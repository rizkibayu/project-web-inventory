<?php include '../koneksi.php'; 
?>
<h2 class="text-center">UPDATE PRODUK RETUR</h2>
<?php $ambil = $koneksi->query("SELECT * FROM retur
		INNER JOIN produk ON retur.id_item = produk.id_produk WHERE id_retur = '$_GET[id]'"); 
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

    $koneksi->query("UPDATE retur SET id_retur = '$id_retur',po_retur = '$po_retur',id_item = '$id_item',retur_kuantitas = '$retur_kuantitas',retur_tanggal = '$retur_tanggal',retur_keterangan = '$retur_keterangan',kategori = '$kategori' WHERE id_retur = '$_GET[id]'");
        echo "<div class='alert alert-success text-center'>Success</div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=produk-retur'>";
    }

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<form action="" method="POST" enctype="multipart/form-data">
<input type="hidden" class="form-control" required="" value="<?php echo $tampil['id_retur'] ?>" name="id_retur">
<input type="hidden" class="form-control" required="" value="<?php echo $tampil['kategori'] ?>" name="kategori">
    <div class="form-group">
        <br>
        <label for="">PO PRODUK RETUR</label>
        <input type="text" class="form-control" name="po_retur" readonly="" value="<?php echo $tampil['po_retur'] ?>">
    </div>
    <div class="form-group">
        <br>
        <label for="">TANGGAL PRODUK RETUR</label>
        <input style="width: 500px;" type="date" class="form-control" name="retur_tanggal" required="" value="<?php echo $tampil['retur_tanggal'] ?>">
    </div>
    <div class="form-group">
        <label for="">KETERANGAN RETUR</label>
        <textarea name="retur_keterangan" class="form-control" rows="3" required=""><?php echo $tampil['retur_keterangan'] ?></textarea>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" style="width:100%;">
                <thead>
                    <th>ID PRODUK</th>
                    <th>NAMA PRODUK</th>
                    <th>JUMLAH PRODUK RETUR</th>
                </thead>
                <tbody id="tbl-barang-body">
                </tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" required="" value="<?php echo $tampil['id_item'] ?>" readonly="" name="id_item">
                    </td>
                    <td>
                        <input type="text" class="form-control" required="" value="<?php echo $tampil['nama_produk'] ?>" readonly="" name="nama_produk">
                    </td>
                    <td>
                    <input type="text" class="form-control" required="" value="<?php echo $tampil['retur_kuantitas'] ?>" name="retur_kuantitas">
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div>
        <div class="col-lg-12">
            <button class="btn btn-success" type="submit" name="save">SIMPAN PERUBAHAN</button>&nbsp;<a href="menu.php?halaman=produk-retur" class="btn btn-warning">KEMBALI</a>
        </div>
    </div>
</form>
</div>