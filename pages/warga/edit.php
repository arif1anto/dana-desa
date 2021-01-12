
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
      Edit Data Warga
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo BASE_URL."pages/warga" ?>"><i class="fa fa-link"></i> Warga</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data Warga</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php 
            $id  = $_GET['id'];
            $q = query("SELECT * FROM data_warga a inner join periode b on a.id_periode=b.id_periode left join 
            nilai_subkriteria c on a.no_peserta=c.no_peserta WHERE a.no_peserta='$id'");
            $row = fetch_array($q);
          ?>

          <form class="form-horizontal" method="POST" action="simpan.php?q=up&id=<?php echo $id ?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">No Peserta</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="no_peserta" placeholder="No Peserta" value="<?php echo $row['no_peserta'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Periode</label>
                <div class="col-sm-6">
                  <select class="form-control" name="id_periode" required>
                    <option value=""></option>
                    <?php 
                      $q = query("SELECT * FROM Periode order by tahun asc"); 
                      while ($row1 = fetch_array($q)) :
                        $sel = $row1['id_periode']==$row['id_periode']?"selected":"";
                    ?>
                    <option value="<?php echo $row1['id_periode'] ?>" <?php echo $sel ?>><?php echo $row1['tahun'] ?></option>
                    <?php endwhile ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Alamat</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $row['alamat'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Desa</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="desa" placeholder="Desa" value="<?php echo $row['desa'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Nama KK</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_kk" placeholder="Namakk" value="<?php echo $row['nama_kk'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Fisik rumah</label>
                <div class="col-sm-6">
                  <select class="form-control" name="nilai_fisik_rumah" required>
                    <option value=""></option>
                    <option value="5" <?php echo $row['nilai_fisik_rumah']=="5"?"selected":"" ?>>Layak</option>
                    <option value="3" <?php echo $row['nilai_fisik_rumah']=="3"?"selected":"" ?>>Cukup Layak</option>
                    <option value="1" <?php echo $row['nilai_fisik_rumah']=="1"?"selected":"" ?>>Kurang Layak</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Nilai kesehatan</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-sm-6 control-label text-left">Anak Balita</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="c21" placeholder="Anak Balita" value="<?php echo $row['c21'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-sm-6 control-label text-left">Ibu Hamil/Menyusui</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="c22" placeholder="Ibu Hamil/Menyusui" value="<?php echo $row['c22'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-offset-2 col-sm-4">
                  <div class="form-group">
                    <label class="col-sm-6 control-label text-left">Disabilitas</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="c23" placeholder="Disabilitas" value="<?php echo $row['c23'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-sm-6 control-label text-left">Lansia</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="c24" placeholder="Lansia" value="<?php echo $row['c24'] ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Nilai pendidikan</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-sm-6 control-label text-left">Pra Sekolah</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="c31" placeholder="Pra Sekolah" value="<?php echo $row['c31'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-sm-6 control-label text-left">SD Sederajat</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="c32" placeholder="SD Sederajat" value="<?php echo $row['c32'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                  <div class="form-group">
                    <label class="col-sm-6 control-label text-left">SMP Sederajat</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="c33" placeholder="SMP Sederajat" value="<?php echo $row['c33'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-sm-6 control-label text-left">SMA Sederajat</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="c34" placeholder="SMA Sederajat" value="<?php echo $row['c34'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                  <div class="form-group">
                    <label class="col-sm-6 control-label text-left">Perguruan Tinggi</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="c35" placeholder="Perguruan Tinggi" value="<?php echo $row['c35'] ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Penghasilan</label>
                <div class="col-sm-6">
                  <select class="form-control" name="nilai_penghasilan" required>
                    <option value=""></option>
                    <option value="100" <?php echo $row['nilai_penghasilan']=="100"?"selected":"" ?>>< 1.000.000</option>
                    <option value="80" <?php echo $row['nilai_penghasilan']=="80"?"selected":"" ?>>1.000.001 - 1.500.000</option>
                    <option value="60" <?php echo $row['nilai_penghasilan']=="60"?"selected":"" ?>>1.500.001 - 2.000.000</option>
                    <option value="40" <?php echo $row['nilai_penghasilan']=="40"?"selected":"" ?>>2.000.001 - 2.500.000</option>
                    <option value="20" <?php echo $row['nilai_penghasilan']=="20"?"selected":"" ?>>2.500.001 - 3.000.000</option>
                    <option value="10" <?php echo $row['nilai_penghasilan']=="10"?"selected":"" ?>>> 3.000.000</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Nilai jumlah kk</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nilai_jumlah_kk" placeholder="Nilai jumlah kk" value="<?php echo $row['nilai_jumlah_kk'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left">Nilai kondisi alam</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nilai_kondisi_alam" placeholder="Nilai kondisi alam" value="<?php echo $row['nilai_kondisi_alam'] ?>">
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
