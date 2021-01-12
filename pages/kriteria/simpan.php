<?php 
	include '../../config/config.php';

	$ket = $_GET['q'];
	if ($ket=="in") {
		query("INSERT INTO kriteria
            (id_kriteria,
             nama_kriteria,
             jenis_kriteria,
             bobot_kriteria)
		VALUES (
	        '".$_POST['id_kriteria']."',
	        '".$_POST['nama_kriteria']."',
	        '".$_POST['jenis_kriteria']."',
	        '".$_POST['bobot_kriteria']."'
	    )");

	    header("location: index.php");
	} elseif ($ket=="up") {
		$id = $_GET["id"];
		query("UPDATE kriteria
			SET 
			 id_kriteria = '".$_POST['id_kriteria']."',
			 nama_kriteria = '".$_POST['nama_kriteria']."',
			 jenis_kriteria = '".$_POST['jenis_kriteria']."',
			 bobot_kriteria = '".$_POST['bobot_kriteria']."'
			WHERE id_kriteria = '$id'");

	    header("location: index.php");
	} elseif ($ket=="del") {
		query("DELETE FROM kriteria WHERE id_kriteria='".$_POST['id']."'");
		header("location: index.php");
	}

 ?>