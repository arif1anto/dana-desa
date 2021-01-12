
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
      Edit Data Sub Kriteria
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo BASE_URL."pages/subkriteria" ?>"><i class="fa fa-link"></i> Sub Kriteria</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data Sub Kriteria</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php 
            $id  = $_GET['id'];
            $q = query("SELECT * FROM sub_kriteria a WHERE id_sub_kriteria='$id'");
            $row = fetch_array($q);
          ?>

          <form class="form-horizontal" method="POST" action="simpan.php?q=up&id=<?php echo $id ?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">ID Sub Kriteria</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="id_sub_kriteria" placeholder="ID Sub Kriteria" value="<?php echo $row['id_sub_kriteria'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Kriteria</label>
                <div class="col-sm-6">
                  <select class="form-control" name="id_kriteria" required>
                    <option value=""></option>
                    <?php 
                      $q = query("SELECT * FROM kriteria order by id_kriteria asc"); 
                      while ($row1 = fetch_array($q)) :
                        $sel = $row1['id_kriteria']==$row['id_kriteria']?"selected":"";
                    ?>
                    <option value="<?php echo $row1['id_kriteria'] ?>" <?php echo $sel ?>><?php echo $row1['nama_kriteria'] ?></option>
                    <?php endwhile ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Nama Sub Kriteria</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_sub_kriteria" placeholder="Nama Sub Kriteria" value="<?php echo $row['nama_sub_kriteria'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Bobot Sub Kriteria</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="bobot_sub_kriteria" placeholder="Bobot Sub Kriteria" value="<?php echo $row['bobot_sub_kriteria'] ?>">
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
