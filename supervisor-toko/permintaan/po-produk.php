<?php include '../koneksi.php';
$date = date("YmdHis");
$batch = "PO-PRDK-OMI$date";
$newPO = $batch;
?>

<body>
    <div class="container">
        <h1 class="text-center">PERMINTAAN PRODUK</h1>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <br>
                <label for="">PO PRODUK</label>
                <input type="text" class="form-control" value="<?php echo $newPO ?>" readonly="" name="po_item">
            </div>
            <div class="form-group">
                <br>
                <label for="">TANGGAL PERMINTAAN</label>
                <input type="date" name="tanggal_permintaan" class="form-control" required="">
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
                    <button class="btn btn-success" type="submit" name="save">KIRIM PERMINTAAN</button>
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
                            <input type="number" min="1" name="kuantitas[]" class="form-control" required="">
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
</body>
<?php
if (isset($_POST['save'])) {

    $id_item = $_POST['id_item'];
    $po_item = $_POST['po_item'];
    $kuantitas = $_POST['kuantitas'];
    $tanggal_permintaan = $_POST['tanggal_permintaan'];

    $total = count($id_item);
    for ($i = 0; $i < $total; $i++) {
        $koneksi->query("INSERT INTO permintaan (po_item, id_item, kuantitas, tanggal_permintaan, status) VALUES ('$po_item','$id_item[$i]','$kuantitas[$i]','$tanggal_permintaan','Waiting For Approval[$i]')");
    }
    echo "<div class='alert alert-success text-center'>Success</div>";
    echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=per-produk'>";
}
?>