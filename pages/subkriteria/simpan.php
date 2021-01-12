<?php 
	include '../../config/config.php';

	$ket = $_GET['q'];
	if ($ket=="in") {
		query("INSERT INTO sub_kriteria
            (id_sub_kriteria,
             nama_sub_kriteria,
             id_kriteria,
             bobot_sub_kriteria)
		VALUES (
	        '".$_POST['id_sub_kriteria']."',
	        '".$_POST['nama_sub_kriteria']."',
	        '".$_POST['id_kriteria']."',
	        '".$_POST['bobot_sub_kriteria']."'
	    )");

	    header("location: index.php");
	} elseif ($ket=="up") {
		$id = $_GET["id"];
		query("UPDATE sub_kriteria
			SET 
			 id_sub_kriteria = '".$_POST['id_sub_kriteria']."',
			 nama_sub_kriteria = '".$_POST['nama_sub_kriteria']."',
			 id_kriteria = '".$_POST['id_kriteria']."',
			 bobot_sub_kriteria = '".$_POST['bobot_sub_kriteria']."'
			WHERE id_sub_kriteria = '$id'");

	    header("location: index.php");
	} elseif ($ket=="del") {
		query("DELETE FROM sub_kriteria WHERE id_sub_kriteria='".$_POST['id']."'");
		header("location: index.php");
	}

 ?>