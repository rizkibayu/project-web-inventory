<?php include '../koneksi.php';
$date = date("YmdHis");
$batch = "IN-PDK-OMI$date";
$newID = $batch;
?>
<?php
if (isset($_POST['save'])) {
	$po_inbound = $_POST['po_inbound'];
	$id_item = $_POST['id_item'];
	$in_kuantitas = $_POST['in_kuantitas'];
	$in_tanggal = $_POST['in_tanggal'];
	$in_keterangan = $_POST['in_keterangan'];

	
	$total = count($id_item);
    for ($i = 0; $i < $total; $i++) {

	$koneksi->query("INSERT INTO inbound (po_inbound,id_item, in_kuantitas, in_tanggal, in_keterangan, kategori) VALUES ('$po_inbound','$id_item[$i]','$in_kuantitas[$i]','$in_tanggal','$in_keterangan','Produk')");

	$koneksi->query("UPDATE produk SET stok = stok + $in_kuantitas[$i] WHERE id_produk = '$id_item[$i]'");
	}
	echo "<div class='alert alert-success text-center'>Success</div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=produk-masuk'>";
}
?>
<h2 class="text-center">TAMBAH BARANG MASUK</h2>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<br>
		<label for="">PO PRODUK MASUK</label>
		<input type="text" class="form-control" value="<?php echo $newID ?>" readonly="" name="po_inbound">
	</div>
	<div class="form-group">
		<br>
		<label for="">TANGGAL PRODUK MASUK</label>
		<input style="width: 500px;" type="date" class="form-control" value="<?php echo date('d/m/Y'); ?>" name="in_tanggal" required="">
	</div>
	<div class="form-group">
		<label for="">KETERANGAN</label>
		<textarea name="in_keterangan" class="form-control" rows="3" required=""></textarea>

	</div>
	<div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-primary" id="btn-tambah">+ TAMBAH BARANG</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table" style="width:100%;">
                        <thead>
                            <th>NAMA PRODUK</th>
                            <th>JUMLAH</th>
                            <th></th>
                        </thead>
                        <tbody id="tbl-barang-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row btnSave" style="display:none;">
                <div class="col-lg-12">
                    <button class="btn btn-success" type="submit" name="save">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(function() {
            var count = 0;

            if (count == 0) {
                $('.btnSave').hide();
            }
            $('#btn-tambah').on('click', function() {
                count += 1;
                $('#tbl-barang-body').append(`
                    <tr required="">
                        <td>
                        <select id="produk" name="id_item[]" class="form-control" required="">
					    <?php
                        $ambil = $koneksi->query("SELECT * FROM produk ORDER BY id_produk ASC");
                        while ($product = $ambil->fetch_assoc()) {
                        ?>
				        <option class="form-control"  value="<?php echo $product['id_produk'] ?>">
					        <?php echo $product['nama_produk'] ?> - 
					        <?php echo $product['keterangan'] ?> 
				        </option>
					    <?php } ?>
			            </select>
                        </td>
                        <td>
                            <input type="number" min="1" name="in_kuantitas[]" class="form-control" required="">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger removeItem">HAPUS</button>
                        </td>
                    </tr>
                `);

                if (count > 0) {
                    $('.btnSave').show();
                }

                $('.removeItem').on('click', function() {
                    $(this).closest("tr").remove();
                    count = 1;
                    if (count == 0) {
                        $('.btnSave').hide();
                    }
                })
            })
        })
    </script>