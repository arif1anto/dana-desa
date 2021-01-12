  <?php 
    include '../../config/config.php';
    inc("header");
    inc("menu");
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Periode
        <small>Data Periode</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Periode</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Periode <a href="tambah.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a></h3>

              <div class="box-tools">
                <form method="GET" action="index.php">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="cari" class="form-control pull-right" value="<?php echo isset($_GET['cari'])?$_GET['cari']:"" ?>" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <tbody><tr>
                  <th class="text-center" width="100">Aksi</th>
                  <th>ID Periode</th>
                  <th>Tahun Periode</th>
                </tr>
                <?php 
                    if ($_GET) {
                      $key = $_GET['cari'];
                      $q = query("SELECT * FROM periode a where tahun like '%key%' or id_periode like '%$key%'");
                      $pesan = "pencarian data periode dengan keyword <strong>$key</strong> tidak ditemukan";
                    } else {
                      $q = query("SELECT * FROM periode a");
                      $pesan = "Belum ada data periode, silahkan tambahkan terlebuh dahulu";
                    }
                    while ($row = fetch_array($q)) :
                 ?>
                <tr>
                  <td class="text-center">
                    <div class="btn-group">
                      <a href="edit.php?id=<?php echo $row['id_periode'] ?>" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                      <button type="button" onclick="hapus('<?php echo $row['id_periode'] ?>')" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>
                    </div>
                  </td>
                  <td><?php echo $row['id_periode'] ?></td>
                  <td><?php echo $row['tahun'] ?></td>
                </tr>
                <?php endwhile;
                  if (mysqli_num_rows($q)<=0) :
                ?>
                <tr>
                  <td colspan="5" class="danger text-center"><?php echo $pesan ?></td>
                </tr>
                <?php endif ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php inC("footer"); ?>

<script type="text/javascript">
  function hapus(a) {
    $("#modalHapus #id_hapus").val(a);
    $("#modalHapus").modal("show");
  }
</script>