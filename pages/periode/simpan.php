<?php 
	include '../../config/config.php';

	$ket = $_GET['q'];
	if ($ket=="in") {
		query("INSERT INTO periode
            (tahun)
		VALUES (
	        '".$_POST['tahun']."'
	    )");

	    header("location: index.php");
	} elseif ($ket=="up") {
		$id = $_GET["id"];
		query("UPDATE periode
			SET 
			 tahun = '".$_POST['tahun']."'
			WHERE id_periode = '$id'");

	    header("location: index.php");
	} elseif ($ket=="del") {
		query("DELETE FROM periode WHERE id_periode='".$_POST['id']."'");
		header("location: index.php");
	}

 ?>