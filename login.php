
  <?php 
    include 'config/config.php';

    if ($_POST) {
      $username = $_POST["username"];
      $password = $_POST["password"];

      $sql = "SELECT * FROM admin WHERE `username`='$username'";
      $res = query($sql);
      if (mysqli_num_rows($res)>0) {
        $row = fetch_array($res);
        if ($row["password"]==$password) {
          $_SESSION["login"] = $row["username"];
          $_SESSION["nama"] = $row["nama_petugas"];
          $_SESSION["pesan"] = "login sukses";
          $_SESSION["ket"] = null;
          header("location:index.php");
        } else {
          $_SESSION["pesan"] = "login gagal";
          $_SESSION["ket"] = "Password yang anda masukan salah";
        }
      } else {
          $_SESSION["pesan"] = "login gagal";
          $_SESSION["ket"] = "Username yang anda masukan tidak cocok";
      }

    }
  ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK Dana Desa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>dist/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>dist/css/skins/_all-skins.min.css">

  <style type="text/css">
    .control-label.text-left{
      text-align: left !important;
    }
    .control-label.text-left:after{
      content: ":";
      position: absolute;
      right: 0;
    }
    .content{
      height: 100vh;
      padding-top: 150px;
    }
  </style>
</head>

<body class="hold-transition skin-green sidebar-mini fixed">
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
    <center><img src="<?php echo BASE_URL."dist/img/user6-128x128.jpg" ?>" style="width: 150px;"></center>
    <h1 class="text-center" style="color: #fff">
      SISTEM PENDUKUNG KEPUTUSAN<br>KELAYAKAN PENERIMA DANA BANTUAN DESA
    </h1>
    <center><button type="button" class="btn btn-danger btn-lg" style="width: 150px; border-radius: 50px;" data-target="#mlogin" data-toggle="modal">Login</button></center>

    <div class="modal fade" id="mlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" >Login</h3>
        </div>
        <div class="modal-body">
            <form action="login.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required></input>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required></input>
              </div>
              <button type="submit" class="btn btn-danger btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="mpesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content" >
        <div class="modal-header" style="background: #d73925; color: #fff;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" ><i class="fa fa-warning"></i> Login Gagal</h3>
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
    </section>
    <!-- /.content -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo BASE_URL ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo BASE_URL ?>bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL ?>dist/js/app.min.js"></script>

<script type="text/javascript">
  <?php if ($_SESSION["ket"]!=null) {
    echo "$('#mpesan').modal('show');";
  } ?>
</script>
</body>
</html>