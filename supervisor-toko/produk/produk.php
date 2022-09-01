<?php include '../koneksi.php'; ?>
<style>
  table {
    color: black;
  }
</style>
<h1 class="text-center">DATA PRODUK</h1>

<body>
  <div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th>NAMA PRODUK</th>
          <th class="text-center">DETAIL</th>
        </tr>
      </thead>
      <?php $nomer = 1; ?>
      <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
      <?php while ($tampil = $ambil->fetch_assoc()) {
      ?>
        <tr>
          <td class="text-center"><?php echo $nomer; ?></td>
          <td><?php echo $tampil['nama_produk'] ?></td>
          <td class="text-center">
            <!-- Button untuk modal -->
            <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $tampil['id_produk']; ?>">Detail</a>
          </td>
          <!--<td class="text-center"><a href="menu.php?halaman=edit_produk&id=<?php echo $tampil['id_produk'] ?>" class="btn btn-info">UBAH</a> <a href="menu.php?halaman=hapus_produk&id=<?php echo $tampil['id_produk'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">HAPUS</a></td>-->
        </tr>
        <?php $nomer++; ?>
      <?php } ?>

    </table>
    <?php $nomer = 1; ?>
    <?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
    <?php while ($tampil = $ambil->fetch_assoc()) {
    ?>
      <div class="modal fade" id="myModal<?php echo $tampil['id_produk']; ?>" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">DETAIL PRODUK</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <table class="table">
                <tr>
                  <td>ID Produk</td>
                  <td>:</td>
                  <td><?php echo $tampil['id_produk']; ?></td>
                </tr>
                <tr>
                  <td>Nama Produk</td>
                  <td>:</td>
                  <td><?php echo $tampil['nama_produk']; ?></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>:</td>
                  <td><?php echo $tampil['keterangan']; ?></td>
                </tr>
                <br>
                <tr>
                  <td>Foto Produk</td>
                  <td>:</td>
                  <td>
                    <img width="250px" src="../admin/produk/foto_produk/<?php echo $tampil['foto_produk'] ?>">
                  </td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  </table>
</body>
<a href="menu.php?halaman=tambah_produk" class="btn btn-success">+ TAMBAH PRODUK</a>