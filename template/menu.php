<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo BASE_URL ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nama"] ?></p>
          <!-- Status -->
          <a href="<?php echo BASE_URL."logout.php" ?>"><i class="fa fa-circle text-success"></i> Sign Out</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo BASE_URL."pages/warga" ?>"><i class="fa fa-link"></i> <span>Data Warga</span></a></li>
        <li><a href="<?php echo BASE_URL."pages/proses_spk" ?>"><i class="fa fa-link"></i> <span>Proses SPK</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL."pages/kriteria" ?>">Kriteria</a></li>
            <li><a href="<?php echo BASE_URL."pages/subkriteria" ?>">Sub Kriteria</a></li>
            <li><a href="<?php echo BASE_URL."pages/periode" ?>">Periode</a></li>
          </ul>
        </li>
        <li><a href="<?php echo BASE_URL."pages/laporan" ?>"><i class="fa fa-link"></i> <span>Laporan</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>