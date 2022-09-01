<?php include '../koneksi.php';
?>
<?php
if (isset($_POST['save'])) {
    $id_inbound = $_POST['id_inbound'];
    $po_inbound = $_POST['po_inbound'];
    $id_item = $_POST['id_item'];
    $in_tanggal = $_POST['in_tanggal'];
    $in_kuantitas = $_POST['in_kuantitas'];


    $koneksi->query("UPDATE inbound SET id_inbound = '$id_inbound', po_inbound = '$po_inbound', id_item = '$id_item', in_tanggal = '$in_tanggal', in_kuantitas = '$in_kuantitas' WHERE id_inbound = '$_GET[id]'");

    echo "<div class='alert alert-success text-center'>Success</div>";
    echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=barang-masuk'>";
}
?>
<h2 class="text-center">UBAH BARANG MASUK</h2>
<?php $ambil = $koneksi->query("SELECT * FROM inbound 
		INNER JOIN keperluan_toko ON inbound.id_item = keperluan_toko.id_barang WHERE id_inbound = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <br>
        <label for="">PO BARANG MASUK</label>
        <input type="text" class="form-control" value="<?php echo $tampil['id_inbound'] ?>" readonly="" name="id_inbound">
    </div>
    <div class="form-group">
        <br>
        <label for="">ID BARANG MASUK</label>
        <input type="text" class="form-control" value="<?php echo $tampil['po_inbound'] ?>" readonly="" name="po_inbound">
    </div>
    <div class="form-group">
        <br>
        <label for="">ID BARANG</label>
        <input type="text" class="form-control" value="<?php echo $tampil['id_barang'] ?>" readonly="" name="id_item">
    </div>
    <div class="form-group">
        <br>
        <label for="">NAMA BARANG</label>
        <input type="text" class="form-control" value="<?php echo $tampil['nama_barang'] ?>" readonly="" name="nama_barang">
    </div>
    <div class="form-group">
        <br>
        <label for="">TANGGAL BARANG MASUK</label>
        <input style="width: 500px;" type="date" class="form-control" value="<?php echo $tampil['in_tanggal'] ?>" readonly="" name="in_tanggal" required="">
    </div>
    <div class="form-group">
        <label for="">Kuantitas</label>
        <input style="width: 300px;" type="number" class="form-control" min="1" name="in_kuantitas" value="<?php echo $tampil['in_kuantitas'] ?>" required="">
    </div>
    <button class="btn btn-success" name="save">SIMPAN</button>
    <a href="menu.php?halaman=barang-masuk" class="btn btn-warning">KEMBALI</a>
</form>
