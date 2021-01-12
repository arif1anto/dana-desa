<?php 
	include '../../config/config.php';

	if ($_POST) {
		$id = $_POST['id_periode'];
		$jp = $_POST['jml_prioritas'];
		$q = query("REPLACE INTO hasil_spk (no_peserta,id_periode,nilai_hasil,ket)
			(SELECT a.no_peserta, a.id_periode, a.vector_v, IF((@i := @i + 1)<=$jp,'Prioritas','Bukan Prioritas') p FROM p4_datawarga a 
			cross join (select @i := 0) r 
			WHERE a.id_periode = '$id' ORDER BY a.vector_s DESC)");
		$_SESSION["ket"] = "Hasil SPK berhasil disimpan";
		header("location:index.php?id_periode=$id&jml_prioritas=$jp");
	}

 ?>