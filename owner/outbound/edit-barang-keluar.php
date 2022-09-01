<?php include '../koneksi.php'; 
?>
<h2 class="text-center">UPDATE BARANG KELUAR</h2>
<?php $ambil = $koneksi->query("SELECT * FROM outbound 
		INNER JOIN keperluan_toko ON outbound.id_item = keperluan_toko.id_barang WHERE id_outbound = '$_GET[id]'"); 
 $tampil = $ambil->fetch_assoc();
?>
<?php
if (isset($_POST['save'])) {
    $id_outbound = $_POST['id_outbound'];
    $po_outbound = $_POST['po_outbound'];
    $id_item = $_POST['id_item'];
    $out_kuantitas = $_POST['out_kuantitas'];
    $out_tanggal = $_POST['out_tanggal'];
    $out_keterangan = $_POST['out_keterangan'];
    $kategori = $_POST['kategori'];

    $koneksi->query("UPDATE outbound SET id_outbound = '$id_outbound',po_outbound = '$po_outbound',id_item = '$id_item',out_kuantitas = '$out_kuantitas',out_tanggal = '$out_tanggal',out_keterangan = '$out_keterangan',kategori = '$kategori' WHERE id_outbound = '$_GET[id]'");
        echo "<div class='alert alert-success text-center'>Success</div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=barang-keluar'>";
    }

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<form action="" method="POST" enctype="multipart/form-data">
<input type="text" class="form-control" required="" value="<?php echo $tampil['id_outbound'] ?>" name="id_outbound">
<input type="text" class="form-control" required="" value="<?php echo $tampil['kategori'] ?>" name="kategori">
    <div class="form-group">
        <br>
        <label for="">PO BARANG KELUAR</label>
        <input type="text" class="form-control" name="po_outbound" readonly="" value="<?php echo $tampil['po_outbound'] ?>">
    </div>
    <div class="form-group">
        <br>
        <label for="">TANGGAL BARANG KELUAR</label>
        <input style="width: 500px;" type="date" class="form-control" name="out_tanggal" required="" value="<?php echo $tampil['out_tanggal'] ?>">
    </div>
    <div class="form-group">
        <label for="">KETERANGAN</label>
        <textarea name="out_keterangan" class="form-control" rows="3" required=""><?php echo $tampil['out_keterangan'] ?></textarea>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" style="width:100%;">
                <thead>
                    <th>ID BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>JUMLAH BARANG KELUAR</th>
                    <th></th>
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
                    <input type="text" class="form-control" required="" value="<?php echo $tampil['out_kuantitas'] ?>" name="out_kuantitas">
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div>
        <div class="col-lg-12">
            <button class="btn btn-success" type="submit" name="save">SIMPAN PERUBAHAN</button>&nbsp;<a href="menu.php?halaman=barang-keluar" class="btn btn-warning">KEMBALI</a>
        </div>
    </div>
</form>
</div>