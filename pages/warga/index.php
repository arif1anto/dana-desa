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
        Warga
        <small>Data Warga</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">warga</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Warga <a href="tambah.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a></h3>

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
                  <th nowrap class="text-center" width="100">Aksi</th>
                  <th nowrap>No. Peserta</th>
                  <th nowrap class="text-center">Periode</th>
                  <th nowrap>Alamat</th>
                  <th nowrap>Nama KK</th>
                  <th nowrap class="text-center">Nilai Fisik Rumah</th>
                  <th nowrap class="text-center">Nilai Kesehatan</th>
                  <th nowrap class="text-center">Nilai Pendidikan</th>
                  <th nowrap class="text-center">Nilai Penghasilan</th>
                  <th nowrap class="text-center">Nilai Jumlah KK</th>
                  <th nowrap class="text-center">Nilai Kondisi Alam</th>
                </tr>
                <?php 
                    if ($_GET) {
                      $key = $_GET['cari'];
                      $q = query("SELECT * FROM data_warga a inner join periode b on a.id_periode=b.id_periode where no_peserta like '%key%' or nama_kk like '%$key%' or b.tahun like '%$key%' or alamat like '%key%'");
                      $pesan = "pencarian data warga dengan keyword <strong>$key</strong> tidak ditemukan";
                    } else {
                      $q = query("SELECT * FROM data_warga a inner join periode b on a.id_periode=b.id_periode");
                      $pesan = "Belum ada data warga, silahkan tambahkan terlebuh dahulu";
                    }
                    while ($row = fetch_array($q)) :
                 ?>
                <tr>
                  <td nowrap class="text-center">
                    <div class="btn-group">
                      <a href="edit.php?id=<?php echo $row['no_peserta'] ?>" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                      <button type="button" onclick="hapus('<?php echo $row['no_peserta'] ?>')" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>
                    </div>
                  </td>
                  <td nowrap><?php echo $row['no_peserta'] ?></td>
                  <td nowrap class="text-center"><?php echo $row['tahun'] ?></td>
                  <td nowrap><?php echo $row['alamat'] ?></td>
                  <td nowrap><?php echo $row['nama_kk'] ?></td>
                  <td nowrap class="text-left"><?php echo fisik_rumah($row['nilai_fisik_rumah']) ?></td>
                  <td nowrap class="text-center"><?php echo round($row['nilai_kesehatan'],5) ?></td>
                  <td nowrap class="text-center"><?php echo round($row['nilai_pendidikan'],5) ?></td>
                  <td nowrap class="text-center"><?php echo penghasilan($row['nilai_penghasilan']) ?></td>
                  <td nowrap class="text-center"><?php echo round($row['nilai_jumlah_kk'],5) ?></td>
                  <td nowrap class="text-center"><?php echo round($row['nilai_kondisi_alam'],5) ?></td>
                </tr>
                <?php endwhile;
                  if (mysqli_num_rows($q)<=0) :
                ?>
                <tr>
                  <td colspan="11" class="danger text-center"><?php echo $pesan ?></td>
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