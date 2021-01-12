  <?php 
    include '../../config/config.php';
    inc("header");
    inc("menu");
  ?>

  <style type="text/css">
    @media screen {
        .print{display: none;}
        .screen{display: block;}
    }

    @media print  {
      .print{display: block;}
        .screen{display: none;}
        .box{border: none;}
        .main-footer{display: none;}
    } 
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header print text-center" style="border: none;">
              <h3 class="box-title">Laporan </h3>
              <p id="periode_print">Periode </p>
            </div>
            <div class="box-header screen">
              <h3 class="box-title">Laporan</h3>
              <div class="box-tools">
                <form method="GET" action="index.php">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <div class="input-group-addon" style="border-color: transparent;">
                    Periode :
                  </div>
                  <select class="form-control" name="id_periode" id="id_periode" required>
                    <option value=""></option>
                    <?php 
                      $q = query("SELECT * FROM Periode order by tahun asc"); 
                      while ($row1 = fetch_array($q)) :
                        $sel = $row1['id_periode']==$_GET['id_periode']?"selected":"";
                    ?>
                    <option value="<?php echo $row1['id_periode'] ?>" <?php echo $sel ?>><?php echo $row1['tahun'] ?></option>
                    <?php endwhile ?>
                  </select>
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-success">Proses</button>
                    <button type="button" onclick="window.print();" class="btn btn-danger" <?php echo isset($_GET['id_periode'])?"":"disabled"; ?>><i class="fa fa-print"></i> Cetak</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <tbody>
                  <tr>
                  <th nowrap>No. Peserta</th>
                  <th nowrap>Alamat</th>
                  <th nowrap>Nama KK</th>
                  <th nowrap class="text-center">C1</th>
                  <th nowrap class="text-center">C2</th>
                  <th nowrap class="text-center">C2</th>
                  <th nowrap class="text-center">C2</th>
                  <th nowrap class="text-center">C2</th>
                  <th nowrap class="text-center">C2</th>
                  <th nowrap class="text-center">Nilai Akhir</th>
                  <th nowrap class="text-center">Keterangan</th>
                </tr>
                <?php 
                    $key = isset($_GET['id_periode'])?$_GET['id_periode']:"";
                    $q = query("SELECT * FROM hasil_spk a
                        LEFT JOIN periode b ON a.id_periode=b.id_periode
                        LEFT JOIN data_warga c ON a.no_peserta=c.no_peserta AND a.id_periode=c.id_periode
                        WHERE a.id_periode='$key'
                        ORDER BY a.nilai_hasil DESC");
                    $pesan = "Proses SPK pada periode tersebut tidak dapat dilakukan";
                    while ($row = fetch_array($q)) :
                 ?>
                <tr>
                  <td><?php echo $row['no_peserta'] ?></td>
                  <td><?php echo $row['alamat'] ?></td>
                  <td><?php echo $row['nama_kk'] ?></td>
                  <td class="text-left"><?php echo fisik_rumah($row['nilai_fisik_rumah']) ?></td>
                  <td class="text-right"><?php echo round($row['nilai_kesehatan'],5) ?></td>
                  <td class="text-right"><?php echo round($row['nilai_pendidikan'],5) ?></td>
                  <td class="text-left"><?php echo penghasilan($row['nilai_penghasilan']) ?></td>
                  <td class="text-right"><?php echo round($row['nilai_jumlah_kk'],5) ?></td>
                  <td class="text-right"><?php echo round($row['nilai_kondisi_alam'],5) ?></td>
                  <td class="text-right"><strong><?php echo round($row['nilai_hasil'],5) ?></strong></td>
                  <td class="text-center"><strong><?php echo $row['ket'] ?></strong></td>
                </tr>
                <?php endwhile;
                  if (mysqli_num_rows($q)<=0) :
                ?>
                <tr>
                  <td colspan="12" class="danger text-center"><?php echo $pesan ?></td>
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
  $(document).ready(function() {
    $("#periode_print").text("Periode "+$("#id_periode>option:selected").text());
  })
</script>