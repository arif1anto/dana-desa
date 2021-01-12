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
        Proses SPK
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Proses SPK</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hasil Perhitungan</h3>
              <div class="box-tools">
                <form method="GET" action="index.php">
                <div class="input-group input-group-sm" style="width: 470px;">
                  <div class="input-group-addon" style="border-color: transparent;">
                    Periode :
                  </div>
                  <div class="input-group-btn" style="width: 70px">
                    <select class="form-control input-sm" name="id_periode" required>
                      <option value=""></option>
                      <?php 
                        $q = query("SELECT * FROM Periode order by tahun asc"); 
                        while ($row1 = fetch_array($q)) :
                          $sel = $row1['id_periode']==$_GET['id_periode']?"selected":"";
                      ?>
                      <option value="<?php echo $row1['id_periode'] ?>" <?php echo $sel ?>><?php echo $row1['tahun'] ?></option>
                      <?php endwhile ?>
                    </select>
                  </div>
                  <div class="input-group-addon" style="border-color: transparent;">
                    Jumlah Prioritas :
                  </div>
                  <input type="text" class="form-control" name="jml_prioritas" value="<?php echo isset($_GET['jml_prioritas'])?$_GET['jml_prioritas']:'' ?>" required>
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-success">Proses</button>
                    <button type="submit" formmethod="post" formaction="simpan.php" class="btn btn-danger" <?php echo isset($_GET['id_periode'])?"":"disabled" ?>><i class="fa fa-save"></i> Simpan</button>
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
                  <th nowrap class="text-center">Periode</th>
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
                    $jp = isset($_GET['jml_prioritas'])?$_GET['jml_prioritas']:0;
                    $q = query("SELECT * FROM p4_datawarga a inner join data_warga b on a.no_peserta = b.no_peserta 
                      inner join periode c on c.id_periode=a.id_periode where a.id_periode = '$key' order by a.vector_s desc");
                    $pesan = "Proses SPK pada periode tersebut tidak dapat dilakukan";
                    $i=0;
                    while ($row = fetch_array($q)) : $i++;
                 ?>
                <tr>
                  <td><?php echo $row['no_peserta'] ?></td>
                  <td class="text-center"><?php echo $row['tahun'] ?></td>
                  <td><?php echo $row['alamat'] ?></td>
                  <td><?php echo $row['nama_kk'] ?></td>
                  <td class="text-left"><?php echo fisik_rumah($row['nilai_fisik_rumah']) ?></td>
                  <td class="text-right"><?php echo round($row['nilai_kesehatan'],5) ?></td>
                  <td class="text-right"><?php echo round($row['nilai_pendidikan'],5) ?></td>
                  <td class="text-left"><?php echo penghasilan($row['nilai_penghasilan']) ?></td>
                  <td class="text-right"><?php echo round($row['nilai_jumlah_kk'],5) ?></td>
                  <td class="text-right"><?php echo round($row['nilai_kondisi_alam'],5) ?></td>
                  <td class="text-right"><strong><?php echo round($row['vector_v'],5) ?></strong></td>
                  <td class="text-center"><strong><?php echo ($i<=$jp?"Prioritas":"Bukan Prioritas") ?></strong></td>
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

  <div class="modal fade" id="mpesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" >
      <div class="modal-header" style="background: #00a65a; color: #fff">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" ><i class="fa fa-warning"></i> Information</h3>
      </div>
      <div class="modal-body ">
          <p class="text-center"> <?php echo $_SESSION["ket"] ?></p>
        </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
      </div>
      </div>
    </div>
  </div>

  <!-- /.content-wrapper -->
<?php inC("footer"); ?>

<script type="text/javascript">
  function hapus(a) {
    $("#modalHapus #id_hapus").val(a);
    $("#modalHapus").modal("show");
  }

  <?php if ($_SESSION["ket"]!=null) {
    echo "$('#mpesan').modal('show');";
  } $_SESSION["ket"]=null; ?>
</script>