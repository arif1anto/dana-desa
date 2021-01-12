
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
      Edit Data Kriteria
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo BASE_URL."pages/kriteria" ?>"><i class="fa fa-link"></i> Kriteria</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data Kriteria</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php 
            $id  = $_GET['id'];
            $q = query("SELECT * FROM kriteria a WHERE id_kriteria='$id'");
            $row = fetch_array($q);
          ?>

          <form class="form-horizontal" method="POST" action="simpan.php?q=up&id=<?php echo $id ?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">ID Kriteria</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="id_kriteria" placeholder="ID Kriteria" value="<?php echo $row['id_kriteria'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Nama Kriteria</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_kriteria" placeholder="Nama Kriteria" value="<?php echo $row['nama_kriteria'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Jenis Kriteria</label>
                <div class="col-sm-6">
                  <select class="form-control" name="jenis_kriteria" required>
                    <option value="K" <?php echo $row['jenis_kriteria']=="K"?"selected":"" ?>>Keuntungan</option>
                    <option value="B" <?php echo $row['jenis_kriteria']=="B"?"selected":"" ?>>Biaya</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Bobot Kriteria</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="bobot_kriteria" placeholder="Bobot Kriteria" value="<?php echo $row['bobot_kriteria'] ?>">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-right">
              <a href="index.php" class="btn btn-default">Batal</a>
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php inC("footer"); ?>
