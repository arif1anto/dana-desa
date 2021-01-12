
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
      Tambah Data Kriteria
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo BASE_URL."pages/kriteria" ?>"><i class="fa fa-link"></i> Kriteria</a></li>
      <li class="active">Tambah</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Input Data Kriteria</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="POST" action="simpan.php?q=in">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label text-left">ID Kriteria</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="id_kriteria" placeholder="ID Kriteria" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Nama Kriteria</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_kriteria" placeholder="Nama Kriteria" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Jenis Kriteria</label>
                <div class="col-sm-6">
                  <select class="form-control" name="jenis_kriteria" required>
                    <option value="K">Keuntungan</option>
                    <option value="B">Biaya</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Bobot Kriteria</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="bobot_kriteria" placeholder="Bobot Kriteria" required>
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
