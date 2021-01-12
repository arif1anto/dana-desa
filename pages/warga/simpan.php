<?php 
	include '../../config/config.php';

	$ket = $_GET['q'];
	if ($ket=="in") {
		query("INSERT INTO nilai_subkriteria
            (no_peserta,
             id_periode,
             c21,
             c22,
             c23,
             c24,
             c31,
             c32,
             c33,
             c34,
             c35)
		VALUES (
	        '".$_POST['no_peserta']."',
	        '".$_POST['id_periode']."',
	        '".$_POST['c21']."',
	        '".$_POST['c22']."',
	        '".$_POST['c23']."',
	        '".$_POST['c24']."',
	        '".$_POST['c31']."',
	        '".$_POST['c32']."',
	        '".$_POST['c33']."',
	        '".$_POST['c34']."',
	        '".$_POST['c35']."'
		        )");

		//hitung normalisasi bobot subkriteria c2
		$qbobot = query("SELECT a.id_sub_kriteria,bobot_sub_kriteria/(SELECT SUM(bobot_sub_kriteria) 
			FROM sub_kriteria b WHERE b.id_kriteria=a.id_kriteria) nbobot
			FROM sub_kriteria a WHERE  id_kriteria = 'C2'");
		$bbt = null; $c2 = 0;
		while ($row = fetch_array($qbobot)) {
			//normalisasi bobot c21 s.d c24 dikalikan nilai inputan
		 	$bbt[strtolower($row['id_sub_kriteria'])] = doubleval($row['nbobot'])*doubleval($_POST[strtolower($row['id_sub_kriteria'])]);
		 	$c2 += doubleval($bbt[strtolower($row['id_sub_kriteria'])]);
		} 

		//hitung normalisasi bobot subkriteria c3
		$qbobot = query("SELECT a.id_sub_kriteria,bobot_sub_kriteria/(SELECT SUM(bobot_sub_kriteria) 
			FROM sub_kriteria b WHERE b.id_kriteria=a.id_kriteria) nbobot
			FROM sub_kriteria a WHERE  id_kriteria = 'C3'");
		$bbt = null; $c3 = 0;
		while ($row = fetch_array($qbobot)) {
			//normalisasi bobot c31 s.d c34 dikalikan nilai inputan
		 	$bbt[strtolower($row['id_sub_kriteria'])] = doubleval($row['nbobot'])*doubleval($_POST[strtolower($row['id_sub_kriteria'])]);
		 	$c3 += doubleval($bbt[strtolower($row['id_sub_kriteria'])]);
		} 

		query("INSERT INTO data_warga
            (no_peserta,
             id_periode,
             alamat,
             desa,
             nama_kk,
             nilai_fisik_rumah,
             nilai_kesehatan,
             nilai_pendidikan,
             nilai_penghasilan,
             nilai_jumlah_kk,
             nilai_kondisi_alam)
		VALUES (
	        '".$_POST['no_peserta']."',
	        '".$_POST['id_periode']."',
	        '".$_POST['alamat']."',
	        '".$_POST['desa']."',
	        '".$_POST['nama_kk']."',
	        '".$_POST['nilai_fisik_rumah']."',
	        '".$c2."',
	        '".$c3."',
	        '".$_POST['nilai_penghasilan']."',
	        '".$_POST['nilai_jumlah_kk']."',
	        '".$_POST['nilai_kondisi_alam']."'
	    )");

	    header("location: index.php");
	} elseif ($ket=="up") {
		$id = $_GET["id"];

		query("UPDATE nilai_subkriteria SET
			 no_peserta = '".$_POST['no_peserta']."',
			 id_periode = '".$_POST['id_periode']."',
			  c21 = '".$_POST['c21']."',
			  c22 = '".$_POST['c22']."',
			  c23 = '".$_POST['c23']."',
			  c24 = '".$_POST['c24']."',
			  c31 = '".$_POST['c31']."',
			  c32 = '".$_POST['c32']."',
			  c33 = '".$_POST['c33']."',
			  c34 = '".$_POST['c34']."',
			  c35 = '".$_POST['c35']."'
			WHERE no_peserta = '$id'");

		//hitung normalisasi bobot subkriteria c2
		$qbobot = query("SELECT a.id_sub_kriteria,bobot_sub_kriteria/(SELECT SUM(bobot_sub_kriteria) 
			FROM sub_kriteria b WHERE b.id_kriteria=a.id_kriteria) nbobot
			FROM sub_kriteria a WHERE  id_kriteria = 'C2'");
		$bbt = null; $c2 = 0;
		while ($row = fetch_array($qbobot)) {
			//normalisasi bobot c21 s.d c24 dikalikan nilai inputan
		 	$bbt[strtolower($row['id_sub_kriteria'])] = doubleval($row['nbobot'])*doubleval($_POST[strtolower($row['id_sub_kriteria'])]);
		 	$c2 += doubleval($bbt[strtolower($row['id_sub_kriteria'])]);
		} 

		//hitung normalisasi bobot subkriteria c3
		$qbobot = query("SELECT a.id_sub_kriteria,bobot_sub_kriteria/(SELECT SUM(bobot_sub_kriteria) 
			FROM sub_kriteria b WHERE b.id_kriteria=a.id_kriteria) nbobot
			FROM sub_kriteria a WHERE  id_kriteria = 'C3'");
		$bbt = null; $c3 = 0;
		while ($row = fetch_array($qbobot)) {
			//normalisasi bobot c31 s.d c34 dikalikan nilai inputan
		 	$bbt[strtolower($row['id_sub_kriteria'])] = doubleval($row['nbobot'])*doubleval($_POST[strtolower($row['id_sub_kriteria'])]);
		 	$c3 += doubleval($bbt[strtolower($row['id_sub_kriteria'])]);
		} 
		
		query("UPDATE data_warga
			SET 
			 no_peserta = '".$_POST['no_peserta']."',
			 id_periode = '".$_POST['id_periode']."',
			 alamat = '".$_POST['alamat']."',
			 desa = '".$_POST['desa']."',
			 nama_kk = '".$_POST['nama_kk']."',
			 nilai_fisik_rumah = '".$_POST['nilai_fisik_rumah']."',
			 nilai_kesehatan = '".$c2."',
			 nilai_pendidikan = '".$c3."',
			 nilai_penghasilan = '".$_POST['nilai_penghasilan']."',
			 nilai_jumlah_kk = '".$_POST['nilai_jumlah_kk']."',
			 nilai_kondisi_alam = '".$_POST['nilai_kondisi_alam']."'
			WHERE no_peserta = '$id'");

	    header("location: index.php");
	} elseif ($ket=="del") {
		query("DELETE FROM data_warga WHERE no_peserta='".$_POST['id']."'");
		header("location: index.php");
	}

 ?>