
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
      Edit Data Periode
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo BASE_URL."pages/periode" ?>"><i class="fa fa-link"></i> Periode</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data Periode</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php 
            $id  = $_GET['id'];
            $q = query("SELECT * FROM periode a WHERE id_periode='$id'");
            $row = fetch_array($q);
          ?>

          <form class="form-horizontal" method="POST" action="simpan.php?q=up&id=<?php echo $id ?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Tahun Periode</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="tahun" placeholder="Tahun Periode" value="<?php echo $row['tahun'] ?>">
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